# Complaint Box System (DCBS)

>A simple, lightweight complaint management system written in PHP and MySQL. This repository contains a small admin/handler/complainer web app used to submit, assign, and manage complaints.

## Key features
- Multi-role users: admin, handler, complainer
- Submit complaints with media uploads
- Admin dashboard for user and handler management
- Handler dashboard for assigned complaints
- Simple, responsive UI with CSS variables for easy theming

## Repository layout
```
Source File/                # Application PHP files and assets
  assets/css/app.css        # Central stylesheet (variables & tokens)
  dcbs_db.sql               # Database schema / sample data
  *.php                    # App pages: index.php, admin_*.php, handler_*.php, etc.
video url.txt
Diagrams/
uploads/                   # Uploaded files (user media)
```

## Prerequisites
- PHP 7.4+ with mysqli extension
- MySQL / MariaDB
- A web server (built-in PHP server is fine for development)

## Quick start (development)
1. Copy the project to your development machine.
2. Create a database and import the schema:

```bash
mysql -u root -p your_database_name < "Source File/dcbs_db.sql"
```

3. Update `Source File/config.php` with your DB credentials. Example settings in `config.php`:

- $db_host, $db_user, $db_pass, $db_name

4. Start PHP's built-in server for quick testing (from the repository root):

```bash
php -S localhost:8000 -t "Source File"
```

5. Open http://localhost:8000 in your browser.

## Default admin bootstrap
The project contains a small admin-bootstrap routine (in `Source File/admin_login.php`) that ensures an admin user exists. The default credentials used by the bootstrap are:

- Email: `dbmanager@email.com`
- Password: `dbmanager123@`

Change these values in `Source File/admin_login.php` after your first login for security.

## Theme / UI customization
The UI uses CSS variables in `Source File/assets/css/app.css`. To change colors and the look-and-feel, edit the variables near the top of that file (the `:root` block). Key variables:

- `--logo` — primary accent color (buttons, accents)
- `--black` — dark surfaces (topbar, sidebar)
- `--surface` / `--surface-2` — card and panel backgrounds
- `--page-bg` — overall page background
- `--input-border` — form control borders
- `--status-*` — colors for success/error/warn/badges

Example: to change the primary color, update `--logo` in `Source File/assets/css/app.css` and optionally adjust `--logo-rgb` for translucent effects.

Buttons now include subtle glow and transition effects. If you want to tone down the glow, adjust the `box-shadow` values or transition durations in `app.css`.

## Security and deployment notes
- Replace the default admin bootstrap credentials and remove or harden any bootstrap code before deploying to production.
- Ensure `uploads/` is not directly executable on your web server — serve files safely or store outside the webroot.
- Use HTTPS in production and secure DB credentials (do not commit secrets).

## Contributing
Small fixes, theme tweaks, or bug reports are welcome. When contributing:
- Open an issue describing the problem
- Provide a short, focused pull request with tests or screenshots when relevant

## License
This project is provided as-is. Add your preferred license file if you plan to publish or redistribute.

----
If you'd like, I can further:
- Centralize all page-level CSS into a single stylesheet and remove inline styles.
- Create a small theme switcher (light/dark) that toggles CSS variables.
- Replace the default admin bootstrap with a migration/seed script.

Tell me which next step you want and I will implement it.
# Complaint Box System (PHP + MariaDB)

A simple, role-based web app for submitting, tracking, and resolving complaints in an institution (e.g., university or organization). Built with **PHP**, **MariaDB/MySQL**, and plain **HTML/CSS/JS**.

## ✨ Features

- **User (Complainer)**
  - Register / login
  - Submit a complaint with title, category, description, and optional attachment
  - View complaint status and replies
  - Edit profile, see “My Complaints”

- **Handler**
  - Login
  - View assigned complaints
  - Update status (e.g., Pending → In-Progress → Resolved)
  - Add notes/replies for the user

- **Admin**
  - Login
  - Manage users (create/delete handlers, view complainants)
  - View all complaints
  - Assign/reassign complaints to handlers
  - Basic reports/overview

## 🧱 Tech Stack

- **Backend:** PHP (>= 8.x recommended)
- **Database:** MariaDB / MySQL
- **Web server:** Apache / Nginx, or PHP built-in server for local dev
- **OS:** Works on Linux (tested on Fedora), Windows, macOS

## 📁 Project Structure
FINAL/
├─ Diagrams/
│ ├─ activity diagram.jpg
│ ├─ Architecture.png
│ ├─ class diagram.png
│ ├─ ER diagram.png
│ ├─ sequence diagram.png
│ └─ usecase.png
├─ Source File/
│ ├─ assets/ # CSS/JS/images
│ ├─ uploads/ # User file uploads (create & writable)
│ ├─ config.php # DB connection settings
│ ├─ dcbs_db.sql # Database schema + seed (import this)
│ ├─ index.php # Landing page
│ ├─ register.php # User registration
│ ├─ login.php / logout.php
│ ├─ about.php / help.php / footer.php / topbar.php
│ ├─ complainer_dashboard.php
│ ├─ my_complaints.php
│ ├─ submit_complaint.php
│ ├─ view_complaint.php / view_complaint_handler.php
│ ├─ create_handler.php / create_handler.php (form + handler)
│ ├─ handler_dashboard.php / handler_my_complaints.php / handler_profile.php
│ ├─ admin_login.php / admin_logout.php
│ ├─ admin_dashboard.php / admin_users.php / admin_delete_user.php
│ └─ logo.php (branding helper if used)
├─ Final Report.pdf
└─ video url.txt


> Note: File names above match your current tree; keep them as-is.

## ⚙️ Setup (Local)

### 1) Clone and prepare
```bash
git clone https://github.com/<Dinath2002>/complaint-box-system.git
cd complaint-box-system/FINAL/Source\ File

mkdir -p uploads
# Linux:
chmod 755 uploads
# If you get permission issues on local dev:
chmod 775 uploads

#Database (MariaDB/MySQL)
CREATE DATABASE complaint_box CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE complaint_box;

-- From the project folder, import the SQL dump:
-- Linux:
-- mysql -u root -p complaint_box < "FINAL/Source File/dcbs_db.sql"

#Configure database credentials
<?php
$DB_HOST = "localhost";
$DB_USER = "root";           // or your chosen DB user
$DB_PASS = "your_password";  // set it during mysql_secure_installation
$DB_NAME = "complaint_box";

$conn = new mysqli($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME);
if ($conn->connect_error) {
    die("Database connection failed: " . $conn->connect_error);
}
?>


#Run locally
php -S localhost:8000

🙌 Credits
Developed as part of coursework by S. Dinath.
Built with PHP and MariaDB on Fedora; UI with basic HTML/CSS/JS.

If you want, I can also add this README to your repo and include quick badges or screenshots.
