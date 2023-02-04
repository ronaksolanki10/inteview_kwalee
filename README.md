
# Kwalee Assessment

A project is about to build a Backend for the Avtar Management System (Dress Up Feature)

## Author

- [@ronaksolanki10](https://github.com/ronaksolanki10)


## Tech Stack

**Programming Language:** PHP

**Framework:** Laravel 9.19 (A PHP Framework for Web Artisan)

**Databse:** MySql


## Installation

Below is the steps to install the project

1. Clone the project
```bash
  git clone https://github.com/ronaksolanki10/inteview_kwalee.git
```
2. Install dependencies

```bash
  composer install
```
3. Copy ```.env.example``` to ```.env```

4. Set database credentials accordingly in ```.env``` file

5. Generate the application key & clear the cache

```bash
  php artisan key:generate
  php artisan optimize:clear
```

6. Add database tables using below command & Master data for Items, Users, Initial Wallet Balance

```bash
  php artisan migrate --seed
```

7. Start laravel application if testing in local machine using below command and the URL will be used as ```Base URL``` for the APIs, if setupping on the server then use URL accordingly.

```
 php artisan serve

```


    
## API Reference

Note: Below headers are required to make successfull API request

```
  Content-Type: application/json
  Accept: application/json
```

#### Login

```http
  GET /api/login
```

| Parameter | Type     | Description                |
| :-------- | :------- | :------------------------- |
| `email` | `string` | **Required**. |
| `password` | `string` | **Required**. |

We used ```Sanctum``` of Laravel (Bearer Token Authentication) to authorize Admin API requests hense pass below header to make successful request for the below all Admin APIs

```
   Authorization: Bearer <YOUR_TOKEN>
```
Replace ```<YOUR_TOKEN>``` with the token that your received from the ```/api/admin/login``` API response

#### 1. Items Group By Category

```http
  GET api/items
```
Note: Above API can be called without Authentication Token.

#### 2. Get Current Avtar

```http
  GET api/avtar/current
```
Note: Current Avtar Will be returned based on the user logged in by passing Access Token of it as mentioned above.


#### 3. Buy Item

```http
  POST /api/item/buy
```
| Parameter | Type     | Description                       |
| :-------- | :------- | :-------------------------------- |
| `item_id`      | `integer` | **Required**. ID of the item |

#### 4. Dress Up

```http
  POST api/dressup
```

| Parameter | Type     | Description                       |
| :-------- | :------- | :-------------------------------- |
| `item_ids`      | `array` | **Required**. IDs of the items in array |

## Credentials for Testing

### Users

1. Email: john.miles@kwalee.com
Password: John@123

2. Email: stefen.robot@kwalee.com
Password: Stefen@123

3. Email: mike.thomson@kwalee.com
Password: Mike@123

Note: Every user is created with initial balance of 3000 /-

## Feedback

If you have any feedback or query, please feel free to reach out to me at ronaksolanki1310@gmail.com

