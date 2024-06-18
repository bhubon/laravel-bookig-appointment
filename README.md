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

**Method:** `GET`

#### Request

The request should be sent as a GET request to the specified URL without any payload.


#### Response

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

```bash
{{BASE_URL}}/admin/user/{user_id}
```

**Method:** `GET`

#### Request

The request should be sent as a GET request to the specified URL without any payload.

#### Response


Upon a successful request, the response will contain the following attributes:

- `status`: A string indicating the status of the response.
    
- `data`: An obejct with database data about the response.

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



### Update an User

```bash
{{BASE_URL}}/admin/user/{user_id}
```

**Method:** `PUT`

#### Request

The request should be sent as a PUT request to the specified URL with the following payload:

| Key | Type | Description |
| --- | --- | --- |
| name | string | The name of the user |
| email | string | The email of the user |
| password | string | The password of the user with Hash method |
| role | string | The role of the user |

#### Response


Upon a successful request, the response will contain the following attributes:

- `status`: A string indicating the status of the response.
    
- `data`: An obejct with database data about the response.

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


### Delete an user

```bash
{{BASE_URL}}/admin/user/{user_id}
```

**Method:** `DELETE`

#### Request

The request should be sent as a PUT request to the specified URL without any payload.


#### Response


Upon a successful request, the response will contain the following attributes:

- `status`: A string indicating the status of the response.
    
- `message`: A string providing additional information about the response.

```bash
{
    "status": "success",
    "message": "User deleted successfully."
}

```


### Staff API Documentation
This API allows you to manage staff resources in the application. It includes endpoints for listing, creating, viewing, updating, and deleting staff.

```bash
{{BASE_URL}}/admin/staff/
```

Endpoints
List Staff
GET /admin/staff/

Retrieves a paginated list of staff members.

#### Response

```json

{
    "status": "success",
    "data": {
        "current_page": 1,
        "data": [
            {
                "id": 1,
                "user_id": 1,
                "phone": "123456789",
                "address": "123 Main St",
                "info": "Some info",
                "created_at": "2024-06-02T17:07:20.000000Z",
                "updated_at": "2024-06-02T17:07:20.000000Z"
            },
            
        ],
        
    }
}
```
### Create Staff
POST /admin/staff/

Creates a new staff member.

#### Request

```json
{
    "user_id": 1,
    "phone": "123456789",
    "address": "123 Main St",
    "info": "Some info",
    "services": [1, 2, 3]
}
```
#### Response

```json
{
    "status": "success",
    "message": "Staff created successfully"
}
```
### View Staff
GET /admin/staff/{id}

Retrieves a specific staff member by ID.

#### Response

```json
{
    "status": "success",
    "data": {
        "id": 1,
        "user_id": 1,
        "phone": "123456789",
        "address": "123 Main St",
        "info": "Some info",
        "services": [
            {
                "id": 1,
                "name": "Service 1"
            },
            
        ],
        "created_at": "2024-06-02T17:07:20.000000Z",
        "updated_at": "2024-06-02T17:07:20.000000Z"
    }
}
```
### Update Staff
PUT /admin/staff/{id}

Updates an existing staff member.

#### Request

```json
{
    "phone": "987654321",
    "address": "456 Main St",
    "info": "Updated info",
    "services": [1, 2]
}
```
#### Response

```json
{
    "status": "success",
    "message": "Staff successfully updated"
}
```
### Delete Staff
DELETE /admin/staff/{id}

Deletes a specific staff member by ID.

#### Response

```json
{
    "status": "success",
    "message": "Staff deleted successfully"
}
```
### Error Responses
All endpoints can return error responses in the following format:

### Validation Error

```json
{
    "status": "failed",
    "message": "Validation failed",
    "error": {
        "field_name": ["Error message"]
    }
}
```
#### General Error

```json
{
    "status": "failed",
    "message": "Error message",
    "error": "Detailed error message"
}
```
### Example Usage
Create Staff Example

```sh
curl -X POST {{BASE_URL}}/admin/staff/ -H "Content-Type: application/json" -d '{
    "user_id": 1,
    "phone": "123456789",
    "address": "123 Main St",
    "info": "Some info",
    "services": [1, 2, 3]
}'
```
### Update Staff Example

```sh
curl -X PUT {{BASE_URL}}/admin/staff/1 -H "Content-Type: application/json" -d '{
    "phone": "987654321",
    "address": "456 Main St",
    "info": "Updated info",
    "services": [1, 2]
}'
```

### Customer API Documentation
This API allows you to manage customer resources in the application. It includes endpoints for listing, creating, viewing, updating, and deleting customers.

```bash
{{BASE_URL}}/admin/customers/
```

Endpoints
List Customers
GET /admin/customers/

Retrieves a list of all customers.

#### Response

```json
{
    "status": "success",
    "data": [
        {
            "id": 1,
            "user_id": 1,
            "phone": "123456789",
            "address": "123 Main St",
            "user": {
                "id": 1,
                "name": "John Doe",
                "email": "john.doe@example.com"
            }
        },
        
    ]
}
```
### Create Customer
POST /admin/customers/

Creates a new customer.

#### Request

```json
{
    "user_id": 1,
    "phone": "123456789",
    "address": "123 Main St"
}
```
#### Response

```json
{
    "status": "success",
    "message": "Customer created successfully",
    "data": {
        "id": 1,
        "user_id": 1,
        "phone": "123456789",
        "address": "123 Main St"
    }
}
```
### View Customer
GET /admin/customers/{id}

Retrieves a specific customer by ID.

#### Response

```json
{
    "status": "success",
    "data": {
        "id": 1,
        "user_id": 1,
        "phone": "123456789",
        "address": "123 Main St",
        "user": {
            "id": 1,
            "name": "John Doe",
            "email": "john.doe@example.com"
        }
    }
}
```
### Update Customer
PUT /admin/customers/{id}

Updates an existing customer.

#### Request

```json
{
    "phone": "987654321",
    "address": "456 Main St"
}
```
#### Response

```json
{
    "status": "success",
    "message": "Customer updated successfully",
    "data": {
        "id": 1,
        "user_id": 1,
        "phone": "987654321",
        "address": "456 Main St"
    }
}
```
### Delete Customer
DELETE /admin/customers/{id}

Deletes a specific customer by ID.

#### Response

```json
{
    "status": "success",
    "message": "Customer deleted successfully"
}
```
### Error Responses
All endpoints can return error responses in the following format:

Validation Error

```json
{
    "status": "failed",
    "message": "Validation Failed",
    "errors": {
        "field_name": ["Error message"]
    }
}
```
### General Error

```json
{
    "status": "failed",
    "message": "Error message",
    "error": "Detailed error message"
}
```

### Permission API Documentation
This API allows you to manage permissions in the application. It includes endpoints for listing, creating, viewing, updating, and deleting permissions.

```bash
{{BASE_URL}}/admin/permissions/
```

Endpoints
List Permissions
GET /admin/permissions/

Retrieves a list of all permissions.

#### Response

```json
{
    "status": "success",
    "data": [
        {
            "id": 1,
            "name": "edit articles",
            "guard_name": "web",
            "created_at": "2024-06-02T17:07:20.000000Z",
            "updated_at": "2024-06-02T17:07:20.000000Z"
        },
    
    ]
}
```
### Create Permission
POST /admin/permissions/

Creates a new permission.

#### Request

```json
{
    "name": "edit articles"
}
```
#### Response

```json
{
    "status": "success",
    "data": "Permission Created"
}
```
### View Permission
GET /admin/permissions/{id}

Retrieves a specific permission by ID.

#### Response

```json
{
    "status": "success",
    "data": {
        "id": 1,
        "name": "edit articles",
        "guard_name": "web",
        "created_at": "2024-06-02T17:07:20.000000Z",
        "updated_at": "2024-06-02T17:07:20.000000Z"
    }
}
```
### Update Permission
PUT /admin/permissions/{id}

Updates an existing permission.

#### Request

```json
{
    "name": "edit articles"
}
```
### Response

```json
{
    "status": "success",
    "message": "Permission Updated"
}
```
### Delete Permission
DELETE /admin/permissions/{id}

Deletes a specific permission by ID.

#### Response

```json
{
    "status": "success",
    "message": "Permission deleted successfully"
}
```
### Error Responses
All endpoints can return error responses in the following format:

Validation Error

```json
{
    "status": "failed",
    "message": "Validation failed",
    "errors": {
        "field_name": ["Error message"]
    }
}
```
### General Error

```json
{
    "status": "failed",
    "message": "Error message",
    "error": "Detailed error message"
}
```


