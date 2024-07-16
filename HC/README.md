# HostelConnect

HostelConnect is a web-based platform designed to simplify the process of finding and managing hostel accommodations for both students and landlords.

# Installation Guide

To set up HostelConnect locally, follow these steps:

# 1. Clone the Repository

First, clone the repository from GitHub:

git clone https://github.com/egkimari/CH.git
cd Hostel-Connect

# 2. Install Dependencies

Install the required dependencies using Composer and npm:
composer install
npm install
npm run dev


# 3. Configure Environment Variables

Copy the example environment file and generate an application key:
cp .env.example .env
php artisan key:generate


# 4. Run Migrations and Seed the Database
Run the database migrations and seed the database with initial data:

php artisan migrate --seed


# 5. Start the Local Development Server

Start the local development server:
php artisan serve


# Usage

# Access the Admin Panel

Access the admin panel at `http://localhost:8000/admin` to manage hostels and users through the admin interface.

# Additional Commands
- Rollback the last database migration and re-run all migrations:
    php artisan migrate:rollback
    php artisan migrate

- Seed the database with user data:
    php artisan db:seed --class=UsersTableSeeder

- List all routes:  
    php artisan route:list  

- Rebuild the Composer autoload file:   
    composer dump-autoload  

- Clear route, view, and cache:    
    php artisan route:clear
    php artisan view:clear
    php artisan cache:clear

    php artisan storage:link
    php artisan test

    mkdir -p app/View/Components/Auth
