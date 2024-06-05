## BookingGo - Laravel Booking Appointment Application

## Prerequisites
- PHP >= 8.2
- Composer
- MySQL or another supported database

## Installation

Follow these steps to get the project up and running on your local machine.

### Clone the Repository

Clone the repository to your local machine using the following command:

```bash
git clone https://github.com/bhubon/laravel-bookig-appointment.git
cd your-repository
composer install
php artisan migrate:fresh --seed
```

## Admin Panel

### Admin Login

```bash
{{BASE_URL}}/admin/login/
```

This endpoint is used to authenticate and login as an admin.

#### Request

The request should be sent as a POST request to the specified URL with the following JSON payload in the request body:

| Key | Type | Description |
| --- | --- | --- |
| email | string | The email of the admin user |
| password | string | The password of the admin user |

#### Response

Upon a successful request, the server will respond with a status code of 200 and a JSON object in the response body with the following schema:

``` json
{
    "type": "object",
    "properties": {
        "status": {
            "type": "string"
        },
        "message": {
            "type": "string"
        },
        "token": {
            "type": "string"
        }
    }
}

 ```

The response will contain the following attributes:

- `status`: A string indicating the status of the response.
    
- `message`: A string providing additional information about the response.
    
- `token`: A string representing the authentication token for the logged in admin user.

```bash
{
    "email":"admin@gmail.com",
    "password": "password"
}
```

### User Management

### Get all user


```bash
{{BASE_URL}}/admin/user/
```
#### Request

The request should be sent as a GET request to the specified URL without any payload.


#### Response

Upon a successful request, the server will respond with a status code of 200 and a JSON object in the response body with the following schema:

``` json
{
    "type": "object",
    "properties": {
        "status": {
            "type": "string"
        },
        "data": {
            "type": "array"
        },
    }
}

 ```

The response will contain the following attributes:

- `status`: A string indicating the status of the response.
    
- `data`: A string providing additional information about the response.

```bash
{
    "status": "success",
    "data": [
        {
            "id": 1,
            "name": "admin",
            "email": "admin@gmail.com",
            "token": null,
            "role": "admin",
            "verified_at": null,
            "created_at": "2024-06-02T17:07:20.000000Z",
            "updated_at": "2024-06-02T17:07:20.000000Z"
        },
        {
            "id": 2,
            "name": "staff",
            "email": "staff@gmail.com",
            "token": null,
            "role": "staff",
            "verified_at": null,
            "created_at": "2024-06-02T17:07:20.000000Z",
            "updated_at": "2024-06-02T17:07:20.000000Z"
        },
    ]
}
```



### Get Single User

**Endpoint:** `/admin/user/{id}`

**Method:** `GET`

**Headers:**

#### Request

The request should be sent as a GET request to the specified URL without any payload.

#### Response

Upon a successful request, the server will respond with a status code of 200 and a JSON object in the response body with the following schema:

```json
{
    "type": "object",
    "properties": {
        "status": {
            "type": "string"
        },
        "data": {
            "type": "object",
            "properties": {
                "id": {
                    "type": "integer"
                },
                "name": {
                    "type": "string"
                },
                "email": {
                    "type": "string"
                },
                "token": {
                    "type": "string",
                    "nullable": true
                },
                "role": {
                    "type": "string"
                },
                "verified_at": {
                    "type": "string",
                    "nullable": true,
                    "format": "date-time"
                },
                "created_at": {
                    "type": "string",
                    "format": "date-time"
                },
                "updated_at": {
                    "type": "string",
                    "format": "date-time"
                }
            }
        }
    }
}

```

The response will contain the following attributes:

- `status`: A string indicating the status of the response.
    
- `data`: A string providing additional information about the response.

```bash
{
"status": "success",
"data": {
    "id": 1,
    "name": "admin",
    "email": "admin@gmail.com",
    "token": null,
    "role": "admin",
    "verified_at": null,
    "created_at": "2024-06-02T17:07:20.000000Z",
    "updated_at": "2024-06-02T17:07:20.000000Z"
}

```
