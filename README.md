<p align="center">
  <img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo">
</p>

# SmartSociety - Housing Society Management System

SmartSociety is a comprehensive, web-based Housing Society Management System designed to centralize administration, visitor security, maintenance billing, complaint resolution, and facility booking. Built using the Laravel framework, the system provides tailored, role-based interfaces for Society Administrators, Residents/Homeowners, and Security Guards.

---

## Key Features

* **Multi-Role Authentication & Access Control:** Secure role-based dashboards for Admins, Residents, and Security Guards.
* **Resident Portal:**

  * View and track maintenance dues/invoices.
  * Log and track maintenance helpdesk tickets (plumbing, electrical, etc.).
  * Pre-approve visitors and generate digital gate passes.
  * Check real-time availability and book shared community amenities (clubhouse, sports courts, etc.).
* **Security Guard Portal:**

  * Record walk-in visitor details, vehicle numbers, and entry timestamps.
  * Verify visitor entry clearances and manage gate logs.
* **Administration Portal:**

  * Onboard/offboard residents and manage flat occupancy.
  * Generate monthly maintenance bills and monitor collections.
  * Broadcast emergency announcements and manage helpdesk ticket routing.

---

## Technology Stack

* **Backend:** PHP 8+ with Laravel Framework
* **Frontend:** HTML5, CSS3, Blade Templates, Tailwind CSS / Bootstrap 5
* **Database:** MySQL / PostgreSQL

---

## Project Installation Instructions

To get a local copy up and running, follow these steps:

### 1. Clone the Repository

```bash
git clone https://github.com/tuaha-dev/smart-society-management-.git
cd smart-society-management-
```

### 2. Install PHP Dependencies

```bash
composer install
```

### 3. Set Up Environment Configuration

Copy the `.env.example` file and generate the Laravel application key:

```bash
cp .env.example .env
php artisan key:generate
```

### 4. Configure the Database

Open the `.env` file and update your database credentials:

```env
DB_DATABASE=smart_society
DB_USERNAME=root
DB_PASSWORD=
```

### 5. Run Migrations and Seeders

```bash
php artisan migrate --seed
```

### 6. Start the Local Development Server

```bash
php artisan serve
```

Access the application in your browser at:

```text
http://127.0.0.1:8000
```

---

## Login Credentials

| Role     | Email                                                         | Password |
| -------- | ------------------------------------------------------------- | -------- |
| Admin    | [admin@smartsociety.com](mailto:admin@smartsociety.com)       | password |
| Resident | [resident@smartsociety.com](mailto:resident@smartsociety.com) | password |
| Guard    | [guard@smartsociety.com](mailto:guard@smartsociety.com)       | password |

> **Note:** These credentials are intended for local development/testing environments. Change default passwords before deploying the application to production.

---

## Sitemap & Application Flow

### Welcome Page

**Route:** `/`

Landing page containing the application overview and system information.

### Guest Portal

**Route:** `/login`

Provides authentication for Admins, Residents, and Security Guards.

### Admin Portal

**Route:** `/admin/dashboard`

Administrators can:

* Access the admin dashboard.
* Manage residents and homeowners.
* Manage maintenance billing.
* Oversee complaints and helpdesk tickets.
* Monitor visitor and gate logs.
* Manage society announcements.

### Resident Portal

**Route:** `/resident/dashboard`

Residents can:

* Access their personal dashboard.
* Submit and track complaints.
* View maintenance invoices.
* Track maintenance dues.
* Pre-approve visitors.
* Generate visitor gate passes.
* Book community amenities.

### Guard Portal

**Route:** `/guard/dashboard`

Security Guards can:

* Access the security dashboard.
* Log walk-in visitors.
* Record vehicle information.
* Verify visitor gate passes.
* Monitor visitor entry and exit records.

---

## Application Modules

| Module               | Description                                      |
| -------------------- | ------------------------------------------------ |
| Authentication       | Secure login and role-based access control       |
| Resident Management  | Manage homeowners, residents, and flat occupancy |
| Maintenance Billing  | Generate and track monthly maintenance invoices  |
| Complaint Management | Submit, assign, and track maintenance complaints |
| Visitor Management   | Pre-approve and record society visitors          |
| Gate Pass Management | Generate and verify digital visitor passes       |
| Security Management  | Maintain visitor and gate entry logs             |
| Amenity Booking      | Book shared society facilities                   |
| Announcements        | Broadcast important society notifications        |
| Admin Dashboard      | Centralized management and monitoring            |

---

## User Roles

### Administrator

The Administrator has complete control over the housing society management system, including residents, billing, complaints, announcements, visitors, and security records.

### Resident / Homeowner

Residents can manage their maintenance information, submit complaints, approve visitors, view invoices, and book available society amenities.

### Security Guard

Security Guards manage visitor entry, verify gate passes, record vehicle information, and maintain security gate logs.

---

## Installation Requirements

Before installing SmartSociety, make sure your system has the following:

* PHP 8.0 or higher
* Composer
* Laravel
* MySQL or PostgreSQL
* Node.js and npm
* Git
* A local development environment such as XAMPP, Laragon, or similar

---

## Useful Laravel Commands

### Start the Application

```bash
php artisan serve
```

### Clear Application Cache

```bash
php artisan optimize:clear
```

### Run Database Migrations

```bash
php artisan migrate
```

### Run Migrations with Seeders

```bash
php artisan migrate --seed
```

### Generate Application Key

```bash
php artisan key:generate
```

---

## Project Structure

```text
smart-society-management-
│
├── app/
│   ├── Http/
│   ├── Models/
│   └── Providers/
│
├── database/
│   ├── migrations/
│   └── seeders/
│
├── public/
│
├── resources/
│   ├── css/
│   ├── js/
│   └── views/
│
├── routes/
│   ├── web.php
│   └── console.php
│
├── storage/
├── tests/
├── .env.example
├── artisan
├── composer.json
└── README.md
```

---

## Security

SmartSociety uses Laravel's authentication and authorization capabilities to provide role-based access to different areas of the application.

For production deployment:

* Change all default passwords.
* Use a strong `APP_KEY`.
* Never commit the `.env` file to Git.
* Configure secure database credentials.
* Use HTTPS.
* Disable debug mode.
* Keep Laravel and PHP dependencies updated.

---

## Development

This project is intended to provide a centralized platform for managing housing society operations and improving communication between administrators, residents, and security staff.

The modular structure allows additional features and integrations to be added as the system evolves.

---

## License

This project is developed for educational and project purposes.

---

## Author

**Tuaha Dev**

GitHub Repository:

https://github.com/tuaha-dev/smart-society-management-
