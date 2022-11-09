- composer install
- npm i bootstrap --save-dev
- npm install sass --save-dev
- El documento de la base de datos se encuentra adjunto en los archivos de lproyecto, se llama "KonectaDB.sql" su codigo se debe correr en el administrador de bases de datos

- Se debe configurar el archivo .env de la siguiente forma:
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=konecta_db
- En  caso de que no exista el archivo .env copiar y pegar .env.example y renobrarlo
- La maquina que va a correr el proyecto debe contar con laravel 9 y composer instalado
- Para poder correr el proyecto se deben ejectuar los siguiente comandos:
    - php artisan key:generate 
    -php artisan serve
