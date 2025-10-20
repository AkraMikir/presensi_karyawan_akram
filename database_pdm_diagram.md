# PDM (Physical Data Model) - Sistem Presensi Karyawan

## Entity Relationship Diagram

```mermaid
erDiagram
    USERS {
        bigint id PK
        varchar email UK
        varchar password
        enum role
        timestamp email_verified_at
        varchar remember_token
        timestamp created_at
        timestamp updated_at
    }

    PERUSAHAAN {
        bigint id PK
        varchar nama
        text alamat
        decimal latitude
        decimal longitude
        varchar telepon
        varchar email
        timestamp created_at
        timestamp updated_at
    }

    KARYAWAN {
        bigint id PK
        bigint user_id FK
        varchar nama
        varchar email UK
        varchar nik UK
        date tanggal_lahir
        enum jenis_kelamin
        bigint perusahaan_id FK
        varchar jabatan
        varchar telepon
        text alamat
        date tanggal_masuk
        enum status
        timestamp created_at
        timestamp updated_at
    }

    PRESENSI {
        bigint id PK
        bigint karyawan_id FK
        date tanggal_presensi
        time jam_masuk
        time jam_keluar
        varchar foto_masuk
        varchar foto_keluar
        decimal latitude_masuk
        decimal longitude_masuk
        decimal latitude_keluar
        decimal longitude_keluar
        enum status
        text keterangan
        timestamp created_at
        timestamp updated_at
    }

    SESSIONS {
        varchar id PK
        bigint user_id FK
        varchar ip_address
        text user_agent
        longtext payload
        int last_activity
    }

    PASSWORD_RESET_TOKENS {
        varchar email PK
        varchar token
        timestamp created_at
    }

    PERSONAL_ACCESS_TOKENS {
        bigint id PK
        varchar tokenable_type
        bigint tokenable_id
        text name
        varchar token UK
        text abilities
        timestamp last_used_at
        timestamp expires_at
        timestamp created_at
        timestamp updated_at
    }

    %% Relationships
    USERS ||--|| KARYAWAN : "1:1"
    PERUSAHAAN ||--o{ KARYAWAN : "1:N"
    KARYAWAN ||--o{ PRESENSI : "1:N"
    USERS ||--o{ SESSIONS : "1:N"
    USERS ||--o{ PERSONAL_ACCESS_TOKENS : "1:N"
```

## Database Schema Overview

```mermaid
graph TB
    subgraph "Authentication Layer"
        A[USERS<br/>- id (PK)<br/>- email<br/>- password<br/>- role]
        B[SESSIONS<br/>- id (PK)<br/>- user_id (FK)<br/>- payload]
        C[PASSWORD_RESET_TOKENS<br/>- email (PK)<br/>- token]
        D[PERSONAL_ACCESS_TOKENS<br/>- id (PK)<br/>- tokenable_id<br/>- token]
    end

    subgraph "Business Layer"
        E[PERUSAHAAN<br/>- id (PK)<br/>- nama<br/>- alamat<br/>- latitude/longitude]
        F[KARYAWAN<br/>- id (PK)<br/>- user_id (FK)<br/>- perusahaan_id (FK)<br/>- nama, nik, email<br/>- status]
    end

    subgraph "Transaction Layer"
        G[PRESENSI<br/>- id (PK)<br/>- karyawan_id (FK)<br/>- tanggal_presensi<br/>- jam_masuk/keluar<br/>- foto, GPS coordinates<br/>- status]
    end

    %% Relationships
    A -->|1:1| F
    E -->|1:N| F
    F -->|1:N| G
    A -->|1:N| B
    A -->|1:N| D
```

## Table Structure Details

### 1. USERS Table

```mermaid
graph LR
    subgraph "USERS"
        U1[id - BIGINT PK]
        U2[email - VARCHAR UNIQUE]
        U3[password - VARCHAR]
        U4[role - ENUM]
        U5[email_verified_at - TIMESTAMP]
        U6[remember_token - VARCHAR]
        U7[timestamps]
    end
```

### 2. PERUSAHAAN Table

```mermaid
graph LR
    subgraph "PERUSAHAAN"
        P1[id - BIGINT PK]
        P2[nama - VARCHAR]
        P3[alamat - TEXT]
        P4[latitude - DECIMAL]
        P5[longitude - DECIMAL]
        P6[telepon - VARCHAR]
        P7[email - VARCHAR]
        P8[timestamps]
    end
```

### 3. KARYAWAN Table

```mermaid
graph LR
    subgraph "KARYAWAN"
        K1[id - BIGINT PK]
        K2[user_id - BIGINT FK]
        K3[nama - VARCHAR]
        K4[email - VARCHAR UNIQUE]
        K5[nik - VARCHAR UNIQUE]
        K6[tanggal_lahir - DATE]
        K7[jenis_kelamin - ENUM]
        K8[perusahaan_id - BIGINT FK]
        K9[jabatan - VARCHAR]
        K10[telepon - VARCHAR]
        K11[alamat - TEXT]
        K12[tanggal_masuk - DATE]
        K13[status - ENUM]
        K14[timestamps]
    end
```

### 4. PRESENSI Table

```mermaid
graph LR
    subgraph "PRESENSI"
        PR1[id - BIGINT PK]
        PR2[karyawan_id - BIGINT FK]
        PR3[tanggal_presensi - DATE]
        PR4[jam_masuk - TIME]
        PR5[jam_keluar - TIME]
        PR6[foto_masuk - VARCHAR]
        PR7[foto_keluar - VARCHAR]
        PR8[latitude_masuk - DECIMAL]
        PR9[longitude_masuk - DECIMAL]
        PR10[latitude_keluar - DECIMAL]
        PR11[longitude_keluar - DECIMAL]
        PR12[status - ENUM]
        PR13[keterangan - TEXT]
        PR14[timestamps]
    end
```

## Index Strategy

```mermaid
graph TB
    subgraph "Indexes"
        I1[KARYAWAN<br/>- idx_perusahaan_status<br/>- idx_nik]
        I2[PRESENSI<br/>- idx_karyawan_tanggal<br/>- idx_tanggal<br/>- idx_status<br/>- uk_karyawan_tanggal]
        I3[SESSIONS<br/>- idx_user_id<br/>- idx_last_activity]
        I4[PERSONAL_ACCESS_TOKENS<br/>- idx_expires_at]
    end
```

## Data Flow Diagram

```mermaid
flowchart TD
    A[User Login] --> B[Authentication]
    B --> C{User Role}
    C -->|Admin/HR| D[Manage Karyawan]
    C -->|Karyawan| E[Presensi Process]

    D --> F[Create/Update Karyawan]
    F --> G[Assign to Perusahaan]

    E --> H[Check-in Process]
    H --> I[Capture Photo + GPS]
    I --> J[Store Presensi Data]

    J --> K[Generate Reports]
    K --> L[Attendance Analytics]

    subgraph "Database Tables"
        M[USERS]
        N[KARYAWAN]
        O[PERUSAHAAN]
        P[PRESENSI]
    end

    B --> M
    F --> N
    G --> O
    J --> P
```

## Key Features Highlighted

### 🔐 Security Features

-   Role-based access control (admin, karyawan, hr)
-   JWT token authentication
-   Password reset functionality
-   Session management

### 📊 Business Logic

-   Employee status tracking
-   Attendance status management
-   GPS location verification
-   Photo capture for verification

### ⚡ Performance Features

-   Strategic indexing
-   Foreign key constraints
-   Unique constraints
-   Cascade delete operations

### 📱 Mobile-Ready Features

-   GPS coordinate storage
-   Photo upload support
-   Real-time status tracking
-   Offline capability support

