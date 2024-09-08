# Card API Project

## [![Tests](https://github.com/jordanpartridge/card-api/actions/workflows/laravel.yml/badge.svg)](https://github.com/jordanpartridge/card-api/actions/workflows/laravel.yml) [![Duster Fix](https://github.com/jordanpartridge/card-api/actions/workflows/duster-fix-blame.yml/badge.svg)](https://github.com/jordanpartridge/card-api/actions/workflows/duster-fix-blame.yml)

## About Card API

The Card API is built with

- Laravel 11
- Sanctum

<p>
It provides endpoints for managing suits, cards, and decks. At the time of writing this README, this is a completely headless API. A make:user command is provided to create a user with a token.
</p>

## Make User

Since there is no user interface, a make:user command is provided to create a user with a token:

```bash
~/Sites/card-api git:[feature/we-need-badges]
./artisan make:user

 🚀 Welcome to the User Creation Wizard! 🚀

 ┌ 👤 What is the name of the user? ────────────────────────────┐
 │ Jordan Partridge                                             │
 └──────────────────────────────────────────────────────────────┘

 ┌ 📧 What is the email of the user? ───────────────────────────┐
 │ jordan@partridge.rocks                                       │
 └──────────────────────────────────────────────────────────────┘


 ✅ User created successfully!

 ┌──────────────────┬────────────────────────┬────────────────────────────────────────────────────┐
 │ Name             │ Email                  │ API Token                                          │
 ├──────────────────┼────────────────────────┼────────────────────────────────────────────────────┤
 │ Jordan Partridge │ jordan@partridge.rocks │ 1|hofwGeTsZ9tDLDEE9yquhDwwCKS0B0ktqUxrby1I48332aaa │
 └──────────────────┴────────────────────────┴────────────────────────────────────────────────────┘

 🔐 Make sure to save the API token, as it won't be shown again!



```

## API Documentation

### Current Endpoints

#### Suits

- GET /api/suits: Retrieve all suits
- GET /api/suits/{id}: Retrieve a specific suit
- POST /api/suits: Create a new suit
- PUT /api/suits/{id}: Update an existing suit
- DELETE /api/suits/{id}: Delete a suit

#### Cards

- GET /api/cards: Retrieve all cards
- GET /api/cards/{id}: Retrieve a specific card
- POST /api/cards: Create a new card
- PUT /api/cards/{id}: Update an existing card
- DELETE /api/cards/{id}: Delete a card

#### Decks

- GET `/api/decks`: Retrieve all decks
- GET `/api/decks/{id}`: Retrieve a specific deck
- POST `/api/decks`: Create a new deck
- PUT `/api/decks/{id}`: Update an existing deck
- DELETE `/api/decks/{id}`: Delete a deck

# Authentication

All API endpoints require authentication using a bearer token. To authenticate, include the following header in your HTTP requests:

`Authorization: Bearer YOUR_API_TOKEN`
