#### Old Version: http://sosuapp.tech/
#### New Version: https://edufund-backend-xgqq6.ondigitalocean.app/

## Setting up the environment

To ensure Edufund (Laravel) can run on your system. Ensure you have PHP >= 7.3, MySQL, Apache Server, and preferrably PhpMyAdmin installed.

To get started on Windows it is advisable to use [XAMPP](https://www.apachefriends.org/index.html) or [WAMMP](https://www.wampserver.com/en/)

On Linux this [guide](https://www.linuxbabe.com/ubuntu/install-lamp-stack-ubuntu-20-04-server-desktop) can help install the LAMP Stack

The following PHP Extensions should also be enabled: 
```
BCMath PHP Extension
Ctype PHP Extension
Fileinfo PHP Extension
JSON PHP Extension
Mbstring PHP Extension
OpenSSL PHP Extension
PDO PHP Extension
Tokenizer PHP Extension
XML PHP Extension
```
To be able to run the ```composer install``` command you need to install [composer](https://getcomposer.org/)


## Running the Project

Use the instructions below to run the project locally:

1. ```git clone https://github.com/ANU-TEAM/edufund-backend.git```
2. ```cd edufund-backend/```
3. ```composer install```
4. ```cp .env.example .env```
5. ```php artisan key:generate```
6. In PhpMyAdmin create a new database and give it a name. example: edufund.
7. In your .env file fill in your database connection details:
    ```
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=edufund
    DB_USERNAME=usallyitsroot
    DB_PASSWORD=yourpassword
    ```
8. Setup your mail configuration to ensure that emails can be sent to users. [Gmail Guide](https://www.itsolutionstuff.com/post/laravel-8-mail-laravel-8-send-email-tutorialexample.html), [MailTrap Guide](https://www.itsolutionstuff.com/post/how-to-send-mail-in-laravel-8-using-mailtrapexample.html)

9.Run ```php artisan migrate:fresh --seed``` To generate your tables, populate your database with categories, and also create a new admin user with the following credentials (email```admin@edufund.com```, password ```12345678```)

10. You can now run ```php artisan serve``` This will start the application on ```http://localhost:8001```. NB: If port ```8001``` is taken another port like ```8002``` will be used.

11. You can also run ```php artisan serve --host <ip-address> --port <portnumber>``` to ensure the backend is accessible via your Local Area Network(LAN)

NB: Change the ```APP_URL``` variable in the ```.env``` file to match your ip-address on which the backend is running. Use this same ip-address as the URL and Port in the [endpoints.dart](https://github.com/ANU-TEAM/edufund-mobileapp/blob/develop/lib/utils/endpoints.dart) of the [mobile app](https://github.com/ANU-TEAM/edufund-mobileapp). Doing this will enable images to be displayed on the mobile app.



## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains over 1500 video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.
