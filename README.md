# Card API Project

[![Tests](https://github.com/jordanpartridge/card-api/actions/workflows/laravel.yml/badge.svg)](https://github.com/jordanpartridge/card-api/actions/workflows/laravel.yml) [![Duster Fix](https://github.com/jordanpartridge/card-api/actions/workflows/duster-fix-blame.yml/badge.svg)](https://github.com/jordanpartridge/card-api/actions/workflows/duster-fix-blame.yml)

## About Card API

The Card API is a Laravel 11 project that provides endpoints for managing suits, cards, and decks. It's a headless API authenticated using Laravel Sanctum.

## Features

- Manage suits, cards, and decks
- Draw cards from decks
- User authentication with API tokens

## Installation

1. Clone the repository
2. Install dependencies: `composer install`
3. Set up your `.env` file
4. Run migrations: `php artisan migrate`
5. Generate application key: `php artisan key:generate`

## Create a User

Since there is no user interface, use the provided Artisan command to create a user with an API token:

```bash
php artisan make:user
```

Follow the prompts to create a user and receive an API token.

## API Documentation

Base URL: `http://card-api.test/v1`

### Authentication

All API endpoints require authentication using a bearer token. Include the following header in your HTTP requests:

```
Authorization: Bearer YOUR_API_TOKEN
```

### Endpoints

#### Suits

- `GET /suits`: Retrieve all suits
- `GET /suits/{suit}`: Retrieve a specific suit by name

#### Cards

- `GET /cards`: Retrieve all cards (paginated)
- `GET /cards/{card}`: Retrieve a specific card by ID

#### Decks

- `GET /decks/{deck}`: Retrieve a specific deck by ID
- `POST /decks`: Create a new deck
- `GET /decks/{deck}/cards`: Retrieve all cards in a deck
- `PUT /decks/{deck}/draw`: Draw cards from a deck

### Request and Response Examples

#### Create a Deck

Request:
```http
POST /decks
Content-Type: application/json

{
  "name": "My New Deck",
  "jokers": 2
}
```

Response:
```json
{
  "name": "My New Deck",
  "card_count": "54",
  "joker_count": 2
}
```

#### Draw Cards

Request:
```http
PUT /decks/{deck_id}/draw?count=5
```

Response:
```json
[
  {
    "rank": "Ace",
    "suit": "Hearts"
  },
  {
    "rank": "King",
    "suit": "Spades"
  },
  // ... (3 more cards)
]
```

### Error Handling

The API uses standard HTTP status codes and returns error messages in JSON format. Common error responses include:

- 401 Unauthorized: Authentication failed
- 403 Forbidden: The authenticated user doesn't have permission for the requested action
- 404 Not Found: The requested resource doesn't exist
- 422 Unprocessable Entity: Validation errors in the request data

## Development

### Running Tests

```bash
php artisan test
```

### Code Style

This project uses Laravel Pint for code styling. To check and fix code style issues:

```bash
./vendor/bin/pint
```

## Contributing

Contributions are welcome! Please feel free to submit a Pull Request.

## License

This project is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
