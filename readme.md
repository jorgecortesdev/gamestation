#GameStation MX EventOS 1.0

GameStation MX EventOS is a Laravel 5.4 application.

## Laravel 5.4

Laravel is a web application framework with expressive, elegant syntax.

### Official Documentation

Documentation for the framework can be found on the [Laravel website](http://laravel.com/docs/5.3).

# Installation

First, clone git repository.

With Git SSH
```
git clone git@bitbucket.org:xorth/gamestation.mx.git
```

Go to the project folder
```
cd gamestation.mx
```

Update composer
```
composer update
```

Copy ```.env.example``` file to ```.env```

```
cp .env.example .env
```

Next, run this follow commands

```
php artisan key:generate
npm install
```

In order to update the assets you can run for development:
```
npm run dev
```

For production:
```
npm run prod
```

Migrate the database
```
php artisan migrate
```
