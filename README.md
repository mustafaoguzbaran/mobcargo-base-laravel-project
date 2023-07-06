# 📦 Laravel Cargo Software
👋 Hi guys, this software is a cargo software written in laravel. This entry level project aims to understand Laravel.
## 🚀 Installation
Docker was not used in the project. You can easily install the project using MAMP or WampServer. <br>
1) Clone the project: <br>
`git clone https://github.com/mustafaoguzbaran/mobcargo-base-laravel-project.git`
2) Install packages <br>
   `composer install`
3) Copy .env.example file and rename to .env
4) Create the tables <br>
   `php artisan migrate --seed`
## 📷 ScreenShots
### 📌 Home Page
This is the homepage. You can track the cargo by entering the cargo tracking number here.
![Home Page](https://i.hizliresim.com/9dsifnc.png)
### 📏 Backoffice Home Page
This is the Backoffice home page. This gives information about the number of users and the number of posts. It can perform many management operations in the Backoffice.
![Backoffice Home Page](https://i.hizliresim.com/qe8g9z6.png)
## 🛰️ API Usage
Before using APIs, you must create a user and assign API Manager privilege to that user. After creating the user, you should request a Token at `http://site.com/api/v1/tokenrequest` you will use the tokens on the following ends.
### 📦 Cargos
#### GET `http://127.0.0.1:8000/api/v1/cargos` endpoint
It pulls all the cargos in the database.
#### GET `http://127.0.0.1:8000/api/v1/cargo/{id}` endpoint
It draws cargo according to the specified id number.
#### DEL `http://127.0.0.1:8000/api/v1/cargo/{id}/delete` endpoint
It deletes the cargo according to the specified id number.
#### POST `http://127.0.0.1:8000/api/v1/cargo/add` endpoint
Adds cargo. <br>
`
{
"posted_by_username": "test133",
"sender_by_username": "test63",
"donor_branch": "test verici şube",
"receiving_branch": "test alici sube",
"sent_province": "test",
"sent_district": "test",
"full_address": "test test test"
}
`
#### PATCH `http://127.0.0.1:8000/api/v1/cargo/{id}/update` endpoint
It updates the cargo according to the specified id number. <br>
`
{
"posted_by_username": "test143",
"sender_by_username": "test63",
"donor_branch": "test vericfi şube",
"receiving_branch": "test alici sube",
"sent_province": "test",
"sent_district": "test",
"full_address": "test test test",
"cargo_status": "Test"
}
`
### 👤 Users
#### GET `http://127.0.0.1:8000/api/v1/users` endpoint
It pulls all the users in the database.
#### GET `http://127.0.0.1:8000/api/v1/user/{id}` endpoint
It draws user according to the specified id number.
#### DEL `http://127.0.0.1:8000/api/v1/user/{id}/delete` endpoint
It deletes the user according to the specified id number.
#### POST `http://127.0.0.1:8000/api/v1/user/add` endpoint
Adds user. <br>
`
{
"name_register": "test1",
"username_register": "test6",
"email_register": "test5@gmail.com",
"phone_register": "05000000000",
"password_register": "test"
}
`
#### PATCH `http://127.0.0.1:8000/api/v1/user/{id}/update` endpoint
It updates the user according to the specified id number. <br>
`
{
"name_register": "test1",
"username_register": "test6",
"email_register": "test5@gmail.com",
"phone_register": "05000000000",
"password_register": "test"
}
`
<br>

## 🥳 Happy ending
