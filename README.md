# 📘 CI4 Blog CMS - Documentation

## 📂 Project Structure

```
app/
├── Config/
│   ├── Filters.php          # Konfigurasi Auth filter & CSRF
│   └── Routes.php           # Definisi semua routing & group filter
├── Controllers/
│   ├── Auth.php             # Logic Login, Logout, & Register
│   ├── Dashboard.php        # Panel Admin utama
│   ├── Home.php             # Frontend: List, Detail, & Search
│   └── Post.php             # CRUD Artikel & REST API
├── Database/
│   ├── Migrations/          # Skema tabel database (Users, Posts, Categories)
│   └── Seeds/               # Data dummy untuk pengujian awal
├── Models/
│   ├── CategoryModel.php    # Kelola data kategori
│   ├── PostModel.php        # Kelola data artikel (join kategori/user)
│   └── UserModel.php        # Kelola data autentikasi user
└── Views/
    ├── auth/
    │   └── login.php        # Halaman form login
    ├── dashboard/
    │   └── index.php        # Statistik & overview admin
    ├── home/
    │   ├── category.php     # List artikel berdasarkan kategori
    │   ├── detail.php       # Halaman baca artikel tunggal
    │   ├── index.php        # Landing page (list artikel terbaru)
    │   └── search.php       # Hasil pencarian artikel
    └── posts/
        ├── create.php       # Form tambah artikel baru
        ├── edit.php         # Form edit artikel
        └── index.php        # Tabel manajemen artikel (Admin)

public/
├── index.php                # Entry point aplikasi
└── uploads/                 # Penyimpanan file (Thumbnail artikel)

writable/
└── (Log, Cache, Debug)
```

---

## 🔄 Application Flow

### 1. 🔐 Authentication (Login & Admin Access)

User → /login → Auth::processLogin()
```
├─ Success → session created → redirect /dashboard
└─ Failed → flash error → redirect /login
```

- `/dashboard` → hanya bisa diakses jika `logged_in = true` (AuthFilter)

- Logout: Auth::logout() → destroy session → redirect /login

---

### 2. 📝 CRUD Artikel (Admin Panel)

| Route | Method | Description |
|------|--------|-------------|
| `/posts` | GET | List semua artikel |
| `/posts/create` | GET | Form tambah artikel |
| `/posts/store` | POST | Simpan artikel + upload thumbnail |
| `/posts/edit/{id}` | GET | Form edit artikel |
| `/posts/update/{id}` | POST | Update artikel |
| `/posts/delete/{id}` | GET/DELETE | Hapus artikel |

---

### 3. 🌐 Frontend Blog (Public)

| Route | Description |
|------|------------|
| `/` | List artikel + pagination |
| `/post/{slug}` | Detail artikel |
| `/search?q=keyword` | Hasil pencarian |
| `/category/{slug}` | Filter berdasarkan kategori |

---

### 4. 🔌 REST API

| Method | Endpoint | Description |
|--------|---------|-------------|
| GET | `/api/posts` | Ambil semua artikel |
| GET | `/api/posts/{id}` | Detail artikel |
| POST | `/api/posts` | Tambah artikel via JSON |

---

### 5. 🗄️ Database Structure

#### Tables

- **users**
- id
- username
- email
- password
- role

- **posts**
- id
- title
- slug
- content
- user_id
- category_id
- image

- **categories**
- id
- name
- slug

#### Relationships

- `posts.user_id → users.id` (one-to-many)
- `posts.category_id → categories.id` (one-to-many)

---

### 6. 🔒 Security

- **Auth Filter** → Protect admin routes
- **CSRF Protection** → Enabled on all forms
- **XSS Protection** → Output sanitized using `esc()`
- **Password Hashing** → `password_hash()`
- **File Upload Validation** → Type & size restriction

---

## 💡 Application Flow Diagram

```
[Visitor]
│
├─ /login → Auth::login → Session created → /dashboard
│
├─ / → Home::index → List Artikel
│ └─ click → /post/{slug} → detail
│
├─ /category/{slug} → filter → list artikel
│
└─ /search?q=keyword → search → list artikel

[Admin]
│
├─ /dashboard → Menu CRUD Artikel
│ ├─ /posts/create → store
│ ├─ /posts/edit/{id} → update
│ └─ /posts/delete/{id} → delete
│
└─ /api/posts → JSON endpoints
```

---

## 🚀 Notes

- Gunakan migration & seeder untuk setup database awal
- Pastikan folder `/writable/uploads` writable untuk upload gambar
- Semua route admin dilindungi oleh AuthFilter
- API dapat digunakan untuk integrasi dengan frontend lain (SPA / mobile)

---

## 📌 Author

Developed as a simple Blog CMS using MVC architecture.