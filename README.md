# Canoe Assignment

This project assumes that you have `docker`, `nvm` and `php`, all configured and running on your system.

## Running the project for the first time

On the proejct's root folder:

1. run `npm ci`
2. run `npx nx run-many --target setup`
  a. `allow` any prompt that pops up

## Running the project

On the proejct's root folder:

1. Run `npx nx run-many --target start`

## Seeding Database

1. Run `./vendor/bin/sail artisan db:seed`

## Backend Services

- `laravel.test`: Backend API

- `laravel.worker`: Queue worker

- `mysql`: Database

- `redis`: Queue and cache

## API Routes

- `GET https://localhost/api/duplicated-funds` - List duplicated funds
- `GET https://localhost/api/funds` - List funds
- `PUT https://localhost/api/funds/{fund_id}` - create/update fund

  ```json
    {
        // "id": 5, << optional, if you want to update
        "name": "dskl sdjln",
        "start_year": 1234,
        "aliases": [
            {"name": "some new alias"},
    ],
        "companies": [1, 3, 5, 6],
        "manager_id": 7
    }
  ```

## Frontend

- <http://localhost:4200>
