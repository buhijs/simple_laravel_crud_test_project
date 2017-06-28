# simple_laravel_crud_test_project
Simle Laravel CRUD project with ajax . This project is test of how to create Laravel project.

## Requirements
- composer
- mysql


## Prerequisites
1. Clone repository or download zip.
<pre>
git clone git@github.com:buhijs/simple_laravel_crud_test_project.git
</pre>
2. After clonig repository or downloading, go to root folder and run folowing commands
<pre>
composer install
composer update
</pre>
3. Change `.env.example` to `.env` and change the following file content area - database settings
<pre>
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
<b>DB_DATABASE= <i>YOUR DATABASE YOU CREATED FOR THIS PROJECT (empty database)</i>
DB_USERNAME= <i>MYSQL USER (root or something else)</i>
DB_PASSWORD= <i>MYSQL USER PASSWORD</i></b>
</pre>
4. Use `php artisan migrate` command to import database test table for tbis project
5. You can start project two ways through commands

| artisan | php |
|--------|--------|
|     php artisan serve   |    php -S localhost:8080 -t public    |

