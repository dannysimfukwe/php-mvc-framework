# Simple PHP MVC Framework
- Was bored and wanted to write something in PHP because it has been a while since I played with the language..

### PHP version 8+

### Requirements
- docker
To start the application, run:
```sh run docker-compose up ```
> visit localhost:3000

### Migrations

### Create migration
```sh sudo docker exec mvc-app-1 vendor/bin/phinx  create TestMigration```
> Read more here https://hrportal.readthedocs.io/en/latest/commands.html

### Development

```sh sudo docker exec mvc-app-1 vendor/bin/phinx migrate  -e development ```

### Production

 ```sh sudo docker exec php-mvc-framework-app-1 vendor/bin/phinx migrate  -e production ```

### Seeding Data

```sh sudo docker exec php-mvc-framework-app-1 vendor/bin/phinx seed:create ```

```sh sudo docker exec php-mvc-framework-app-1 vendor/bin/phinx seed:run  -e development ```

### Credits
> [Phinx](https://phinx.org/)

> [Laravel ORM](https://laravel.com/docs/8.x/eloquent)
