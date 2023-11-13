## 👷‍♂️👷‍♂️ Descripción del proyecto

Este proyecto tiene como objetivo crear una API de los productos de la pagina de hamburguesas, que creamos la entrega pasada.

La API proporciona acceso a los productos, donde se puede obtener todos ellos, 2 opciones de filtro (name y price), y dos maneras de ordenarlo ( ASC o DESC).

Desarrollado con el patrón de diseño MVC.

***



## :busts_in_silhouette: Integrante:
+ Gonzalo Minvielle   -> `gminviellecepeda@gmail.com`

***
##  API
> [!note]  
> (Las solicitudes y respuestas están en formato **JSON**)

------------------------------------
LA RUTA EN MI CASO COMIENZA:
localhost/TPE-WEB2/api/...
-------------
Los endpoints para usar son los siguientes:

- GET '/productos' : devuelve todos los productos del menu.

```json 
[
    {
        "id": 1,
        "name": "Hamburguesa Clasica Doble",
        "price": 25,
        "id_category": 1,
        "description": "Hamburguesa de doble medallon de carne, con cheddar, cebolla, lechuga y tomate.",
        "picture": "https://i.postimg.cc/CB7JV14Z/dobleclasica.jpg",
        "tipo": "Hamburguesa"
    },
]...



descripcion de los query-params:

|:ID| Recibe un entero, para utilizarlo en las busquedas dentro de la DB.
|:sort_filter| Es el valor que sera el que define por que dato se va a filtrar.. en mi caso espera un `name` o `price`.
|:sort_mode| Es quien define de que manera se van a ordenar los productos, espra un `ASC` o  `DESC`

---------------------------------------------

-GET `/prodcutos/:ID` : Devuelve el producto con el ':ID'. GET -> (localhost/TPE-WEB2/api/productos/1)
-PUT `/productos/:ID' : Obtiene los datos del body, y cambia los del producto con el ':ID' proporcionado. PUT -> (localhost/TPE-WEB2/api/productos/1). + DATOS DEL BODY EN FORMATO JSON.
-POST `/productos` : Agrega un producto proporcionado por el body a la tabla productos. POST -> (localhost/TPE-WEB2/api/productos) + DATOS DEL BODY EN FORMATO JSON.
-GET `productos/:sort_filter/:sort_mode`: Obtiene, ordena, y devuelve los productos, segun los parametros obtenidos; GET -> (localhost/TPE-WEB2/api/productos/name/ASC);

--------------------------------------------
✅API RESTful.
✅COLECCION ENTERA DE UNIDADES.
✅COLECCION ORDENADA POR ASC O DESC.
✅GET POR ID.
✅SERVICIOS PARA AGREGAR Y MODIFICAR DATOS.
✅MANEJO ADECUADO DE ERRORES 200, 201, 400, 404, 500.

