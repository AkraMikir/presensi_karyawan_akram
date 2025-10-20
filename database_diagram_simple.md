# Database Diagram - Sistem Presensi Karyawan

## Entity Relationship Diagram

```
┌─────────────────┐    1:1    ┌─────────────────┐
│     USERS       │◄─────────►│    KARYAWAN     │
├─────────────────┤           ├─────────────────┤
│ • id (PK)       │           │ • id (PK)       │
│ • email         │           │ • user_id (FK)  │
│ • password      │           │ • nama          │
│ • role          │           │ • email         │
│ • timestamps    │           │ • nik           │
└─────────────────┘           │ • perusahaan_id │
                              │ • status        │
                              │ • timestamps    │
                              └─────────────────┘
                                       │
                                       │ 1:N
                                       ▼
                              ┌─────────────────┐
                              │    PRESENSI     │
                              ├─────────────────┤
                              │ • id (PK)       │
                              │ • karyawan_id   │
                              │ • tanggal       │
                              │ • jam_masuk     │
                              │ • jam_keluar    │
                              │ • foto_masuk    │
                              │ • foto_keluar   │
                              │ • latitude      │
                              │ • longitude     │
                              │ • status        │
                              └─────────────────┘
                                       ▲
                                       │
                              ┌─────────────────┐
                              │   PERUSAHAAN    │
                              ├─────────────────┤
                              │ • id (PK)       │
                              │ • nama          │
                              │ • alamat        │
                              │ • latitude      │
                              │ • longitude     │
                              │ • telepon       │
                              │ • email         │
                              └─────────────────┘
```

## Table Relationships

| From Table | To Table | Relationship | Foreign Key   | Cascade |
| ---------- | -------- | ------------ | ------------- | ------- |
| USERS      | KARYAWAN | 1:1          | user_id       | CASCADE |
| PERUSAHAAN | KARYAWAN | 1:N          | perusahaan_id | CASCADE |
| KARYAWAN   | PRESENSI | 1:N          | karyawan_id   | CASCADE |

## Key Features

### 🔐 Authentication

-   Role-based access (admin, karyawan, hr)
-   JWT token support
-   Password reset functionality

### 📊 Business Logic

-   Employee management
-   Attendance tracking
-   GPS location verification
-   Photo capture

### ⚡ Performance

-   Strategic indexing
-   Foreign key constraints
-   Unique constraints
-   Cascade operations


