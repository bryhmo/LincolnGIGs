# 💼 JobBoard — Laravel Job Listing Platform

> A modern, full-featured job listing web application built with Laravel 10, MySQL and Tailwind CSS. Connecting employers with job seekers through a clean, intuitive and responsive platform.

👨‍💻 **Developer:** [Isiaka Ibrahim](https://portfolio-isiaka-ibrahim.vercel.app/)  
🛠️ **Built With:** Laravel 10, MySQL & Tailwind CSS

---

## 📌 About The Project

JobBoard is a production-ready job listing platform that bridges the gap between **employers** and **job seekers**. Employers can post and manage job listings while job seekers can search, filter and apply for jobs — all managed through a powerful **Admin panel** that oversees the entire platform.

The platform features job application tracking, category-based filtering, email notifications, and an integrated blog system for career advice and industry news.

---

## 👥 User Roles

### 🔑 Admin
- Full platform control and oversight
- Manage all job listings and applications
- Manage employers and job seekers accounts
- Manage job categories and filters
- Moderate and publish blog articles
- View platform analytics and reports
- Send system-wide email notifications

### 🏢 Employer
- Register and manage company profile
- Post new job listings
- Manage and edit existing job postings
- View and track job applications
- Filter and shortlist candidates
- Receive email notifications for new applications
- Mark applications as reviewed, accepted or rejected

### 👨‍💼 Job Seeker
- Register and build personal profile
- Browse and search job listings
- Filter jobs by category, location and type
- Apply for jobs directly on the platform
- Track status of submitted applications
- Receive email notifications on application updates
- Read blog articles for career tips

---

## ✨ Key Features

- ✅ Role-based authentication (Admin, Employer, Job Seeker)
- ✅ Job listings with search and advanced filters
- ✅ Category and job type filtering
- ✅ Job application tracking system
- ✅ Email notifications for applications and updates
- ✅ Admin panel for full platform management
- ✅ Blog system with articles and career tips
- ✅ Fully responsive design with Tailwind CSS
- ✅ Secure authentication with Laravel Breeze/Sanctum
- ✅ SEO-friendly job listing pages

---

## 🛠️ Technology Stack

| Technology | Purpose |
|---|---|
| Laravel 10 | Backend framework |
| PHP 8.1+ | Backend language |
| MySQL | Database |
| Tailwind CSS | Frontend styling |
| Laravel Blade | Templating engine |
| Laravel Mail | Email notifications |
| Eloquent ORM | Database management |
| Laravel Policies | Role-based access control |

---

## 📁 Project Structure

```
jobboard/
├── app/
│   ├── Http/
│   │   ├── Controllers/
│   │   │   ├── Admin/
│   │   │   │   ├── DashboardController.php
│   │   │   │   ├── JobController.php
│   │   │   │   ├── ApplicationController.php
│   │   │   │   ├── CategoryController.php
│   │   │   │   ├── BlogController.php
│   │   │   │   └── UserController.php
│   │   │   ├── Employer/
│   │   │   │   ├── DashboardController.php
│   │   │   │   ├── JobController.php
│   │   │   │   └── ApplicationController.php
│   │   │   ├── JobSeeker/
│   │   │   │   ├── DashboardController.php
│   │   │   │   └── ApplicationController.php
│   │   │   ├── JobListingController.php
│   │   │   └── BlogController.php
│   ├── Models/
│   │   ├── User.php
│   │   ├── Job.php
│   │   ├── Application.php
│   │   ├── Category.php
│   │   ├── Blog.php
│   │   └── Notification.php
│   ├── Mail/
│   │   ├── ApplicationReceived.php
│   │   └── ApplicationStatusUpdated.php
│   └── Policies/
│       ├── JobPolicy.php
│       └── ApplicationPolicy.php
├── database/
│   ├── migrations/
│   └── seeders/
├── resources/
│   ├── views/
│   │   ├── admin/
│   │   ├── employer/
│   │   ├── jobseeker/
│   │   ├── jobs/
│   │   ├── blog/
│   │   └── layouts/
│   └── css/
├── routes/
│   ├── web.php
│   └── auth.php
├── .env.example
├── composer.json
└── README.md
```

---

## 🗄️ Database Schema

Key tables include:

- **users** — User accounts with roles (admin, employer, job seeker)
- **jobs** — Job listings with title, description, type, location, salary
- **applications** — Job applications linking job seekers to jobs
- **categories** — Job categories and sub-categories
- **blogs** — Blog posts and articles
- **notifications** — Email and in-app notification records

---

## 🚀 Getting Started

### Prerequisites

- PHP 8.1 or higher
- MySQL 5.7 or higher
- Composer
- Node.js & npm (for Tailwind CSS)
- Laravel 10

### Installation

```bash
# Clone the repository
git clone https://github.com/bryhmo/jobboard.git

# Move into the project directory
cd jobboard

# Install PHP dependencies
composer install

# Install Node dependencies
npm install

# Copy environment file
cp .env.example .env

# Generate application key
php artisan key:generate
```

### Configure Environment

Open `.env` and update the following:

```env
APP_NAME=JobBoard
APP_URL=http://localhost

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=jobboard
DB_USERNAME=root
DB_PASSWORD=

MAIL_MAILER=smtp
MAIL_HOST=smtp.gmail.com
MAIL_PORT=587
MAIL_USERNAME=your-email@gmail.com
MAIL_PASSWORD=your-app-password
MAIL_ENCRYPTION=tls
MAIL_FROM_ADDRESS=your-email@gmail.com
MAIL_FROM_NAME="JobBoard"
```

### Run Migrations & Seeders

```bash
# Create database tables
php artisan migrate

# Seed default data (categories, admin account)
php artisan db:seed
```

### Build Assets & Start Server

```bash
# Build Tailwind CSS
npm run build

# Start development server
php artisan serve
```

Visit `http://localhost:8000` in your browser ✅

---

## 🔐 Default Login Credentials

| Role | Email | Password |
|---|---|---|
| Admin | admin@jobboard.com | password |
| Employer | employer@jobboard.com | password |
| Job Seeker | seeker@jobboard.com | password |

> ⚠️ Change all default passwords immediately after first login!

---

## 📧 Email Notifications

The platform sends automatic email notifications for:

- ✅ New job application received (to employer)
- ✅ Application status updated — accepted/rejected (to job seeker)
- ✅ New job posted in a category (to subscribed job seekers)
- ✅ Account registration confirmation

Emails are handled via **Laravel Mail** with **SMTP** configuration.

---

## 🔒 Security Features

- Password hashing with Laravel's built-in bcrypt
- CSRF protection on all forms
- Role-based access control with Laravel Policies
- SQL injection prevention via Eloquent ORM
- XSS protection with Blade templating
- Secure session management

---

## 📝 Blog System

The integrated blog allows admins to:
- Create and publish career advice articles
- Manage blog categories and tags
- Feature articles on the homepage
- Help job seekers with career tips and industry news

---

## 🌍 Deployment

### Deploy on Shared Hosting (cPanel)
1. Upload project files to `public_html`
2. Point document root to `/public`
3. Import database via phpMyAdmin
4. Update `.env` with production credentials
5. Run `php artisan config:cache` and `php artisan route:cache`

### Deploy on Railway / Render
1. Push to GitHub
2. Connect repo to Railway or Render
3. Add environment variables
4. Set start command to `php artisan serve --host=0.0.0.0`

---

## 🎯 Future Enhancements

- Resume/CV upload and parsing
- Advanced candidate search for employers
- Job alerts via email subscription
- Payment integration for featured job listings
- Mobile application
- API for third-party integrations

---

## 👨‍💻 Developer

**Isiaka Ibrahim** — Full Stack Developer & Lecturer

- 🌐 Portfolio: [portfolio-isiaka-ibrahim.vercel.app](https://portfolio-isiaka-ibrahim.vercel.app/)
- 💼 LinkedIn: [linkedin.com/in/techwithbrymo](https://www.linkedin.com/in/techwithbrymo)
- 🐙 GitHub: [github.com/bryhmo](https://github.com/bryhmo)
- 🐦 Twitter/X: [@codewithbryhmo](https://twitter.com/codewithbryhmo)
- 📱 WhatsApp: [+234 703 944 3182](https://wa.me/2347039443182)

---

## 📄 License

This project is open source and available under the [MIT License](LICENSE).

---

⭐ If you found this project helpful, feel free to star the repo and share!
