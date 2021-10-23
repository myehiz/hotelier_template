
# hotelier-api

API retrieves the Hotels Data

## Getting Started

These instructions will get you a copy of the project up and running on your local machine for development and testing purposes. See deployment for notes on how to deploy the project on a live system.

### Prerequisites

* PHP 7.0
* Mysql 7.5
* Composer (https://getcomposer.org/)



## Deployment

Execute the following command in your project root :

   
    Create your DB and change the credential in .env 
    composer install
    php artisan migrate
    php artisan db:seed
    php artisan serve


## Running the tests
  Execute the following command in your project root to install this library:

	./vendor/bin/phpunit 


### Postman collection
    https://www.getpostman.com/collections/43890dea7edeb5a0adeb

## Built With

* [Laravel](https://laravel.com/)
* [PHPunit](https://phpunit.de/) Used to generate unit testing
* [swagger 3](https://swagger.io/)


## Commits history

* Design Api using swagger
* setup database structure and migration and seeder
* create validation layer
* add apis with test
* add book api 



### Documentation
you can see Api documentation on this url

      {url}/api/documentation
