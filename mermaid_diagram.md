# Database PDM Diagram

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




