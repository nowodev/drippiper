# DripPiper

An E-commerce website for a client.

## Installation

Clone the repo locally:

```sh
git clone https://github.com/BitsandNibble/drippiper.git
cd drippiper
```

Install PHP dependencies:

```sh
composer install
```

Install NPM dependencies:

```sh
npm install
```

Build assets:

```sh
npm run dev
```

Setup configuration:

```sh
cp .env.example .env
```

Generate application key:

```sh
php artisan key:generate
```

Create a MySQL database called "drippiper". You can also use another database (SQLite, Postgres), simply update your configuration accordingly.

```mysql
CREATE DATABASE drippiper;
```

Run database migrations:

```sh
php artisan migrate
```

Run database seeder:

```sh
php artisan db:seed
```

Run the dev server (the output will give the address):

```sh
php artisan serve
```

You're ready to go! Visit Piper Wears in your browser, and login with:

- **Username:** admin@admin.com
- **Password:** secret
