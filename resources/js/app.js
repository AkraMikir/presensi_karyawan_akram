// PresensiApp JavaScript

$(document).ready(function () {
    // Initialize tooltips
    var tooltipTriggerList = [].slice.call(
        document.querySelectorAll('[data-bs-toggle="tooltip"]')
    );
    var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
        return new bootstrap.Tooltip(tooltipTriggerEl);
    });

    // Initialize popovers
    var popoverTriggerList = [].slice.call(
        document.querySelectorAll('[data-bs-toggle="popover"]')
    );
    var popoverList = popoverTriggerList.map(function (popoverTriggerEl) {
        return new bootstrap.Popover(popoverTriggerEl);
    });

    // Auto-hide alerts after 5 seconds
    setTimeout(function () {
        $(".alert").fadeOut("slow");
    }, 5000);

    // Initialize DataTables if present
    if ($.fn.DataTable) {
        $("#presensiTable").DataTable({
            language: {
                url: "//cdn.datatables.net/plug-ins/1.13.4/i18n/id.json",
            },
            responsive: true,
            pageLength: 25,
            order: [[0, "desc"]],
        });
    }

    // Initialize date pickers
    $(".datepicker").datepicker({
        format: "yyyy-mm-dd",
        autoclose: true,
        todayHighlight: true,
    });

    // Initialize time pickers
    $(".timepicker").timepicker({
        showMeridian: false,
        minuteStep: 1,
    });
});

// Global functions
window.PresensiApp = {
    // Show loading spinner
    showLoading: function (element) {
        if (typeof element === "string") {
            element = $(element);
        }
        element.html('<i class="fas fa-spinner fa-spin"></i> Loading...');
        element.prop("disabled", true);
    },

    // Hide loading spinner
    hideLoading: function (element, originalText) {
        if (typeof element === "string") {
            element = $(element);
        }
        element.html(originalText);
        element.prop("disabled", false);
    },

    // Show alert message
    showAlert: function (message, type, duration) {
        type = type || "info";
        duration = duration || 5000;

        const alertClass =
            {
                success: "alert-success",
                error: "alert-danger",
                warning: "alert-warning",
                info: "alert-info",
            }[type] || "alert-info";

        const iconClass =
            {
                success: "fas fa-check-circle",
                error: "fas fa-exclamation-circle",
                warning: "fas fa-exclamation-triangle",
                info: "fas fa-info-circle",
            }[type] || "fas fa-info-circle";

        const alertHtml = `
            <div class="alert ${alertClass} alert-dismissible fade show" role="alert">
                <i class="${iconClass} me-2"></i>
                ${message}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        `;

        // Remove existing alerts
        $(".alert").remove();

        // Add new alert
        $("main").prepend(alertHtml);

        // Auto remove after duration
        setTimeout(() => {
            $(".alert").fadeOut();
        }, duration);
    },

    // Confirm dialog
    confirm: function (message, callback) {
        if (confirm(message)) {
            if (typeof callback === "function") {
                callback();
            }
        }
    },

    // Format date
    formatDate: function (date, format) {
        format = format || "DD/MM/YYYY";
        return moment(date).format(format);
    },

    // Format time
    formatTime: function (time, format) {
        format = format || "HH:mm:ss";
        return moment(time, "HH:mm:ss").format(format);
    },

    // Get current location
    getCurrentLocation: function (callback) {
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(
                function (position) {
                    if (typeof callback === "function") {
                        callback({
                            latitude: position.coords.latitude,
                            longitude: position.coords.longitude,
                            accuracy: position.coords.accuracy,
                        });
                    }
                },
                function (error) {
                    console.error("Error getting location:", error);
                    PresensiApp.showAlert(
                        "Gagal mengambil lokasi. Silakan izinkan akses lokasi.",
                        "error"
                    );
                }
            );
        } else {
            PresensiApp.showAlert(
                "Browser tidak mendukung geolocation.",
                "error"
            );
        }
    },

    // Capture photo
    capturePhoto: function (input, callback) {
        if (input.files && input.files[0]) {
            const reader = new FileReader();
            reader.onload = function (e) {
                if (typeof callback === "function") {
                    callback(e.target.result);
                }
            };
            reader.readAsDataURL(input.files[0]);
        }
    },

    // Validate form
    validateForm: function (form) {
        let isValid = true;
        const requiredFields = $(form).find("[required]");

        requiredFields.each(function () {
            if (!$(this).val()) {
                $(this).addClass("is-invalid");
                isValid = false;
            } else {
                $(this).removeClass("is-invalid");
            }
        });

        return isValid;
    },

    // Submit form with AJAX
    submitForm: function (form, url, method, callback) {
        method = method || "POST";

        const formData = new FormData(form);

        $.ajax({
            url: url,
            type: method,
            data: formData,
            processData: false,
            contentType: false,
            success: function (response) {
                if (typeof callback === "function") {
                    callback(response, true);
                }
            },
            error: function (xhr, status, error) {
                console.error("AJAX Error:", error);
                if (typeof callback === "function") {
                    callback(
                        xhr.responseJSON || { message: "Terjadi kesalahan" },
                        false
                    );
                }
            },
        });
    },
};

// Check In/Check Out specific functions
window.PresensiCheckIn = {
    init: function () {
        this.updateTime();
        setInterval(() => this.updateTime(), 1000);
        this.getLocation();
    },

    updateTime: function () {
        const now = new Date();
        const timeString = now.toLocaleTimeString("id-ID", {
            hour: "2-digit",
            minute: "2-digit",
            second: "2-digit",
        });
        const dateString = now.toLocaleDateString("id-ID", {
            weekday: "long",
            year: "numeric",
            month: "long",
            day: "numeric",
        });

        $("#currentTime").text(timeString);
        $("#currentDate").text(dateString);
    },

    getLocation: function () {
        PresensiApp.getCurrentLocation(function (location) {
            $("#latitude_masuk").val(location.latitude);
            $("#longitude_masuk").val(location.longitude);
            PresensiApp.showAlert("Lokasi berhasil diambil!", "success");
        });
    },

    submit: function (form) {
        if (!PresensiApp.validateForm(form)) {
            PresensiApp.showAlert(
                "Mohon lengkapi semua field yang wajib diisi.",
                "warning"
            );
            return;
        }

        const submitBtn = $(form).find('button[type="submit"]');
        const originalText = submitBtn.html();

        PresensiApp.showLoading(submitBtn);

        // Simulate API call
        setTimeout(() => {
            PresensiApp.hideLoading(submitBtn, originalText);
            PresensiApp.showAlert(
                "Check in berhasil! Selamat bekerja.",
                "success"
            );
            form.reset();
            this.getLocation();
        }, 2000);
    },
};

window.PresensiCheckOut = {
    init: function () {
        this.updateTime();
        setInterval(() => this.updateTime(), 1000);
        this.getLocation();
    },

    updateTime: function () {
        const now = new Date();
        const timeString = now.toLocaleTimeString("id-ID", {
            hour: "2-digit",
            minute: "2-digit",
            second: "2-digit",
        });
        const dateString = now.toLocaleDateString("id-ID", {
            weekday: "long",
            year: "numeric",
            month: "long",
            day: "numeric",
        });

        $("#currentTime").text(timeString);
        $("#currentDate").text(dateString);
    },

    getLocation: function () {
        PresensiApp.getCurrentLocation(function (location) {
            $("#latitude_keluar").val(location.latitude);
            $("#longitude_keluar").val(location.longitude);
            PresensiApp.showAlert("Lokasi berhasil diambil!", "success");
        });
    },

    submit: function (form) {
        if (!PresensiApp.validateForm(form)) {
            PresensiApp.showAlert(
                "Mohon lengkapi semua field yang wajib diisi.",
                "warning"
            );
            return;
        }

        const submitBtn = $(form).find('button[type="submit"]');
        const originalText = submitBtn.html();

        PresensiApp.showLoading(submitBtn);

        // Simulate API call
        setTimeout(() => {
            PresensiApp.hideLoading(submitBtn, originalText);
            PresensiApp.showAlert(
                "Check out berhasil! Terima kasih telah bekerja hari ini.",
                "success"
            );
            form.reset();
            this.getLocation();
        }, 2000);
    },
};

// Initialize based on current page
if (window.location.pathname.includes("checkin")) {
    PresensiCheckIn.init();
} else if (window.location.pathname.includes("checkout")) {
    PresensiCheckOut.init();
}
