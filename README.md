# Monitoring

Fast, dark-themed monitoring UI built with Laravel, Livewire Flux, Tailwind CSS, and Vite.

## Quick Start

Follow these steps in order to run the project locally.

1) Run database migrations

```bash
php artisan migrate
```

2) Install frontend dependencies

```bash
npm install
```

3) Install PHP dependencies

```bash
composer install
```

4) Start the development environment

```bash
composer run dev
```

This starts:
- Laravel development server
- Queue listener
- Vite dev server (hot reload)

## Requirements

- PHP 8.2+
- Node.js 18+
- Composer 2+
- A configured database (SQLite/MySQL/PostgreSQL)

## Notes

- Make sure your `.env` has correct database credentials before running migrations.
- If you see Vite or npm errors, delete `node_modules` and run `npm install` again.
- To build assets for production:

```bash
npm run build
```

