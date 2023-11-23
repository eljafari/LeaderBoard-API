<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

#
● Create an endpoint that returns the users info grouped by score and include the average  age of the users in json format. <br/>
● Using queues/jobs generate a QR code that stores the user address after user  creation. Store that QR image locally. You may use (https://goqr.me/api/) <br/>
● Create a scheduled job that identifies the user with the highest points at a given  moment and stores a new record in a winners table. This table must maintain a relationship with the original users table and store the timestamp when the user was  declared a winner and their corresponding points at that time. The job should run every  5 minutes. 
 In cases where there's a tie for the highest points, no winner should be declared, and   no record should be created in the winners table. 

### Clone Repo
Clone the Repository then run this on the terminal or command prompt
git clone <repository_url>
cd <project_directory>

### install the PHP dependencies 
composer install

### Run Migrations
php artisan migrate
### Run Seeders to fill DB
php artisan db:seed
### Serve the Application
php artisan serve
### To Determine Winners
php artisan schedule:work
### Endpoints
| Name |  Route  | Method |
|:-----|:--------:|------:|
| Create User   | /api/users |POST |
| Update User   |  /api/users/{id}  |   PUT |
| Get Users   |  /api/users  |   GET |
| DELETE User   |  /api/users/{id}  |   DELETE |
| Group by Points   | api/users/grouped-by-point |    GET |
| Get QR code   |  /api/users/{id}/qrcode  |   GET |

* Sample payload for creating and updating user request body
```
{
        "name": "Prof. Ebba Gottlieb II",
        "age": 60,
        "points": 199,
        "address": "896 Rickie Lake Suite 044\nPort Jamisonchester, MN 30086-4052"
    }

```
Once the server is running, you can access the API by opening a web browser or using an API testing tool (e.g., Postman) and navigating to the URL displayed in the terminal (usually http://localhost:8000 by default).

<img width="1349" alt="getApi" src="https://github.com/eljafari/LeaderBoard-API/assets/89866910/8215e69e-5516-44fd-b8c6-99d73bff54f3"><br/>
Groupby Points<br/>
<img width="690" alt="Screenshot 2023-11-22 at 9 34 42 PM" src="https://github.com/eljafari/LeaderBoard-API/assets/89866910/9d3d6ab0-f1ea-454b-8bf4-71e7dd4a6eef">
