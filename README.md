# Secure PHP Authentication & CRUD System
**Practical Coding Test Implementation**

## 🛠️ Tech Stack
- **Backend**: PHP 8.x
- **Database**: MySQL / MariaDB
- **Frontend**: Bootstrap 5 (CSS), Vanilla JavaScript
- **API/Library**: PDO (PHP Data Objects) for secure database abstraction
- **Local Server**: XAMPP

---

## 🚀 System Features
- **User Authentication**: Secure Login/Registration using `password_hash()` and `password_verify()`.
- **Session Management**: 30-minute auto-timeout and session regeneration to prevent fixation.
- **Full CRUD functionality**:
    - **Create**: Add new user records via secure POST requests.
    - **Read**: Dynamic data display in a responsive Bootstrap table.
    - **Update**: Modify existing user information with pre-filled forms.
    - **Delete**: Remove records with JavaScript confirmation and CSRF validation.
- **Security Protocols**:
    - **CSRF Protection**: Tokens implemented on all data-modifying forms.
    - **XSS Prevention**: Global sanitization helper function `e()` for output escaping.
    - **SQL Injection Prevention**: Forced use of PDO Prepared Statements.

---

## 📥 XAMPP Setup Instructions

1. **Folder Placement**:
   - Clone or move this project folder into your XAMPP `htdocs` directory:
   - `C:\xampp\htdocs\auth-system-crud\`

2. **Database Setup**:
   - Ensure **Apache** and **MySQL** are running in the XAMPP Control Panel.
   - Access `http://localhost/phpmyadmin/`.
   - Create a new database named `auth_system`.
   - Click **Import**, select the `user.sql` file from the `/database/` folder, and click **Go**.

3. **Configuration**:
   - Open `config/db.php` and verify your credentials (default: `root` / no password).

4. **Run**:
   - Navigate to `http://localhost/auth-system-crud/` in your browser.

---

## 📂 Project Structure
- `auth/` - Login, registration, and logout logic.
- `config/` - PDO Database connection settings.
- `database/` - Contains `user.sql` for database initialization.
- `includes/` - Header, footer, and core security functions (CSRF/XSS).
- `index.php` - The User Dashboard.
- `create.php`, `edit.php`, `delete.php` - CRUD implementation files.