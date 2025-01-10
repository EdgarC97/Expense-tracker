<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

# Personal Expense Manager

This project is a web application developed with Laravel that allows users to register, manage, and visualize their personal expenses in a simple and efficient way.

## Features

- Record expenses with description, amount, category, and date.
- View expenses in a list sorted by date.
- Filter expenses by category and date range.
- Automatic calculation of total expenses.
- View totals broken down by category.
- Edit and delete existing expenses.
- Data input validation.

## Requirements

- PHP 8.0 or higher
- Composer
- MySQL

## Installation

1. Clone the repository:

git clone https://github.com/EdgarC97/Expense-tracker

2. Navigate to the project directory:

cd expense-manager

3. Install dependencies:

composer install

4. Copy the configuration file:

cp .env.example .env

5. Generate the application key:

php artisan key:generate

6. Configure the database in the `.env` file

7. Run migrations and seeders:

php artisan migrate --seed

8. Start the development server:

php artisan serve

9. Visit `http://localhost:8000` in your browser.

## Usage

- The main page displays the list of expenses.
- Use the filters at the top to filter by category and date range.
- To add a new expense, click on "New Expense".
- To edit or delete an expense, use the corresponding buttons in the list.

## Contributing

Contributions are welcome. Please open an issue first to discuss what you would like to change.

## License

[MIT](https://opensource.org/licenses/MIT)
