- Tener en cuenta que la version de php deve ser superior a 8
- composer update
- En  caso de que no exista el archivo .env copiar y pegar .env.example y renobrarlo
- Se debe configurar el archivo .env de la siguiente forma:
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=konecta_db
- php artisan key:generate 
- npm i 
- php artisan serve
- El documento de la base de datos se encuentra adjunto en los archivos de lproyecto, se llama "KonectaDB.sql" su codigo se debe correr en el administrador de bases de datos
- La maquina que va a correr el proyecto debe contar con laravel 9 y composer instalado
- Para poder correr el proyecto se deben ejectuar los siguiente comandos:
- Crear modelos con controller php artisan make:model User -mcr