# MARKETPLACE WITH LARAVEL

basic project with laravel framework.

## Installation

```bash
    git clone git@github.com:KaliaryCisne/marketplace.git
    
    cd marketplace
    
    cd src
    
    composer install
    
    cp .env.example src/.env
    
    php artisan key:generate
```

## Installation using Docker

```bash
    git clone git@github.com:KaliaryCisne/marketplace.git
    
    cd marketplace
```

## Usage
```bash
    php artisan serve
```

## Usage with docker

```bash
    docker-compose up -d
```

## Running command inside the container 
```bash
    docker exec -it [container_id] [command]
```

## Creating tables
```bash
    php artisan migrate
```

## Enter test data into the database
```bash
    php artisan db:seed
```

## License
[MIT](https://github.com/KaliaryCisne/marketplace/blob/master/LICENSE)
