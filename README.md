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
| __POST__ /api/shipments/{shipment_id}/allocate      | Allocate Shipment       | driver_id, truck_id (in body) |
| __GET__ /api/trucks      | Get All Truck       |  |
| __POST__ /api/add-truck      | add new truck data       | licence_number, license_type, truck_type,production_year,stnk_file(nullable),kir_file(nullable) (in body) |
| __GET__ /api/truck/{id}   | Get a data truck by id       |  |
| __PUT__ /api/update-truck/{id}      | Update data truck except stnk_file dan kir_file       | licence_number, license_type, truck_type,production_year (in body)  |
| __GET__ /api/truck-search/{license_number}   | get data list truck search by license number     |  |
| __GET__ /api/truck-change-status/{id}   | Change status of truck       | data(0,1) 1 = active, 0 unactive |
| __GET__ /api/truck-filter/{truck_type}   | get data list truck by truck type     | send data truck type split using ","  |
| __GET__ /api/truck-sort/{column_name}/{sort_type}   | get data list truck by column name and sort type    | |


