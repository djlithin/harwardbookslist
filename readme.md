
## Setup

Its required that one has [docker-compose](https://docs.docker.com/compose/install/) on the machine installed.

#Step 1: 
1. Git clone & change directory
2. Overwrite the credentions from your `.env` locally with those provided here

```sh
APP_NAME=libraryapp
APP_ENV=local
APP_DEBUG=true
APP_LOG_LEVEL=debug
APP_KEY=base64:SB86V7gyBPPc2tyd/gNe2sKZCjCDKuVA21/USQjuABw=

DB_HOST=db
DB_PORT=3306
DB_DATABASE=local_laravel
DB_USERNAME=local_developer
DB_PASSWORD=secret
DB_CONNECTION=mysql

MAIL_DRIVER=log
```


## Step 2: Execute docker

Run container

  ```sh
  docker-compose up -d --build
  ```

this may take a moment. After the container has been setup, check the status with

  ```sh
  docker-compose ps
  ```

you should see three containers are running.


## Step 3: Install Composer dependencies

Bash into your container:

  ```sh
  docker-compose exec app bash
  ```

Install composer dependencies (this may also take a moment):

  ```sh
  composer install
  ```

and finally generate a key

  ```sh
  php artisan key:generate
  ```

then Create table

 ```sh
  php artisan migrate
  ```

## Import data from Harward API using artisan command ( options --author, --genre) 

 ```sh
  php artisan library library:create --author=shakespeare
  ```

list of books now be accessible under `localhost:8005`

## API to retrive DATA from database

http://localhost:8005/api/books?page=1

-search parameter

	-s string optional

-filters
	
	-title string optional
	-publisher string optional 






