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

You're ready to go! Visit DripPiper in your browser, and login with:

- **Username:** admin@admin.com
- **Password:** secret

### Image Credit
Photo by Kai Pilger: https://www.pexels.com/photo/assorted-clothes-996329/
Photo by Terje Sollie: https://www.pexels.com/photo/pair-of-brown-leather-casual-shoes-on-table-298863/
Photo by cottonbro studio: https://www.pexels.com/photo/two-people-pulling-a-blue-denim-jacket-6769371/
Photo by Kofi Shelby: https://www.pexels.com/photo/stylish-man-pouring-sand-in-desert-scene-31149096/