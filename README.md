# API Project

<p align="center">
<a href="https://github.com/yourusername/your-api-project/actions"><img src="https://github.com/dddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddd
<a href="https://packagist.org/packages/yourusername/your-api-project"><img src="https://img.shields.io/packagist/v/yourusername/your-api-project" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/yourusername/your-api-project"><img src="https://img.shields.io/packagist/l/yourusername/your-api-project" alt="License"></a>
</p>

## About Card API   

The card API is built with Laravel 11 and Sanctum. It provides endpoints for managing suits, cards, and decks.
At the time of writing of this readme this a completely headless api, a make:user command is provided to create a user
with a token.


## Make User

Since there is no user interface, a make:user command is provided to create a user with a token.


## API Documentation

### Current Endpoints

#### Suits

- `GET /api/suits`: Retrieve all suits
- `GET /api/suits/{id}`: Retrieve a specific suit
- `POST /api/suits`: Create a new suit
- `PUT /api/suits/{id}`: Update an existing suit
- `DELETE /api/suits/{id}`: Delete a suit

#### Cards

- `GET /api/cards`: Retrieve all cards
- `GET /api/cards/{id}`: Retrieve a specific card
- `POST /api/cards`: Create a new card
- `PUT /api/cards/{id}`: Update an existing card
- `DELETE /api/cards/{id}`: Delete a card

#### Decks

- `GET /api/decks`: Retrieve all decks
- `GET /api/decks/{id}`: Retrieve a specific deck
- `POST /api/decks`: Create a new deck
- `PUT /api/decks/{id}`: Update an existing deck
- `DELETE /api/decks/{id}`: Delete a deck

### Authentication

This API uses token-based authentication. Include your API token in the Authorization header of your requests:


Authorization: Bearer YOUR_API_TOKEN


### Request Format

All requests should be sent with the `Content-Type: application/json` header. Request bodies should be valid JSON.

### Response Format

All responses are returned in JSON format. Successful responses will have a 2xx status code, while errors will have 4xx or 5xx status codes.

### Error Handling

In case of an error, the API will return a JSON object with an `error` key containing a description of the error.

## Getting Started

To get started with this API, clone the repository and install the dependencies:


git clone https://github.com/yourusername/your-api-project.git
cd your-api-project
composer install


Copy the `.env.example` file to `.env` and configure your environment variables, including your database settings.

Then, run the migrations:


php artisan migrate


You can now start the development server:


php artisan serve


The API will be available at `http://localhost:8000`.

## Contributing

Contributions are welcome! Please feel free to submit a Pull Request.

## License

This project is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).

<p align="center">
<a href="https://github.com/yourusername/your-api-project/actions"><img src="https://github.com/yourusername/your-api-project/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/yourusername/your-api-project"><img src="https://img.shields.io/packagist/dt/yourusername/your-api-project" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/yourusername/your-api-project"><img src="https://img.shields.io/packagist/v/yourusername/your-api-project" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/yourusername/your-api-project"><img src="https://img.shields.io/packagist/l/yourusername/your-api-project" alt="License"></a>
</p>

## About This API Project

This project is a RESTful API built with Laravel. It provides endpoints for managing various resources.

## API Documentation

### Current Endpoints

#### Users

- `GET /api/users`: Retrieve all users
- `GET /api/users/{id}`: Retrieve a specific user
- `POST /api/users`: Create a new user
- `PUT /api/users/{id}`: Update an existing user
- `DELETE /api/users/{id}`: Delete a user

#### Posts

- `GET /api/posts`: Retrieve all posts
- `GET /api/posts/{id}`: Retrieve a specific post
- `POST /api/posts`: Create a new post
- `PUT /api/posts/{id}`: Update an existing post
- `DELETE /api/posts/{id}`: Delete a post

#### Comments

- `GET /api/comments`: Retrieve all comments
- `GET /api/comments/{id}`: Retrieve a specific comment
- `POST /api/comments`: Create a new comment
- `PUT /api/comments/{id}`: Update an existing comment
- `DELETE /api/comments/{id}`: Delete a comment

### Authentication

This API uses token-based authentication. Include your API token in the Authorization header of your requests:


Authorization: Bearer YOUR_API_TOKEN


### Request Format

All POST and PUT requests should send data in JSON format with the appropriate `Content-Type` header:


Content-Type: application/json


### Response Format

All responses are returned in JSON format. Successful responses will have a 2xx status code, while errors will have 4xx or 5xx status codes.

## Installation

1. Clone the repository
2. Run `composer install`
3. Copy `.env.example` to `.env` and configure your environment variables
4. Run `php artisan key:generate`
5. Run `php artisan migrate`
6. Run `php artisan serve` to start the development server

## Testing

Run the test suite with:


php artisan test


## Contributing

Please see [CONTRIBUTING.md](CONTRIBUTING.md) for details on how to contribute to this project.

## License

This project is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
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

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework.

You may also try the [Laravel Bootcamp](https://bootcamp.laravel.com), where you will be guided through building a modern Laravel application from scratch.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains thousands of video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

## Laravel Sponsors

We would like to extend our thanks to the following sponsors for funding Laravel development. If you are interested in becoming a sponsor, please visit the [Laravel Partners program](https://partners.laravel.com).

### Premium Partners

- **[Vehikl](https://vehikl.com/)**
- **[Tighten Co.](https://tighten.co)**
- **[WebReinvent](https://webreinvent.com/)**
- **[Kirschbaum Development Group](https://kirschbaumdevelopment.com)**
- **[64 Robots](https://64robots.com)**
- **[Curotec](https://www.curotec.com/services/technologies/laravel/)**
- **[Cyber-Duck](https://cyber-duck.co.uk)**
- **[DevSquad](https://devsquad.com/hire-laravel-developers)**
- **[Jump24](https://jump24.co.uk)**
- **[Redberry](https://redberry.international/laravel/)**
- **[Active Logic](https://activelogic.com)**
- **[byte5](https://byte5.de)**
- **[OP.GG](https://op.gg)**

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
