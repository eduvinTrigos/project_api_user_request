#Sistema de Tickets
Este proyecto es un sistema de tickets que permite a los usuarios crear, actualizar y eliminar tickets. El proyecto está construido utilizando el framework CodeIgniter.

Requisitos
Antes de comenzar a utilizar el sistema, asegúrate de que cumplas con los siguientes requisitos:

PHP 7.2 o superior
MySQL 5.6 o superior
Composer
Instalación
Para instalar el sistema de tickets, sigue los siguientes pasos:

Clona el repositorio en tu máquina local:
bash
Copy code
git clone https://github.com/eduvinTrigos/project_api_ticketst
Instala las dependencias utilizando Composer:
Copy code
composer install


Configura las variables de entorno en el archivo .app/config/constats. 
Asegúrate de configurar las variables de entorno para la base de datos.

Ejecuta las migraciones para crear las tablas en la base de datos:

Copy code
php spark migrate
Ejecuta el servidor local de CodeIgniter:
Copy code
php spark serve
Accede al sistema de tickets en tu navegador web en la URL http://localhost:8080/project_api_tickets.
Uso
El sistema de tickets proporciona una API RESTful para interactuar con los tickets. Estas son las rutas disponibles:

GET /tickets: Obtiene una lista de tickets.
GET /tickets/{id}: Obtiene un ticket por ID.
POST /tickets: Crea un nuevo ticket.
PUT /tickets/{id}: Actualiza un ticket existente.
DELETE /tickets/{id}: Elimina un ticket existente.
Para utilizar estas rutas, envía una petición HTTP utilizando una herramienta como Postman o cURL. Asegúrate de configurar la petición con los datos correctos, incluyendo la URL de la API, el método HTTP, y los parámetros necesarios.
