# Task management system in laravel

## Steps below are for set up project:

#### 1. After getting the project in your local pc, Configure databse in ENV filed

```json
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=task_management
DB_USERNAME=root
DB_PASSWORD=
```

#### 2. Run migration command

```php
    php artisan migrate
```

#### 3. Starting up server

```php
    php artisan serve
```

#### 4. Tasks routes

```php
    BASE_URL/tasks
```

#### 5. Projects routes

```php
   BASE_URL/projects
```

## Steps below are for deploying up project:

#### 1. Install Heroku CLI, Used MAC, you can look for windows as well.

```json
    brew install heroku/brew/heroku
```

#### 2. Create a Procfile.

```json
    web: vendor/bin/heroku-php-apache2 public/
```

#### 3. Initialize project as Git repo

```json
    git init
```

#### 4. Login on heroku using your terminal

```json
    heroku login
```

#### 5. Create a Heroku application

```json
    heroku create
```

#### 6. Setting a Laravel encryption key

```json
    php artisan key:generate --show
```

#### 7. Setting a Laravel encryption key

```json
    php artisan key:generate --show
    heroku config:set APP_KEY={Your copied key}
```

#### 8. Push the changes to Heroku

```json
    git add .
    git commit -m "Laravel project pushed on heroku"
    git push heroku master
```

#### 9. Start the Application

```json
    heroku open
```

#### 10. Configure the Database on Heroku

```json
    heroku addons:create heroku-postgresql:hobby-dev
    heroku config

    from here provide APP_KEY, DATABASE_URL
    
```

#### 10. Add the file to the Heroku and run migrations

```json
    git add .
    git commit -m "added postgres database configuration"
    git push heroku master
    heroku run php artisan migrate
```
