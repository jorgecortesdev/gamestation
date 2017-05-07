#GameStation MX EventOS 1.0

GameStation MX EventOS is a Laravel 5.4 application with all Gentelella template components.

## Gentelella

Gentellela Admin is a free to use Bootstrap 3 admin template.

### Theme Demo

**[Template Demo](https://colorlib.com/polygon/gentelella/index.html)**

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
npm install --global bower
npm install
bower install
```

In order to update the assets you can run for development:
```
npm run dev
```

For production:
```
npm run prod
```

Add auth support !

**WARNING** : For auth support, configure your ```.env``` file with ```database``` and ```smtp``` connection !

For ```smpt``` connection we recommend a service like [MailTrap](https://mailtrap.io/)

For install auth support, run this follow commands

```
php artisan migrate
```
