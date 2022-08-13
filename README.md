# Kargo Backend

## Depp or Lib I use

- PHP
- Laravel

## How to use & run

- clone this repo

```
    git clone git@github.com:Dryluigi/kargo-backend.git
```

- go to the project directory

```
    cd kargo-backend
```

- install depp

```
    composer install
```

- copy env
```
    cp .env.example .env
```

- generate key

```
    php artisan key:generate
```

- fill DB data in .env with your DB configuration

- run migration

```
    php artisan migrate
```

- run seeder

```
    php artisan db:seed
```

- run

```
    php artisan serve
```

## Run Test

```
    php artisan test
```

## API Documentation

| Route      | Description | Argument |
| ----------- | ----------- | ----------- |
| __GET__ /api/districts      | Get All Districts       | ?name (filter district name) |
| __GET__ /api/shipments/list      | Get All Shipment       | - |
| __POST__ /api/shipments/create      | Create Shipment       | origin_id, destination_id, loading_date (in body) |


