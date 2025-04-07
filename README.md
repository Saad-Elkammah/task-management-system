# Task Management System

![Laravel](https://img.shields.io/badge/Laravel-11.31-red.svg)
![PHP](https://img.shields.io/badge/PHP-8.2+-purple.svg)
![Tailwind CSS](https://img.shields.io/badge/Tailwind_CSS-3.x-38B2AC.svg)

A modern, responsive task management system built with Laravel and Tailwind CSS that allows teams to efficiently create, assign, and track tasks.

## 🚀 Features

- **User Role Management**: Admin and regular user roles with different permissions
- **Task Creation & Assignment**: Create tasks and assign them to multiple users
- **Task Status Tracking**: Monitor tasks through different status stages (Pending, In Progress, Completed)
- **Dashboard Analytics**: Visual statistics showing task distribution and completion rates
- **Responsive Design**: Works seamlessly on desktop and mobile devices
- **User Authentication**: Secure login and registration system
- **Admin Controls**: Admin panel for user and task management

## 📋 Requirements

- PHP 8.2+
- Composer
- MySQL 5.7+
- Node.js and NPM

## 🛠️ Installation

1. Clone the repository:

   ```bash
   git clone https://github.com/Saad-Elkammah/task-management-system.git
   cd task-management-system
   ```
2. Install PHP dependencies:

   ```bash
   composer install
   ```
3. Install and compile front-end dependencies:

   ```bash
   npm install
   npm run dev
   ```
4. Set up environment variables:

   ```bash
   cp .env.example .env
   php artisan key:generate
   ```
5. Configure your database in the `.env` file:

   ```
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=task_management
   DB_USERNAME=root
   DB_PASSWORD=
   ```
6. Run database migrations and seed data:

   ```bash
   php artisan migrate --seed
   ```
7. Start the development server:

   ```bash
   php artisan serve
   ```
8. Visit `http://localhost:8000` in your browser

## 🔐 Login Credentials

### Admin User

- **Email**: admin@example.com
- **Password**: password

### Regular User

- **Email**: user@example.com
- **Password**: password

## 🖥️ Usage

### For Admins:

- Create, edit, and delete tasks
- Assign tasks to one or multiple users
- View all tasks in the system
- Manage user accounts
- View dashboard analytics

### For Regular Users:

- View tasks assigned to them
- Update the status of their tasks
- Mark tasks as completed
- Filter tasks by status

## 🔧 Project Structure

```
app/
  ├── Http/
  │   ├── Controllers/    # Controller logic
  │   ├── Middleware/     # Request middleware
  │   └── Requests/       # Form requests and validation
  ├── Models/             # Eloquent models (User, Task)
  └── Policies/           # Authorization policies
resources/
  ├── css/               # Tailwind CSS
  ├── js/                # JavaScript
  └── views/             # Blade templates
    ├── auth/           # Authentication views
    ├── components/     # Reusable UI components
    ├── layouts/        # Layout templates
    ├── profile/        # User profile views
    └── tasks/          # Task management views
```

## 🛡️ Security

The application implements:

- Role-based access control using Spatie Permissions
- CSRF protection
- Form validation
