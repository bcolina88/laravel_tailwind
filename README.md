# Laravel - Tailwindcss

## Installation

#### Dependencies:

-   Composer
-   PHP >= 8.1.2
-   LARAVEL >= 10
-   LIVEWIRE >= 2.x.x
-   TAILWINDCSS >= 3.1.0

*   Clone the repository and run `composer install` once installed.

*   Run dependencies.

```bash
 $ npm install
```

-   Create database with the name `laravel_prueba` and collation `utf8_general_ci`

-   Create the .env file, you can see the .env.example file now add your db credential in it.

```bash
  DB_DATABASE= ?
  DB_USERNAME= ?
  DB_PASSWORD= ?
```

-   Generate autoload files classes.

```bash
$ composer dump-autoload
```

-   Run artisan migrate and seeder.

```bash
$ php artisan migrate:refresh --seed
```

-   Run application.

```bash
 $ php artisan serve
```
