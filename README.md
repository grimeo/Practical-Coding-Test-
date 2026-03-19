# Secure PHP Authentication & CRUD System

## 🚀 Features

### 1. User Authentication
- **Secure Registration & Login**: Implemented using `password_hash()` and `password_verify()`.
- **Session Management**: Secure session handling with a **30-minute auto-timeout** and session regeneration upon login to prevent fixation.
- **Access Control**: Strict redirection logic ensures the dashboard and CRUD operations are only accessible to authenticated users.

### 2. CRUD Operations
- **Create**: Add new user profiles directly from the dashboard.
- **Read**: Dynamic HTML table displaying all registered users.
- **Update**: Edit existing user information with pre-filled forms.
- **Delete**: Remove records with a JavaScript confirmation prompt to prevent accidental data loss.

### 3. Security Measures (Core Focus)
- **CSRF Protection**: Implementation of anti-Cross-Site Request Forgery tokens on all data-modifying requests (Create, Update, Delete).
- **XSS Prevention**: Global sanitization helper function `e()` using `htmlspecialchars` to prevent script injection.
- **SQL Injection Prevention**: 100% reliance on **PDO (PHP Data Objects)** with prepared statements and bound parameters.
- **Input Validation**: Server-side and client-side validation for all forms.

---

## 🛠️ Tech Stack
- **Backend**: PHP 8
- **Database**: MySQL / MariaDB
- **Frontend**: Bootstrap 5 (CSS), Vanilla JavaScript
- **API/Library**: PDO for Database abstraction
- **Local Server**: XAMPP 

