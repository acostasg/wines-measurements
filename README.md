# IsEazy Ddd Wines Mesasurements

## Init app

````bash
docker-compose up -d
````

enter container fpm and execute:
````bash
composer install
````

## DDD

This project is sample stack Domain Driven Design (DDD)

![DDD](doc/img/img.png)

layers:

![layers](doc/img/layers.png)

### UI (User Interface)
View layer:
- CLI: ommand ci for console (migrations, etc..)
- Api: Endpoint for http request with api rest
- Twig: template engine and controller to *call to use case application layer*

![UI](doc/img/Ui.png)

### Application (Application Layer with use case)

The use case is the core of the application.

![Appplication](doc/img/application_layer.png)

### Domain (Domain Layer, with entities and repositories interfaces)

The most important layer is the domain layer.
In this layer we have the entities, services and repositories used for application layer.

![Domain](doc/img/domain_layer.png)

### Infrastructure (Infrastructure Layer, with repositories implementations)

The infrastructure layer is the layer that contains the repositories implementations.

![Infrastructure](doc/img/infrastucture_layer.png)

## Tests
Replicate structure of project with tests

The most important is test in application layer and domain layer.
User phpunit for unitary and behat for functional test.

![Test](doc/img/test.png)

