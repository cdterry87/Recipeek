# Recipeek
A simple way to store and search recipes. Made with Laravel and VueJS.

## Requirements:
PHP 7.1

## Installation:
1. Clone the project to your local PC.
```
git clone https://github.com/cdterry87/Recipeek.git
```

2. Setup the application:
```
composer install          # Install dependencies with composer
cp .env.example .env      # Create your .env file based on the .env.example file and change the appropriate values
php artisan key:generate  # Generate an application key for your project
php artisan migrate       # Migrate the database schema
php artisan db:seed       # Seed the database with sample data

php artisan serve         # Runs the application on a local web server
```

3. In your browser, view the application and login ( Username: admin@example.com | Password: password )
