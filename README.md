# tech_eval
Technical Evaluation for applab
## Installation
Clone or Download repo

Install composer files
```bash
composer install
```
Intall Dependencies
```bash
npm install
```

Create a new .env file and Copy .env.example to .env and set the good values inside .env

Create a new Application key

```bash
php artisan key:generate
```

Run migrations And Seed Databse
```bash
php artisan migrate --seed
```
This Command will:
1.create all the tables for database
2.seed your database with dummy data
3.Create a admin user: email: admin@me.com password:02Vend@r

Create Access Clients
```bash
php artisan passport:install
```
## Usage
request access token / Authenticate user
send post request to http://127.0.0.1:8000/oauth/token
with the following data
```bash
'form_params' => [
        'grant_type' => 'password',
        'client_id' => 'client-id',
        'client_secret' => 'client-secret',
        'username'=> "email",
	    'password'=> "password",
	    'scope'=> "*"
    ],
```
### Mobile Api End Points
Onces you have your access_token you can send a request to:

1.Create / Register a user (POST)

The user for this access token need to be admin if not will not allow to create a user
make a POST request to /api/user
```bash
Header
-Accept => application/json
-Authorization => Bearer 'access_token'

form
'form_params' => [
        'email' => 'user_email',
        'password' => 'user_password',
        'role' => 'admin or user',
        'name" => 'user_name',
        'last_name' => 'user_lastname',
        'age' => 'user_age'
    ],
```

2.get the authenticated user data (GET)

make a GET request to /api/getUsers
```bash
Header
-Accept => application/json
-Authorization => Bearer 'access_token'


```
3.get a user information by id (GET)

make a GET request to /api/user/{user_id}
```bash
Header
-Accept => application/json
-Authorization => Bearer 'access_token'


```
4.update a user information by id (PUT)

make a PUT request to /api/user/{user_id}
```bash
Header
-Accept => application/json
-Content-Type => application/json
-Authorization => Bearer 'access_token'
form
'form_params' => [
        'email' => 'user_email',
        'password' => 'user_password',
        'role' => 'admin or user',
        'name" => 'user_name',
        'last_name' => 'user_lastname',
        'age' => 'user_age'
    ],

```
5.Delete a user information by id (DELETE)

make a DELETE request to /api/user/{user_id}
```bash
Header
-Accept => application/json
-Content-Type => application/json
-Authorization => Bearer 'access_token'

```
6.Find a user by name

make a GET request to /api/findUser?q={name_of_user}
```bash
Header
-Accept => application/json
-Content-Type => application/json
-Authorization => Bearer 'access_token'

```
7.Create movie (POST)

The user for this access token need to be admin if not will not allow to create a user
make a POST request to /api/movie
```bash
Header
-Accept => application/json
-Authorization => Bearer 'access_token'

form
'form_params' => [
        'title' => 'movie_title',
        'imdb_number' => 'imdb_number_number',
        'year' => 'movie_year',
        'poster" => 'movie_image_in_base64'
    ],
```
8.Get Movie By name

make a Get request to /api/findMovie?q={movie_title}
```bash
Header
-Accept => application/json
-Authorization => Bearer 'access_token'
```
9.Get user Favorite Movies

make a Get request to /api/user/{user_id}
```bash
Header
-Accept => application/json
-Authorization => Bearer 'access_token'
```
10.Add Favorite Movie

make a Post request to api/favorites
```bash
Header
-Accept => application/json
-Authorization => Bearer 'access_token'

'form_params' => [
        'user_id' => 'user_id',
        'movie_id' => 'movie_id'
    ],
```


