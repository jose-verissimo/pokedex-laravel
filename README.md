# Pokedex Demo
Pokedex laravel demonstration using Docker, Bootstrap 4, Vue.js & Laravel.
This application allows you to capture 151 pokemons and release them later! Also has registration and login functionalities.

## Setup
1. Install and build the multiple docker containers

`docker-compose up -d --build`

2. Install dependencies

```
docker-compose run --rm composer install
docker-compose run --rm npm install
```

3. Migrate tables to the database.

`docker-compose run --rm artisan migrate`

4. Get all default data into database.

`docker-compose run --rm artisan db:seed --class=PokemonsSeeder`

5. Watch js and sass files for changes through Webpack.

`docker-compose run --rm npm run watch`

## Screenshots
![Pokemon demo screen1](https://www.joseverissimo.com/images/pokemon/screen1.png)
![Pokemon demo screen2](https://www.joseverissimo.com/images/pokemon/screen2.png)
![Pokemon demo screen3](https://www.joseverissimo.com/images/pokemon/screen3.png)
![Pokemon demo screen4](https://www.joseverissimo.com/images/pokemon/screen4.png)
![Pokemon demo screen5](https://www.joseverissimo.com/images/pokemon/screen5.png)
![Pokemon demo screen6](https://www.joseverissimo.com/images/pokemon/screen6.png)
![Pokemon demo screen7](https://www.joseverissimo.com/images/pokemon/screen7.png)
