## Requirements

    PHP 8.2
    Composer 2
    Node.js v18.20.7
    npm v10.8.2

## Getting started

Clone the repository

    git clone git@github.com:waltprorok/canyon-gbs-wprorok.git

Switch to the repo folder

    cd canyon-gbs-wprorok

Install all the dependencies using composer

    composer install


Copy the example env file and make the required configuration changes in the .env file

    cp .env.example .env
 
Set key and value in env file

    APP_URL=http://127.0.0.1:8000

Generate a new application key

    php artisan key:generate

Install and build node dependencies

    npm install
    npm run build

Run the database migrations (**Set the database connection in .env before migrating**)

    php artisan migrate

Database seeding

    php artisan db:seed

Install Filament Dependency 

    php artisan filament:install --panels

Start the local development server

    php artisan serve

You can now access the server at http://localhost:8000

## Log into Admin Panel

    URL: http://127.0.0.1:8000/admin/login
    User: admin@domain.com
    Password: password!
