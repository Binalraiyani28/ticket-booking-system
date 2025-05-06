# Ticket Booking System

A Laravel-based application for event listing and ticket booking using AJAX.

## Features
- User login/logout
- View and book events
- AJAX ticket booking
- Booking history with pagination

## Requirements
- PHP >= 8.0
- MySQL
- Composer
- Laravel 10

## Installation

1. **Clone Repository**
```bash
git clone https://github.com/Binalraiyani28/ticket-booking-system.git
cd ticket-booking-system


2. **Install Dependencies**
composer install

3. **Configure .env**
cp .env.example .env
php artisan key:generate


4. **Set Database Credentials in .env**
DB_DATABASE=your_db
DB_USERNAME=root
DB_PASSWORD=

5. **Run Migrations & Seeders**
php artisan migrate --seed


6. **Serve**
php artisan serve

## An exported SQL schema is available at:

database/schema.sql



