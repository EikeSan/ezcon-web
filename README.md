# EzCon-Web
Web System for condominium made with Laravel

## How Install to local server ##

* `git clone https://github.com/EikeSan/ezcon-web`
* `composer install`
* `php artisan key:generate`
* `Create a database and put it in .env`
* `php artisan migrate` This will create the tables 
* `php artisan db:seed` This will populate some data in databas. eg: apartments
* `php artisan serve to start a local server in: http://localhost:8000/`
