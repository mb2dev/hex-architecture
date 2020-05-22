# Hexagonal Architecture

Lab to test the implementation of the hexagonal architecture with symfony 5 from the Alistair Cockburn principles.

The goals behind this architecture is to be solide, testable , and evolutive.

Do not use in production.

## Principe of the hexagonal Architecture :
   
 ![Hexagonal architecture](doc/hex-architecture.png)
    
We found the 4 layers of the hex architecture :
 
 - Domain
 - Application
 - Infrastructure
 - UI

Each layer can use an inferior layer but can never use a superior layer directly.

The only way to call a superior layer, is to use the **event**, the **exception** and the **adaptors**

**Domain :**
 
 Must contain the business logic. You will find your modele, the business rule, the event and the business exception.
 
**Application :**

 You will find all the application code. You can use the domain layer and the infrastructure layer where the
 implementation is based on the port definition (adapter).

**Infrastructure :**

The infrastructure layer contain all the implementation of the adapters described in the interfaces of the lower layers. You will found also
all the service necessary to communicate your application with your infrastructure.

**UI :**

 You will find found the exposition of your application. (Command / Controller / Form etc...);
 
 ## Hexagonal in a nutshell
 
 **Benefits :**
 
 - Easily to test the business code. The domain depends on nothing but itself. You can create real functional test which don't have to deal with technical problematic.
 - The Domain is isolated and agnostic. You can evolve your infrastructure without update the domain (update frameworks, change techno).
 - You can easily implement your exposition parts (API/CLI ect). You must only update the UI and maybe the Application layers, without updating the business logic.
 - You can share the development of the layer on several teams.
 - Architecture oriented microservice. It's easy to sort each domain as a microservice.
  
**Disadvantages :**
- Lot of class
- Principle difficult to apprehend for a new team.
- More code.
- Can be overkill for project with a poor business logic.

## Run the project :
 ```$bash
docker-compose up 
docker exec -it hex-mysql sh
composer install
bin/console doctrine:schema:create
```

## Route
POST http://0.0.0.0:81/api/products
```json
{
	"name": "USB Hubs",
	"description": "Easy Setup: No Installation; Plug & Play and Hot Swappable",
	"price": 12.5
}
```


GET http://0.0.0.0:81/api/products/{id}