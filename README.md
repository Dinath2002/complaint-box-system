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

