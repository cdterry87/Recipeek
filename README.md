# laravel-vuetify

## About this preset
This preset is intended to be a quick start for using Laravel + Vue + Vuetify.

## Installation
Clone the repo & move into directory
```
git clone https://github.com/cdterry87/Recipeek.git && cd Recipeek
```

Install Dependencies
```
composer install
npm install
```

Setup .env
```
cp .example.env .env
php artisan key:generate

-- Update .env database settings as needed --
```

Migrate Database and setup local file storage
```
php artisan migrate
php artian storage:link
```