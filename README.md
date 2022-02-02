# Laravel Inertia React Book Readers Club
readers club built in Laravel and React

## Demonstrated features:
System to illustrate the construction of a Laravel Inertia React application that will consume an API.
- Use of translate;
- Consumes Google Book API;
- Makes use of the "(Laravel) contracts pattern" enabling easy future partner changes;
- Illustrates use of some relations structures from Laravel/Eloquent ORM;
- Implements feature test of route;
- Integration of Ract components to old blade format template;
- Use of Laravel fortify package;

# How to use

Just read "how to install" and use as a normal laravel project

## Pre requisitos
* Docker 20 (or higher)
* docker-compose
* php 8.0
* Composer 2

## How to install

Run the following command sequence:
* clone the project using git
* copy .env.example to .env and set the values
* Set up your database (read the "set the database" item for details)
* run ```./artisan key:generate```
* run ```./artisan migrate:install```
* run ```./artisan migrate```

## Set the database

To use the system it is necessary to have a database. The project provides a docker instance to be used with docker-composer.

We recommend using MySQL 5.7 or higher. Previous versions will generate errors in the laravel project's default migration files;

To use docker just run the sequence below:

```bash
mysql -h 127.0.0.1 -u root -p123456 -e "CREATE DATABASE laravel; GRANT ALL PRIVILEGES ON laravel.* TO 'myuser'@'%';"
```

PS: User "myuser" is created by docker-composer according to .env file

# License

This is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).

# Thanks

Image used in project
https://www.freepik.com/free-photo/blue-background-with-six-books-blank-space_1092453.htm


Google and Google API team
https://developers.google.com/books/docs/v1/using