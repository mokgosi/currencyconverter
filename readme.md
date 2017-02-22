Installation

clone: https://github.com/mokgosi/currencyconverter.git

From projet root folder, run

-- composer update


===========================================================================

DATABASE SETTINGS:

From your mysql cli, run:

> create database currencyconverter;

Change your .evn settings accordingly

DB_DATABASE=currencyconverter

DB_USERNAME=<username>

DB_PASSWORD=<password>

============================================================================

COMPLETE INSTALLATION

From projet folder, run the following commands to complete installation

-- php artisan migrate

-- php artisan db:seed



============================================================================

TEST YOUR APP

From projet folder, run

-- php artisan serve


Then, Browse to http://localhost:8000/ on your browser

Login details:

username/email: admin@gmail.com

password: secret