<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains over 1500 video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

## Laravel Sponsors

We would like to extend our thanks to the following sponsors for funding Laravel development. If you are interested in becoming a sponsor, please visit the Laravel [Patreon page](https://patreon.com/taylorotwell).

### Premium Partners

- **[Vehikl](https://vehikl.com/)**
- **[Tighten Co.](https://tighten.co)**
- **[Kirschbaum Development Group](https://kirschbaumdevelopment.com)**
- **[64 Robots](https://64robots.com)**
- **[Cubet Techno Labs](https://cubettech.com)**
- **[Cyber-Duck](https://cyber-duck.co.uk)**
- **[Many](https://www.many.co.uk)**
- **[Webdock, Fast VPS Hosting](https://www.webdock.io/en)**
- **[DevSquad](https://devsquad.com)**
- **[Curotec](https://www.curotec.com/services/technologies/laravel/)**
- **[OP.GG](https://op.gg)**
- **[CMS Max](https://www.cmsmax.com/)**
- **[WebReinvent](https://webreinvent.com/?utm_source=laravel&utm_medium=github&utm_campaign=patreon-sponsors)**
- **[Lendio](https://lendio.com)**
- **[Romega Software](https://romegasoftware.com)**

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).


## Título del Proyecto
Exámen técnico de Extendeal. 
Estas instrucciones te permitirán obtener los pasos para instalación del proyecto y ponerlo en funcionamiento en tu local para ejecutarlo y realizar las pruebas de los Apis diseñados. 

## Instalación
 Una vez clonado o descargado el proyecto, se debe ejecutar los siguientes comandos desde consola, dentro del proyecto

```
 composer install
```
 Base de Datos
1) Se debe crear una base de datos en su servidor MySQL 

2) Se debe configurar en el archivo .env de acuerdo a su configuración de servidor MySQL, ejemplo
     
    ```
    #Base de datos
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=extendeal
    DB_USERNAME=root
    DB_PASSWORD=
    ```

      
 3) Ejecutar el siguiente comando para creación de tablas y objetos de la base de datos

```
php artisan migrate
```
  
  En caso de querer actualizar la base de datos, se debe ejecutar el siguiente comando:

```
php artisan migrate:resfresh
```

Tomar como referencia en el archivo .env.example

Una vez agregado las variables en el .env, se debe ejecutar los siguientes comandos:
php artisan cache:clear
php artisan config:cache

## Ejecutando las pruebas del servicio del Api RestFul


--------------------------------------APIS DE USUARIOS------------------------
```
API PARA CREAR UN USUARIO
http://localhost/test-extendeal/public/api/users   
```
Configuración requerida:
```
-Método POST  
-En los Headers definir,  en el KEY = Content-Type  y Values= application/json
-Para la validación y autenticación de usuario header X-HTTP-USER-ID,  se debe agregar en el Headers,  en el key=Authorization  y en el value=Bearer (TOKEN GENERADO AL INGRESAR EL USUARIO)
-En el body, se configura como raw  tipo json 
Json ejemplo:
{
	"name":"GEROAN CADENAS",
	"email":"geroancadenas@gmail.com",
	"password":"",
	"remember_token":"",
	"api_token":"",
	
}

Respuesta que emite:
{
    "user": {
        "name": "GEROAN CADENAS",
        "username": "geroan",
        "email": "geroancadenas@gmail.com",
        "updated_at": "2022-01-28T13:55:33.000000Z",
        "created_at": "2022-01-28T13:55:33.000000Z",
        "id": 1
    },
    "token": "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC9sb2NhbGhvc3RcL3Rlc3QtZXh0ZW5kZWFsXC9wdWJsaWNcL2FwaVwvdXNlcnMiLCJpYXQiOjE2NDMzNzgxMzMsImV4cCI6MTY0MzM4MTczMywibmJmIjoxNjQzMzc4MTMzLCJqdGkiOiJ4VTNVUzlUakhpNTJXaFZLIiwic3ViIjoxLCJwcnYiOiIyM2JkNWM4OTQ5ZjYwMGFkYjM5ZTcwMWM0MDA4NzJkYjdhNTk3NmY3In0.7LyAmsuLScEPR7qNTBCzy2PrHKGbQZIAkA72e0fy8Ic"
}
```
El token se debe tomar para poder consumir las apis protegidas, también se puede obtener de la api login si no se copia el token de esta respuesta o si caduca en token.

```
API PARA OBTENER EL TOKEN  
http://localhost/test-extendeal/public/api/login  
```
Configuración requerida:
```
-Método POST  
-En los Headers definir,  en el KEY = Content-Type  y Values= application/json
-En el body, se configura como raw  tipo json 
Json ejemplo:
{
	"email":"geroancadenas@gmail.com",
	"password":"1234"
}

Respuesta que emite: 
Ejemplo
{
    "token": "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC9sb2NhbGhvc3RcL3Rlc3QtZXh0ZW5kZWFsXC9wdWJsaWNcL2FwaVwvbG9naW4iLCJpYXQiOjE2NDMzNzg0MzYsImV4cCI6MTY0MzM4MjAzNiwibmJmIjoxNjQzMzc4NDM2LCJqdGkiOiI4U3pseXozTXQ0R1JBdEtKIiwic3ViIjoxLCJwcnYiOiIyM2JkNWM4OTQ5ZjYwMGFkYjM5ZTcwMWM0MDA4NzJkYjdhNTk3NmY3In0.Wy2ttR8ZgiFKD19_lm0O9N4h1XFtfxEZ8yd2trGE6QM"
}
```


```
API PARA OBTENER DATOS DE AUTENTICACIÓN  
http://localhost/test-extendeal/public/api/users/login
```
Configuración requerida:
```
-Método POST  
-En los Headers definir,  en el KEY = Content-Type  y Values= application/json
-En el body, se configura como raw  tipo json 
Json ejemplo:
{
    "username":"geroan",
    "password":"1234"
}

Respuesta que emite:
Ejemplo
{
    "id": 1,
    "name": "GEROAN CADENAS",
    "username": "geroan",
    "email": "geroancadenas@gmail.com",
    "created_at": "2022-01-28T13:55:33.000000Z",
    "updated_at": "2022-01-28T13:55:33.000000Z"
}
```


```
API PARA CONSULTAR USUARIOS
http://localhost/test-extendeal/public/api/users 
```

Configuración requerida:
```
-Método GET  
-Api restringida por identificación de usuario: Se espera token para consumir el api. 
-En los Headers definir,  en el KEY = Content-Type  y Values= application/json
-Para la validación y autenticación de usuario header X-HTTP-USER-ID,  se debe agregar en el Headers,  en el key=Authorization  y en el value=Bearer (TOKEN GENERADO AL INGRESAR EL USUARIO)

Respuesta que emite:
Ejemplo
[
    {
        "id": 1,
        "name": "GEROAN CADENAS",
        "username": "geroan",
        "email": "geroancadenas@gmail.com",
        "created_at": "2022-01-28T13:55:33.000000Z",
        "updated_at": "2022-01-28T13:55:33.000000Z"
    },
    {
        "id": 2,
        "name": "ANTONIO ALVAREZ",
        "username": "antonio",
        "email": "geroancadenas.ar@gmail.com",
        "created_at": "2022-01-28T14:12:47.000000Z",
        "updated_at": "2022-01-28T14:12:47.000000Z"
    }
]
```

--------------------------------------APIS RESTful PARA ADMINISTRAR LOS CUADROS DE UN MUSEO------------------------
API PARA PROCESAR LOS CUADROS, para ello se creó con la técnica apiResource, el cual permite con una sola declaración de Route en el api.php, acceder a los distintos endpoints  para Crear, Consultar, Modificar y Borrar. 

```
URL BASE;
http://localhost/test-extendeal/public/api/cuadros 

PARA CREAR:
```

Configuración requerida:
```
-Método POST  
-Api restringida por identificación de usuario: Se espera token para consumir el api. 
-Para la validación y autenticación de usuario header X-HTTP-USER-ID,  se debe agregar en el Headers,  en el key=Authorization  y en el value=Bearer (TOKEN GENERADO AL INGRESAR EL USUARIO)
-En el body, se configura como raw  tipo json 
Json ejemplo:
{
    "titulo":"Estilo de Servidores",
    "autor":"Antonio Cadenas",
    "description":"Pintura de los primeros Servidores de computadoras",
    "anio_creacion":"2000",
    "cod_museo":"1",
    "cod_registro":"52",
    "costo":"20000",
    "accion":"INGRESO",
    "status":"EN EXHIBICION"
}

Respuesta que emite:
Ejemplo
{
    "data": {
        "": "---*---DATOS PROCESADOS---*---:''",
        "ID": 3,
        "Título": "SERVIDORES",
        "Autor": "ANTONIO CADENAS",
        "Description": "Pintura de los primeros Servidores de computadoras",
        "Año de Creacion": "2000",
        "Código del Museo": "1",
        "Código de Registro": "52",
        "Precio": "20000",
        "Status": "EN EXHIBICION",
        "Fecha de Ingreso": "28-01-2022",
        "Fecha de Actualización": "28-01-2022"
    },
    "Respuesta": true,
    "Mensaje": "El cuadro fue agregado correctamenta"
}
```


```
PARA CONSULTA GENETRAL:
http://localhost/test-extendeal/public/api/cuadros
```
Configuración requerida:
```
-Método GET  
-Api restringida por identificación de usuario: Se espera token para consumir el api. 
-Para la validación y autenticación de usuario header X-HTTP-USER-ID,  se debe agregar en el Headers,  en el key=Authorization  y en el value=Bearer (TOKEN GENERADO AL INGRESAR EL USUARIO)

Respuesta que emite:
Ejemplo
{
    "data": [
        {
            "": "---*---DATOS PROCESADOS---*---:''",
            "ID": 1,
            "Título": "ESTILO DE SERVIDORES",
            "Autor": "ANTONIO CADENAS",
            "Description": "Pintura de los primeros Servidores de computadoras",
            "Año de Creacion": 2000,
            "Código del Museo": 1,
            "Código de Registro": 52,
            "Precio": 20000,
            "Status": "EN EXHIBICION",
            "Fecha de Ingreso": "28-01-2022",
            "Fecha de Actualización": "28-01-2022"
        },
        {
            "": "---*---DATOS PROCESADOS---*---:''",
            "ID": 2,
            "Título": "ESTILO DE MOUSE",
            "Autor": "JERONIMO CADENAS",
            "Description": "Pintura de los primeros Mouse de computadoras",
            "Año de Creacion": 2012,
            "Código del Museo": 1,
            "Código de Registro": 52,
            "Precio": 20000,
            "Status": "EN EXHIBICION",
            "Fecha de Ingreso": "28-01-2022",
            "Fecha de Actualización": "28-01-2022"
        }
    ],
    "Mensaje": "Listado de cuadros en el museo"
}
```



```
PARA CONSULTAR ESPECÍFICA:
http://localhost/test-extendeal/public/api/cuadros/1   
Para traer un caudro en específico, se debe indicar el ID del cuadro al final de la URL  del api. 
```

Configuración requerida:
```
-Método GET  
-Api restringida por identificación de usuario: Se espera token para consumir el api. 
-Para la validación y autenticación de usuario header X-HTTP-USER-ID,  se debe agregar en el Headers,  en el key=Authorization  y en el value=Bearer (TOKEN GENERADO AL INGRESAR EL USUARIO)

Respuesta que emite:
Ejemplo
{
    "data": {
        "": "---*---DATOS PROCESADOS---*---:''",
        "ID": 1,
        "Título": "ESTILO DE SERVIDORES",
        "Autor": "ANTONIO CADENAS",
        "Description": "Pintura de los primeros Servidores de computadoras",
        "Año de Creacion": 2000,
        "Código del Museo": 1,
        "Código de Registro": 52,
        "Precio": 20000,
        "Status": "EN EXHIBICION",
        "Fecha de Ingreso": "28-01-2022",
        "Fecha de Actualización": "28-01-2022"
    },
    "Respuesta": true,
    "Mensaje": "Se efectuó la consulta específica de forma correcta",
    "OTRO VALOR": "EL OTRO VALOR"
}
```


```
PARA MODIFICAR UN CUADRO:
http://localhost/test-extendeal/public/api/cuadros/1   
Para modificar un caudro en específico, se debe indicar el ID del cuadro al final de la URL  del api. 
```

Configuración requerida:
```
-Método PUT  
-Api restringida por identificación de usuario: Se espera token para consumir el api.
-Para la validación y autenticación de usuario header X-HTTP-USER-ID,  se debe agregar en el Headers,  en el key=Authorization  y en el value=Bearer (TOKEN GENERADO AL INGRESAR EL USUARIO)
-En el body, se configura como raw  tipo json 
Json ejemplo:
{
    "titulo":"Estilo de Servidores",
    "autor":"GEROAN CADENAS",
    "description":"Pintura de los primeros servidores de computadoras",
    "anio_creacion":"20000",
    "cod_museo":"1",
    "cod_registro":"5",
    "costo":"20000",
    "status":"EN ARCHIVO"
}

Respuesta que emite:
Ejemplo
{
    "data": {
        "": "---*---DATOS PROCESADOS---*---:''",
        "ID": 1,
        "Título": "ESTILO DE SERVIDORES",
        "Autor": "GEROAN CADENAS",
        "Description": "Pintura de los primeros servidores de computadoras",
        "Año de Creacion": "20000",
        "Código del Museo": "1",
        "Código de Registro": "5",
        "Precio": "20000",
        "Status": "EN ARCHIVO",
        "Fecha de Ingreso": "28-01-2022",
        "Fecha de Actualización": "28-01-2022"
    },
    "Respuesta": true,
    "Mensaje": "Se modificaron los datos del cuadro de forma correcta"
}
```



```
PARA ELIMINAR UN CUADRO:
http://localhost/test-extendeal/public/api/cuadros/2
```

Configuración requerida:
```
-Método DELETE  
-Api restringida por identificación de usuario: Se espera token para consumir el api.
-Para la validación y autenticación de usuario header X-HTTP-USER-ID,  se debe agregar en el Headers,  en el key=Authorization  y en el value=Bearer (TOKEN GENERADO AL INGRESAR EL USUARIO)

Respuesta que emite:
Ejemplo
{
    "data": {
        "": "---*---DATOS PROCESADOS---*---:''",
        "ID": 2,
        "Título": "ESTILO DE MOUSE",
        "Autor": "JERONIMO CADENAS",
        "Description": "Pintura de los primeros Mouse de computadoras",
        "Año de Creacion": 2012,
        "Código del Museo": 1,
        "Código de Registro": 52,
        "Precio": 20000,
        "Status": "EN EXHIBICION",
        "Fecha de Ingreso": "28-01-2022",
        "Fecha de Actualización": "28-01-2022"
    },
    "Respuesta": true,
    "Mensaje": "Se eliminaron los datos del cuadro de forma correcta"
}
```

-------------------------------API PARA LA CONSULTA DE CUADROS POR CRITERIOS DE BÚSQUEDA------------------------

```
http://localhost/test-extendeal/public/api/consulta_cuadros_criterios?filters[titulo,autor,anio_creacion,]=Perifericos,Jeronimo Cadenas,2013&fields=costo,description,titulo,autor,cod_registro,costo

```
Configuración requerida:
```
-Método GET  
-Api restringida por identificación de usuario: Se espera token para consumir el api.
-Para la validación y autenticación de usuario header X-HTTP-USER-ID,  se debe agregar en el Headers,  en el key=Authorization  y en el value=Bearer (TOKEN GENERADO AL INGRESAR EL USUARIO)

Respuesta que emite: La respuesta depende del tipo de criterios usado. 

Si en la URL solo se especifican los filters, se obtendrá una respuesta predeterminada.
En los filters es importante declarar algún filtro, y se declarará la matriz del arreglo de la siguiente forma, primera etiqueta[] se asociará con la primera columna, y así sucesivamente. 
http://localhost/test-extendeal/public/api/consulta_cuadros_criterios?filters[titulo,autor,anio_creacion,]=Perifericos,Jeronimo Cadenas,2013

Ejemplo:
{
    "Resultado": true,
    "Mensaje": "Consulta por criterios realizada con éxito",
    "": "---*---DATOS PROCESADOS---*---:''",
    "Título": "Estilo de Servidores",
    "Autor": "GEROAN CADENAS",
    "Descripción": "Pintura de los primeros servidores de computadoras",
    "Costo": 20000,
    "Año de Creación": 2000,
    "Estatus": "EN ARCHIVO"
}

Ahora, si en la  URL se especifican los filters y se definen los campos a mostrar (fields) en el json de respuesta, se obtendrá una respuesta construida.
En los fields no importa el orden de los campos con respecto al orden de la tabla, se ordenará de acuerdo a la solicitud.

Ejemplo:
http://localhost/test-extendeal/public/api/consulta_cuadros_criterios?filters[titulo,autor,anio_creacion]=Estilo de Servidores,GEROAN CADENAS,2000&fields=titulo,autor
{
    "Resultado": true,
    "Mensaje": "Consulta por criterios realizada con éxito",
    "titulo": "Estilo de Servidores",
    "autor": "GEROAN CADENAS"
}

http://localhost/test-extendeal/public/api/consulta_cuadros_criterios?filters[titulo,autor,anio_creacion]=Estilo de Servidores,GEROAN CADENAS,2000&fields=titulo,autor,cod_registro,costo,costo,description
Ejemplo:
{
    "Resultado": true,
    "Mensaje": "Consulta por criterios realizada con éxito",
    "titulo": "Estilo de Servidores",
    "autor": "GEROAN CADENAS",
    "cod_registro": 5,
    "costo": 20000,
    "description": "Pintura de los primeros servidores de computadoras"
}
```


-----------API PARA LA CONSULTA DE STATUS PARA CONOCER EL PROMEDIO DE RESPUESTA DEL SERVICIO--------------
```
http://localhost/test-extendeal/public/api/promedio_tiempo
```

Configuración requerida:
```
-Método GET  
-Api restringida por identificación de usuario: Se espera token para consumir el api.
-Para la validación y autenticación de usuario header X-HTTP-USER-ID,  se debe agregar en el Headers,  en el key=Authorization  y en el value=Bearer (TOKEN GENERADO AL INGRESAR EL USUARIO)

Respuesta que emite:
{
    "Resultado": true,
    "Mensaje": "Resumen de promedio de tiempo de repuesta en el servicio de actualización",
    "Promedio de tiempo": 0.03,
    "Total de registros": 2,
    "Cuadros procesados": [
        {
            "Título": "Estilo de Teclado",
            "Autor": "Carmen Alvarez",
            "Accion": "UPDATE",
            "Tiempo de ejecución de la acción": 0.04
        },
        {
            "Título": "Estilo de Mouse",
            "Autor": "Jeronimo Cadenas",
            "Accion": "UPDATE",
            "Tiempo de ejecución de la acción": 0.02
        }
    ]
}
```



```
Si algunas de las Apis protegidas les genera este error:
{
    "status": "Token esta Expirado"
}
```

Se debe realizar la consulta del api http://localhost/test-extendeal/public/api/login   
para obtener un nuevo token y cambiarlo en la herramienta usada para consumir los apis.

Nota: Si en la instalación del proyecto y la ejecución del composer, no se activan las librerías de JWTAuth, 
se debe instalar  composer require tymon/jwt-auth:dev-develop --prefer-source, sin embargo no debe ser necesario ya que se sube en el composer. Esta librería es necesario para control de usuarios y protección por capas con el middleware. 