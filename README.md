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
