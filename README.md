## Laravel Auth Log package

Paquete de Laravel para poder guardar un log de los accesos de los usuarios. 

### Instalación

En el fichero `composer.json` añadir el repositorio de la siguiente forma:

```sh
    "repositories": [
        {
            "type": "vcs",
            "url": "https://github.com/ertomy/laravel-auth-log"
        }
    ],
```

Después instalar mediante el comando:

```sh  
composer require ertomy/authlog  
```

Con esto el paquete ya está instalado, ahora lo que debemos es hacer referencia al service provider en el fichero `config\app.php` añadiendolo al array de providers:

```php
Ertomy\Authlog\AuthlogPackageServiceProvider::class,
```

Una vez ejecutada la migración se habra creado la tabla *auth_log* y tendremos disponible el modelo *Ertomy\Authlog\Models\Log* con los siguientes campos:

- ip_address
- user_agent
- login_at
- login_successful
- logout_at
- user_id