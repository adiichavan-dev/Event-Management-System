<div align="center">

# 🎉 Event Management System

**A Web-Based Event Booking & Management System built with PHP & MySQL**

*BCA Final Year Major Project*

![PHP](https://img.shields.io/badge/PHP-8.x-777BB4?style=for-the-badge&logo=php&logoColor=white)
![MySQL](https://img.shields.io/badge/MySQL-8.x-4479A1?style=for-the-badge&logo=mysql&logoColor=white)
![HTML5](https://img.shields.io/badge/HTML5-E34F26?style=for-the-badge&logo=html5&logoColor=white)
![CSS3](https://img.shields.io/badge/CSS3-1572B6?style=for-the-badge&logo=css3&logoColor=white)
![JavaScript](https://img.shields.io/badge/JavaScript-F7DF1E?style=for-the-badge&logo=javascript&logoColor=black)

</div>

---

## 📖 About the Project

**Event Management System** is a full-stack web application that allows users to browse events, select packages, and book events online. Admins can manage events, packages, bookings, and contact messages from a dedicated dashboard.

The system has two separate portals — a **User portal** for browsing and booking, and an **Admin panel** for complete management control.

---

## ✨ Features

| Module | Description |
|--------|-------------|
| 🎪 **Event Browsing** | Users can view available events with images and descriptions |
| 📦 **Package Selection** | Silver, Gold, and Platinum packages with pricing and services |
| 📅 **Event Booking** | Users can book events by selecting date, package, and providing details |
| 👤 **User Auth** | Register and login system for users |
| 🔐 **Admin Panel** | Separate admin login to manage everything |
| 📋 **Manage Events** | Admin can add, edit, and delete events |
| 📦 **Manage Packages** | Admin can create and update event packages |
| 📩 **Contact Form** | Users can send messages, admin can view all contacts |
| 📊 **Admin Dashboard** | Overview of bookings and system stats |

---

## 🖥️ Screenshots

<img width="946" height="547" alt="image" src="https://github.com/user-attachments/assets/b2003e0d-361e-4590-8d8e-358da04224a5" />
<img width="927" height="534" alt="image" src="https://github.com/user-attachments/assets/323cc9a4-21a2-41fd-aed9-aabb9d35ee6e" />
<img width="929" height="993" alt="image" src="https://github.com/user-attachments/assets/9427ea7c-9223-46ab-b96f-87def7160751" />
<img width="924" height="1136" alt="image" src="https://github.com/user-attachments/assets/5d84d0be-98e3-4487-9e9f-dbb4cfc40021" />
<img width="926" height="521" alt="image" src="https://github.com/user-attachments/assets/28d71daf-0a74-4639-9ba2-d76668cfb6f4" />
<img width="928" height="993" alt="image" src="https://github.com/user-attachments/assets/6668a7ef-129b-469d-9e66-d41d479e9ded" />
<img width="918" height="692" alt="image" src="https://github.com/user-attachments/assets/71234d65-a5ba-45bc-8abe-d6539a418c30" />
<img width="927" height="522" alt="image" src="https://github.com/user-attachments/assets/2e587f2c-565f-44ee-b582-d1a48d758ab6" />
<img width="926" height="522" alt="image" src="https://github.com/user-attachments/assets/726867cd-bad8-4cbb-bb18-f66d17d57d65" />


---

## 🏗️ Project Structure

```
asproject/
│
├── login.php                   # User login page
├── register.php                # User registration
├── logout.php                  # Session logout
├── packages.php                # Public packages page
├── contact.php                 # Public contact page
├── event_management.sql        # Full MySQL database schema + sample data
│
├── user/                       # User portal
│   ├── index.php               # User home page — event listings
│   ├── packages.php            # Packages & booking page
│   ├── contact.php             # Contact form
│   └── logout.php              # User logout
│
├── admin/                      # Admin panel
│   ├── admin.php               # Admin login
│   ├── admin_dashboard.php     # Dashboard — stats & overview
│   ├── admin_register.php      # Register new admin
│   ├── manage_packages.php     # Add / edit / delete packages
│   └── add_event.php           # Add new events
│
├── includes/
│   └── db.php                  # MySQL database connection
│
└── assets/
    ├── css/
    │   └── style.css           # Main stylesheet
    ├── js/
    │   └── script.js           # JavaScript utilities
    └── images/                 # Event images (event1–6.jpg)
```

---

## 🚀 Installation & Setup

### Prerequisites
- PHP 8.x or above
- MySQL 8.x or above
- XAMPP, WAMP, or Laragon (for local development)

### Steps

**1. Clone the repository**
```bash
git clone https://github.com/adiichavan-dev/Event-Management-System.git
```

**2. Move to your server's web root**
```
# For XAMPP:
Copy the folder to:  C:/xampp/htdocs/asproject/

# For WAMP:
Copy the folder to:  C:/wamp64/www/asproject/
```

**3. Create the database**
- Open **phpMyAdmin** → `http://localhost/phpmyadmin`
- Create a new database named `event_management`
- Click **Import** → select `event_management.sql` → click Go

**4. Configure the database connection**

Open `includes/db.php` and update your credentials:
```php
$conn = new mysqli('localhost', 'root', 'YOUR_PASSWORD', 'event_management');
```

**5. Run the project**
```
http://localhost/asproject/user/index.php
```

---

## 🔑 Login Credentials

| Role | Username | Password |
|------|----------|----------|
| Admin | `admin_as` | `admin123` |
| User | `as5353` | as@535 |

> ⚠️ **Change the default admin password after first login.**

---

## 👥 User Roles

```
Admin
 └── Login via admin/admin.php
 └── Manage events, packages, view bookings and contact messages

User
 └── Register / Login
 └── Browse events, select packages, book events, contact admin
```

---

## 📦 Available Packages

| Package | Price | Services |
|---------|-------|----------|
| 🥈 Silver | ₹30,000 | Venue Decoration, Basic Catering, Sound System |
| 🥇 Gold | ₹75,000 | Venue Decoration, Premium Catering, Sound System, Photography |
| 💎 Platinum | ₹1,50,000 | Venue Decoration, Premium Catering, Sound System, Photography, Live Entertainment |

---

## 🛠️ Tech Stack

- **Backend:** PHP 8 (pure PHP, no framework)
- **Database:** MySQL with MySQLi
- **Frontend:** HTML5, CSS3, Vanilla JavaScript
- **Architecture:** Multi-page application with session-based authentication

---

## 📚 College Project Info

> This project was developed as a **Major Project** for BCA Final Year.
> It demonstrates full-stack PHP development with role-based access control, session management, dynamic content rendering, and MySQL database design.

---

## 📄 License

This project is open source and available under the [MIT License](LICENSE).

---

<div align="center">
Made with ❤️ as BCA Final Year Major Project
</div>
