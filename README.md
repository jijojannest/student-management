# Getting started

## Installation

Please check the official laravel installation guide for server requirements before you start. [Official Documentation](https://laravel.com/docs/5.4/installation#installation)


Clone the repository

    git clone https://github.com/jijojannest/student-management.git

Switch to the repo folder

    cd student-management

Install all the dependencies using composer and npm

    composer install
    npm install
    

Copy the example env file and make the required configuration changes in the .env file

    cp .env.example .env

Generate a new application key

    php artisan key:generate
    
Run the database migrations (**Set the database connection in .env before migrating**)

    php artisan migrate
    
Start the local development server

    php artisan serve
    
Run the database seeder and you're done

    php artisan db:seed

***Note*** : It's recommended to have a clean database before seeding. You can refresh your migrations at any point to clean the database by running the following command

    php artisan migrate:refresh
    
    
 # Cross-Origin Resource Sharing (CORS)
 
This applications has CORS enabled by default on all API endpoints. The default configuration allows requests from `http://localhost:3000` and `http://localhost:4200` to help speed up your frontend testing. The CORS allowed origins can be changed by setting them in the config file. Please check the following sources to learn more about CORS.
 
- https://developer.mozilla.org/en-US/docs/Web/HTTP/Access_control_CORS
- https://en.wikipedia.org/wiki/Cross-origin_resource_sharing
- https://www.w3.org/TR/cors
