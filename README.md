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