# Codeicus - Ejercicio Alfajores

### Configuración del proyecto

1. Clonar el proyecto.
2. Correr el comando `php composer install`.
3. Copiar archivo .env.dist como .env.
4. Editar en el archivo .env la línea 16 `DATABASE_URL=mysql://db_user:db_password@127.0.0.1:3306/db_name`:
    - Usuario y password de la base de datos.
    - Nombre de la base de datos.
5. Correr el comando `php bin/console doctrine:database:create` para crear la base de datos configurada en el paso anterior.
6. Correr el comando `php bin/console doctrine:migrations:latest` para obtener la versión de la última migración.
7. Correr el comando `php bin/console doctrine:migrations:execute <migration_version>` <migration_version> es la versión obtenida en el paso anterior, con esto generamos la estructura de la tabla `alfajor`. 
8. Corremos el comando `php bin/console doctrine:fixtures:load` para cargar la tabla `alfajor` con los gustos de alfajores, letras y precios.
