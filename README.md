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

1. **Clone the repository:**

   ```bash
   git clone https://github.com/tuaha-dev/smart-society-management-.git
   cd smart-society-management-
   ```

2. **Install PHP dependencies:**

   ```bash
   composer install
   ```

3. **Set up environment configuration:**

   ```bash
   cp .env.example .env
   php artisan key:generate
   ```

4. **Configure Database:**

   Open the `.env` file and update your database credentials:

   ```env
   DB_DATABASE=smart_society
   DB_USERNAME=root
   DB_PASSWORD=
   ```

5. **Run Migrations & Seeders:**

   ```bash
   php artisan migrate --seed
   ```

6. **Start the local development server:**

   ```bash
   php artisan serve
   ```

Access the application in your browser at `http://127.0.0.1:8000`.

---

## Login Credentials

|   Role   |  Password   |
| -------- | ----------- |
| Admin    | password123 |
| Resident | password123 |
| Guard    | password123 |

---

## Sitemap & Application Flow

* **Welcome Page (`/`)** → Landing page containing application overview and system sitemap.
* **Guest Portal** → Login (`/login`)
* **Admin Portal** → Dashboard (`/admin/dashboard`), Manage Billings, Oversee Complaints & Gate Logs.
* **Resident Portal** → Dashboard (`/resident/dashboard`), Submit Complaints, Book Amenities, View Invoices.
* **Guard Portal** → Dashboard (`/guard/dashboard`), Log Visitors, Verify Gate Passes.

---