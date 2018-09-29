<p align="center"><img src="https://blogwriter.000webhostapp.com/public/images/logo/logo.png" height="90"></p>




## About Blog Writer

Blog Writer is a  open source blogging application written in laravel 5.4.
Application is easy to learn and use.

## Features
- Manage articles and categories
- Article comments.
- Article Tags.
- Contact form.
- Gallery.
- User management.

## Live Demo
http://freecs9.epizy.com/blog-writer/public/

credentials :

-username : admin@admin.com
-passwrod : 123456 


More features/Improvements will be added over time.

### Installation

Requires Composer.


1. Install the dependencies using composer

```sh
$ cd your-project-directory
$ composer install
```

2. Open .env.example and save it as ".env"

3. Generate application key using :

```sh
$ php artisan key:generate
```



4. Create a mysql database and enter database credentials in your .env file  

```sh
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=blog_writer
DB_USERNAME=root
DB_PASSWORD=
```

5. Run the migration :

```sh
$ php artisan migrate
```


6. Finally start the development server :

```sh
$ php artisan serve
```



