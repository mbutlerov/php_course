
# Php for beginners course 
Link: https://laracasts.com/series/php-for-beginners-2023-edition

Link a documentación no oficial: https://www.w3schools.com/php/

Link a documentación oficial: https://www.php.net/docs.php

## Indice
[Chapter 1 - The fundamentals](#chapter-1---the-fundamentals)
- [1.1 PHP Tag](#11-php-tag)
- [1.2 Variables](#12-variables)
- [1.3 Conditionals and Booleans](#13-conditionals-and-booleans)
- [1.4 Arrays](#14-arrays)
- [1.5 Associative Arrays](#15-associative-arrays)
- [1.6 Functions and Filters](#16-functions-and-filters)
- [1.7 Lambda Functions](#17-lambda-functions)
  - [1.7.1 Definición y sintaxis básica](#171-definición-y-sintaxis-básica)
  - [1.7.2 Uso como parámetros en otras funciones](#172-uso-como-parámetros-en-otras-funciones)
  - [1.7.3 Asignación a variables](#173-asignación-a-variables)
  - [1.7.4 Uso en Filtrado de datos](#174-uso-en-filtrado-de-datos)
  - [1.7.5 Variables Capturadas y Uso de "use"](#175-variables-capturadas-y-uso-de-use)
- [1.8 Separate Logic from the Template](#18-separate-logic-from-the-template)


[Chapter 2 - Dynamic Web Applications](#chapter-2---dynamic-web-applications)
- [2.1 Page Links](#21-page-link)
- [2.2 Superglobals and current page styling](#22-superglobals-and-current-page-styling)
- [2.4 Make a PHP Router](#24-make-a-php-router)
- [2.5 PDO (PHP Data Objects)](#25-pdo-php-data-objects)
- [2.6 Extract a PHP Database Class](#26-extract-a-php-database-class)






## Chapter 1 - The fundamentals

**1.1 PHP tag:** el código se escribe entre las etiquetas 
"<?php" "?>"

**1.2 Variables:**
Las variables en PHP se definen con el símbolo $ y pueden almacenar diferentes tipos de datos, como cadenas, enteros y arrays.
```php
<?php
$nombre = "Juan";
$edad = 30;
echo "Nombre: $nombre, Edad: $edad";
?>
```
***obs:***
Al usar Comillas dobles (" "), PHP evalua las variables dentro de la cadena y al usar comillas simples (' '),PHP no evalua las variables y las trata como texto literal
```php
<?php
$nombre = "Ana";
echo "Hola, $nombre"; // Imprime "Hola, Ana"

$nombre = "Ana";
echo 'Hola, $nombre'; // Imprime "Hola, $nombre"
?>
```

**1.3 Conditionals and Booleans**
```php
<?php
$nombre_libro = "Dark Matter";
$leido = true;

if ($leido) {
    $mensaje = "Has leído $nombre_libro";
} else {
    $mensaje = "No has leído $nombre_libro";
}

echo $mensaje;
?>

```
**1.4 Arrays:**
```php
<?php
//Creacion de array
$libros = [
    "Do Androids Dream of Electric Sheep",
    "The Langoliers",
     "Project Hail Mary"];
?>
//Impresion de elementos
<ul>
<?php foreach ($libros as $libro): ?>
    <li><?php echo $libro; ?></li>
<?php endforeach; ?>
</ul>

//Cleaner version de impresion <li><?= $libro?> en vez de <?php echo $libro; ?>
<ul>
<?php foreach ($libros as $libro): ?>
    <li><?= $libro?></li>
<?php endforeach; ?>
</ul>
```

**1.5 Associative arrays:** Similar a los diccionarios de Python.
```php
<?php
$persona = array("nombre" => "Ana", "edad" => 25);
echo $persona["nombre"]; // Imprime "Ana"
?>

```

**1.6 Functions and filters:** Similar a los diccionarios de Python.

Ejemplo de Función
```php
<?php
function saludo($nombre) {
    return "Hola, $nombre!";
}
echo saludo("Carlos"); // Imprime "Hola, Carlos!"
?>

```

Ejemplo de filtro utilizando comparacion estricta "==="
```php
<?php
function esPar($numero) {
    if ($numero % 2 === 0) {
        return "$numero es un número par.";
    } else {
        return "$numero es un número impar.";
    }
}

// Uso de la función
echo esPar(4); // Imprime "4 es un número par."
echo esPar(7); // Imprime "7 es un número impar."
?>
```

**1.7 Lambda Function (Anonymmous functions)**:Las funciones anónimas, también conocidas como closures, son funciones sin un nombre explícito. Se utilizan para pasar bloques de código como parámetros, asignarlos a variables, y proporcionar flexibilidad en la ejecución de operaciones.

- 1.7.1 Definición y sintaxis básica:

    **Definición:** Funciones sin nombre y Pueden ser asignadas a variables y pasadas como parámetros.

    **Syntax**
    ```php
    <?php
    $nombreVariable = function() {
        // Código a ejecutar
    };
    ?>

    ```
    Ejemplo Básico:
    ```php
    <?php
    $miFuncion = function() {
    echo '¡Hola Mundo!';
    };
    $miFuncion(); // Llama a la función anónima
    ?>
    ```
- 1.7.2 Uso como parámetros en otras funciones:

    **Concepto:**
    Las funciones anónimas pueden ser pasadas como argumentos a otras funciones.
    Esto es útil para definir comportamientos específicos al momento de la  llamada. 
    
    **Ejemplo de Uso de parámetro**
    ```php
    <?php
    function ejecutar($funcion) {
    $funcion();
    }

    ejecutar(function() {
        echo '¡Hola Mundo!';
    });
    ?>
    ```
- 1.7.3 Asignación a variables:

    **Concepto:**
    Las funciones anónimas pueden ser asignadas a variables para reutilizar el código. Esto permite almacenar y llamar a la función en diferentes partes del código.
    
    **Ejemplo de Asignación a variable**
    ```
    $saludar = function($nombre) {
    echo "¡Hola, $nombre!";
    };

    $saludar('Carlos'); // Imprime: ¡Hola, Carlos!
    ```
- 1.7.4 Uso en Filtrado de datos:

    **Concepto:**
    Las funciones anónimas son especialmente útiles en operaciones de filtrado, donde el criterio puede variar. Se pasan como parámetros a funciones como array_filter.
    
    **Ejemplo de Filtrado**
    ```
    $libros = [
    ['titulo' => 'Do Androids Dream of Electric Sheep', 'ano' => 1968],
    ['titulo' => 'The Langoliers', 'ano' => 1990],
    ['titulo' => 'Project Hail Mary', 'ano' => 2021]
    ];

    $filtrarPorAno = function($libro) {
        return $libro['ano'] >= 2000;
    };

    $resultado = array_filter($libros, $filtrarPorAno);
    print_r($resultado);
    ```
- 1.7.5 Variables Capturadas y Uso de **"use"**:

    **Concepto:**
    Las funciones anónimas pueden capturar variables del entorno donde se definen usando la palabra clave **"use"**. Esto permite que las funciones anónimas accedan a variables externas.
    
    **Ejemplo de Captura de variables**
    ```
    $anoMinimo = 1990;
    $filtrarPorAno = function($libro) use ($anoMinimo) {
        return $libro['ano'] >= $anoMinimo;
    };

    $resultado = array_filter($libros, $filtrarPorAno);
    print_r($resultado);
    ```

**1.8 Separate Logic from the template:** En PHP, es común separar la lógica del código de la presentación (HTML) para mejorar la organización y mantenibilidad del código. Cuando combinamos la lógica PHP y el HTML en un solo archivo, el código puede volverse desordenado y difícil de mantener. 

- Archivo PHP
    - Crea un archivo ***index.php*** para la lógica.
    - Este archivo manejará la preparación de datos y la lógica que luego utilizará ***index.view.php***.
    - Para cargar el view se utiliza ***require*** es similar en django cuando se incluye un template de header ***"%include header.html%"*** solo que aqui es require.
```php
<?php
// index.php
$libros = [
    ['titulo' => 'Do Androids Dream of Electric Sheep', 'ano' => 1968],
    ['titulo' => 'The Langoliers', 'ano' => 1990],
    ['titulo' => 'Project Hail Mary', 'ano' => 2021]
];

// Filtrar libros o cualquier otra lógica aquí
$librosFiltrados = $libros; // Ejemplo simple
require 'index.view.php'; // Cargar el template
?>
```

- Archivo HTML
    - Crea un archivo ***index.view.php*** que contenga solo el HTML.
    - Este archivo usará los datos preparados en ***index.php***.
```php
<!-- index.view.php -->
<!DOCTYPE html>
<html>
<head>
    <title>Mis Libros Favoritos</title>
</head>
<body>
    <?php foreach ($librosFiltrados as $libro): ?>
        <p><?= $libro['titulo'] ?> (<?= $libro['ano'] ?>)</p>
    <?php endforeach; ?>
</body>
</html>

```
## Chapter 2 - Dynamic Web Applications

**2.1 Page Links:** Muestra como utilizar tag <a href='/'>home</a> para relacionar las páginas.

**2.2 Superglobals and current page styling:** conceptos claves de `Superglobales`(`$_SERVER`,`$_GET`,`$_POST`,`$_REQUEST`,etc), funcion `var_dump()` y `die()`.
1. Superglobales:
    - Son variables globales predefinidas en PHP que están disponibles en       cualquier parte del código. En el video, se utilizan para obtener datos del entorno y de las solicitudes.
    - ***Ejemplo de uso:*** `$_SERVER` para obtener la URL actual y determinar la página actual.

2. `var_dump()`:
    -  Es una función de depuración que muestra información detallada sobre una variable, incluyendo su tipo y valor.
    - ***Ejemplo de uso:*** `var_dump($_SERVER)`; para ver la estructura y datos del array `$_SERVER`.

3. `die()`:
    -  Es una función que termina la ejecución del script y opcionalmente muestra un mensaje. Se usa comúnmente para depuración y manejo de errores.
    - ***Ejemplo de uso:*** :`die('Debugging message');` para detener la ejecución y mostrar un mensaje.

**2.4 Make a PHP Router:**
1. **Construcción de un Enrutador Básico**:
    - ***Crear un Archivo Único de Entrada:*** Usa un archivo principal `(index.php)` para manejar todas las solicitudes.
    - ***Extraer y Procesar la Ruta Actual:*** Utiliza $_SERVER['REQUEST_URI'] y parse_url() para obtener y manejar la ruta solicitada.

2. **Manejo de Rutas y errores**:
    -  ***Mapeo de Rutas:*** Define un arreglo asociativo para mapear rutas a controladores.
    - ***Carga Dinámica de Controladores:*** Requiere los archivos del controlador según la ruta actual.
    - ***Manejo de Errores:***  Usa http_response_code(404) y proporciona una página de error personalizada si la ruta no se encuentra.

3. **Refactorización**:
    -  ***Organización del Código:*** Separa la lógica de enrutamiento y manejo de errores en funciones y archivos específicos para mantener el código limpio y modular.
 ***Codigo Ejemplo***
1. `index.php`:
```php
        <?php
        require 'functions.php';
        require 'router.php';

        // Obtener la ruta actual
        $requestUri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

        // Enrutar la solicitud
        route($requestUri);
```

2. `router.php`
  ```php
    <?php
    function route($path) {
        // Mapa de rutas
        $routes = [
            '/' => 'controllers/index.php',
            '/about' => 'controllers/about.php',
            '/contact' => 'controllers/contact.php',
        ];
        
        // Limpiar el path y verificar la ruta
        $path = trim($path, '/');
        if (isset($routes[$path])) {
            require $routes[$path];
        } else {
            // Página no encontrada
            http_response_code(404);
            require 'views/404.php';
        }
    }

  ```

3. `views/404.php`
    ```
    <!DOCTYPE html>
    <html>
    <head>
        <title>404 Not Found</title>
    </head>
    <body>
        <h1>404 Not Found</h1>
        <p>Sorry, the page you are looking for does not exist.</p>
        <a href="/">Go back to homepage</a>
    </body>
    </html>
    ```
**2.5 PDO (PHP Data Objects):** es una interfaz de acceso a bases de datos en PHP que ofrece una forma uniforme de interactuar con diferentes sistemas de gestión de bases de datos (DBMS). Aquí tienes una explicación concisa de sus características principales:

1. **Interfaz Abstraction:** Proporciona una capa de abstracción que permite cambiar el DBMS sin necesidad de cambiar el código SQL.

2. **Soporte para Múltiples DBMS:** Compatible con varios sistemas de bases de datos, como MySQL, PostgreSQL, SQLite, Oracle, entre otros.

3. **Seguridad:** Ofrece soporte para consultas preparadas y enlaces de parámetros, lo que ayuda a prevenir ataques de inyección SQL.

4. **Objetos y Métodos:** Utiliza un enfoque orientado a objetos. Las consultas y las interacciones con la base de datos se realizan mediante métodos de objetos PDO.

5. **Manejo de Errores:** Permite manejar errores mediante excepciones, lo que facilita la depuración y el control de errores.

### **Ejemplo Básico:**

```php
<?php
// Conexión a la base de datos
try {
    $pdo = new PDO('mysql:host=localhost;dbname=testdb', 'username', 'password');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Consulta preparada
    $stmt = $pdo->prepare('SELECT * FROM users WHERE id = :id');
    $stmt->execute(['id' => 1]);

    // Fetching data
    $user = $stmt->fetch(PDO::FETCH_ASSOC);
    print_r($user);
} catch (PDOException $e) {
    echo 'Error: ' . $e->getMessage();
}
//En este ejemplo, se crea una conexión a la base de datos, se prepara y ejecuta una consulta, y se obtienen los resultados de forma segura.
```
### **2.6 Extract a PHP Database Class**

1. **Objetivo:**
   - Crear una clase PHP para gestionar la conexión y operaciones de base de datos, centralizando la lógica de acceso y manejo de errores.

2. **Creación de la Clase:**
   - **Definición:** `Database` con métodos para conectar, consultar y manejar errores.
   - **Propiedades:** `pdo` (instancia de conexión), `$dsn`, `$user`, `$password` (credenciales).

3. **Métodos Clave:**
   - **Constructor:** Establece conexión usando PDO.
   - **`query($sql, $params = [])`:** Ejecuta y retorna resultados de consultas SQL.
   - **`execute($sql, $params = [])`:** Ejecuta consultas preparadas.

4. **Manejo de Errores:**
   - Utiliza excepciones para capturar y mostrar errores de conexión y consulta.

**Ejemplo:**
```php
    <?php
    class Database {
    private $pdo;

    public function __construct($dsn, $user, $password) {
        try {
            $this->pdo = new PDO($dsn, $user, $password);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo 'Connection failed: ' . $e->getMessage();
        }
    }

    public function query($sql, $params = []) {
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute($params);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function execute($sql, $params = []) {
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute($params);
    }
    }

    // Uso de la clase
    $db = new Database('mysql:host=localhost;dbname=testdb', 'username', 'password');
    $users = $db->query('SELECT * FROM users WHERE id = :id', ['id' => 1]);
    print_r($users);
```





## Chapter 3 - Mini notes project

### Render the notes and notes page (conceptos imporantes de este cap)
**PlaceHolders/Wild card:** se utilizan principalmente en consultas preparadas para interactuar con bases de datos. Son marcadores de posición que se reemplazan por valores reales en tiempo de ejecución, lo que ayuda a evitar ataques de inyección SQL y mejora la seguridad y eficiencia de las consultas.
- **Tipos de placeholders:**
  - ***Placeholders Posicionales (?):*** Estos son símbolos de interrogación que se usan como marcadores de posición y se reemplazan en el orden en que aparecen.
```php
<?php
    $stmt = $pdo->prepare("SELECT * FROM users WHERE id = ?");
    $stmt->execute([1]); // Reemplaza el primer '?' por el valor '1'
    $result = $stmt->fetch();
```

  - ***Placeholders Nombrados (:nombre):*** Son marcadores de posición nombrados, lo que permite asociar explícitamente un valor con un nombre.
```php
<?php
    $stmt = $pdo->prepare("SELECT * FROM users WHERE id = :id");
    $stmt->execute(['id' => 1]); // Reemplaza ':id' por el valor '1'
    $result = $stmt->fetch();
```
  ***Ejemplo básico***
```php
<?php
  // Conectarse a la base de datos usando PDO
  $pdo = new PDO('mysql:host=localhost;dbname=testdb', 'user', 'password');

  // Consulta preparada con placeholders nombrados
  $sql = "SELECT * FROM users WHERE username = :username AND status = :status";
  $stmt = $pdo->prepare($sql);

  // Ejecutar la consulta con valores asociados a los placeholders
  $stmt->execute(['username' => 'johndoe', 'status' => 'active']);

  // Obtener los resultados
  $results = $stmt->fetchAll();

  //En este ejemplo, :username y :status son placeholders que se reemplazan por los valores 'johndoe' y 'active' respectivamente al ejecutar la consulta.
```
**Resumen del capitulo 3:**
se centra en la creación de un proyecto de notas donde los usuarios pueden escribir y gestionar sus notas. Cubre la creación y gestión de la base de datos con claves foráneas, la implementación de un sistema de autorización para que los usuarios solo puedan acceder a sus propias notas, y la validación y seguridad de los formularios. Se introduce la creación de una clase Validator para centralizar las validaciones y se enfatiza la importancia de manejar de forma segura las entradas del usuario para evitar ataques.
## Chapter 4 - Project organization
### 4.1 PHP Autoloading and Extraction
**function extract():** es utilizada para convertir los elementos de un array en variables individuales.
  - ***Como funciona:***cuando se llama a `extract($array)`, PHP crea una variable para cada elemento en el array `$array`. El nombre de la variable será la clave del array, y el valor de la variable será el valor correspondiente en el array.
- ***Ejemplo***
index.php
```php
<?php
// Datos del usuario
$userData = [
    'name' => 'John Doe',
    'email' => 'john.doe@example.com',
    'age' => 30
];

// Función para cargar la vista
function view($path, $attributes = []) {
    extract($attributes); // Convierte las claves del array en variables
    require $path; // Incluye el archivo de vista
}

// Cargar la vista con los datos del usuario
view('profile.php', $userData);
?>

```
profile.php
```php
<!DOCTYPE html>
<html>
<head>
    <title><?php echo htmlspecialchars($name); ?>'s Profile</title>
</head>
<body>
    <h1>Welcome, <?php echo htmlspecialchars($name); ?>!</h1>
    <p>Email: <?php echo htmlspecialchars($email); ?></p>
    <p>Age: <?php echo htmlspecialchars($age); ?></p>
</body>
</html>
```

**function compact():** toma un array asociativo y convierte sus claves en nombres de variables.
```php
<?php
$name = "John";
$age = 25;
$city = "New York";

$data = compact('name', 'age', 'city');
// $data es ahora ['name' => 'John', 'age' => 25, 'city' => 'New York']
?>
```

### 4.2 Namespacing: Whay,Why,How?

**Namespaces:** en PHP permiten organizar el código en diferentes espacios de nombres, evitando conflictos entre clases, funciones o constantes con el mismo nombre. Son útiles para mantener el código ordenado y evitar colisiones en proyectos grandes.

### Ejemplo

Supongamos que tienes dos clases con el mismo nombre en diferentes contextos: `User` y `Product`.

#### Estructura de Archivos:
project/

├── src/

│   ├── User.php

│   └── Product.php

└── index.php

#### Código:

1. **Archivo `src/User.php`:**

   ```php
   <?php
   namespace App\Models;

   class User {
       public function getName() {
           return "Nombre del usuario";
       }
   }
    ```
2. **Archivo src/Product.php:**
```php
<?php
namespace App\Inventory;

class Product {
    public function getProduct() {
        return "Nombre del producto";
    }
}
```
3. **Archivo index.php:**
```php
<?php
require_once 'src/User.php';
require_once 'src/Product.php';

use App\Models\User;
use App\Inventory\Product;

$user = new User();
$product = new Product();

echo $user->getName();    // Salida: Nombre del usuario
echo "<br>";
echo $product->getProduct(); // Salida: Nombre del producto

```
***En resumen:*** `Namespaces` organizan el code, evitando conflictos de nombres y en el `Ejemplo`  User en App\Models y Product en App\Inventory, ambos con métodos diferentes pero sin conflictos gracias a sus namespaces.

### 4.4  Make your first service container

Un contenedor de servicios (o `service container`) es un patrón de diseño utilizado para gestionar la creación y la resolución de dependencias en una aplicación. Su propósito principal es desacoplar el código y facilitar la inyección de dependencias.

**¿Por qué usar un contenedor?**
- **Desacoplamiento**: Permite que las clases no dependan directamente de las implementaciones específicas de sus dependencias.
- **Flexibilidad**: Facilita la modificación de dependencias sin cambiar el código que las usa.
- **Gestión centralizada**: Permite configurar y gestionar las dependencias en un solo lugar.

**Principales Funciones de un Contenedor**
1. **Registro de Dependencias**: Asociar identificadores (claves) con funciones que crean instancias de servicios o clases.
2. **Resolución de Dependencias**: Obtener instancias de servicios o clases a través de identificadores.

**Ejemplo Práctico**

A continuación, un ejemplo simple que ilustra cómo usar un contenedor de servicios en PHP.

 ***1. Definir el Contenedor***

```php
<?php

class Container {
    private static $bindings = [];

    // Registrar un servicio en el contenedor
    public static function bind($key, $resolver) {
        self::$bindings[$key] = $resolver;
    }

    // Resolver un servicio desde el contenedor
    public static function resolve($key) {
        if (!isset(self::$bindings[$key])) {
            throw new Exception("No binding found for {$key}");
        }
        return self::$bindings[$key]();
    }
}
?>
```
***2. Definir un Servicio***

```php
<?php

class Logger {
    public function log($message) {
        echo "Logging message: $message\n";
    }
}

?>
```
***3. Configurar el Contenedor***

```php
<?php

// Registrar el servicio en el contenedor
Container::bind('logger', function() {
    return new Logger();
});
?>
```
***4. Usar el Servicio***
```php
<?php

// Obtener una instancia del servicio desde el contenedor
$logger = Container::resolve('logger');

// Usar el servicio
$logger->log('This is a test message.'); // Salida: Logging message: This is a test message!
?>
```
**Explicación del ejemplo**

***Clase Container***

- **Método `bind`**: Registra un servicio en el contenedor. La función anónima (resolver) es responsable de crear una instancia del servicio.
- **Método `resolve`**: Obtiene una instancia del servicio registrado. Si el servicio no está registrado, lanza una excepción.

***Clase Logger***

- **Descripción**: Un servicio simple que tiene un método `log` para imprimir mensajes.

***Registro del Servicio***

- **Descripción**: En el contenedor, se asocia el identificador `'logger'` con una función que crea una nueva instancia de `Logger`.

***Uso del Servicio***

- **Descripción**: Se obtiene el servicio `'logger'` del contenedor y se usa para registrar un mensaje.









## Chapter 5 - Sessions and Authentication

### 5.1 PHP Sessions 101

**Sessions:** Una sesión en PHP es un mecanismo que permite almacenar datos específicos del usuario en el servidor y mantener la persistencia de esos datos entre diferentes peticiones HTTP. A diferencia de las cookies, donde los datos se almacenan en el lado del cliente, las sesiones permiten almacenar información sensible en el servidor, lo que mejora la seguridad y el control de los datos.

***Almacenamiento de infomacion en variables de sesion:*** Cuando una sesión está activa, podemos guardar información relevante del usuario, como su nombre o su rol, en variables dentro de la superglobal `$_SESSION`. Estas variables persisten mientras dure la sesión, permitiendo que el servidor recuerde datos entre diferentes visitas o interacciones del usuario.

  - ***Inicio de sesión***: El primer paso para usar sesiones es llamar a `session_start()`, lo que crea una sesión o recupera una existente.
  - ***Almacenamiento de datos:*** Una vez iniciada la sesión, los datos del usuario pueden almacenarse en variables dentro de la superglobal $_SESSION. Esta superglobal actúa como un array asociativo donde se guardan y persisten los datos mientras dure la sesión.
  - ***Acceso y modificacion:*** Estos datos almacenados en `$_SESSION`pueden leerse, actualizarse o eliminarse en cualquier momento durante la sesión.
  - ***Ubicacion de Archivos de sesion en el servidor:***  La información de la sesión se guarda en archivos individuales en el servidor. La ubicación predeterminada de estos archivos puede ser consultada con:
```bash
php --info | grep session.save_path
```
Si no tiene un valor específico, el camino es el directorio temporal predeterminado, que se puede leer con:

```bash
echo $TMPDIR
```

Normalmente, los archivos de sesión comienzan con `sess_` seguido de un identificador único.

**Ejemplo Básico**

1. ***Inicio de la Sesión y Almacenamiento de Datos (`set_session.php`)***
```php
<?php
session_start();  // Inicia la sesión o la recupera si ya existe

// Almacena datos en la sesión
$_SESSION['username'] = 'johndoe';
$_SESSION['user_id'] = 123;
$_SESSION['user_data'] = array(
    'first_name' => 'John',
    'last_name' => 'Doe',
    'email' => 'johndoe@example.com'
);

// Mensaje de confirmación
echo 'Datos de sesión guardados. <a href="get_session.php">Ver sesión</a> | <a href="end_session.php">Eliminar sesión</a>';
?>
```
2. ***Acceso a los datos de la sesión (`get_session.php`)***
```php
<?php
session_start();  // Inicia la sesión o la recupera si ya existe

// Verifica si hay datos en la sesión
if (isset($_SESSION['username'])) {
    echo 'Nombre de usuario: ' . $_SESSION['username'] . '<br>';
    echo 'ID de usuario: ' . $_SESSION['user_id'] . '<br>';
    echo 'Correo electrónico: ' . $_SESSION['user_data']['email'] . '<br>';
} else {
    echo 'No hay datos en la sesión.';
}
?>
```
3.***Eliminación de Datos de la Sesión (`end_session.php`)***
```php
<?php
session_start();  // Inicia la sesión o la recupera si ya existe

// Elimina todas las variables de sesión
session_unset();

// Destruye la sesión
session_destroy();

// Mensaje de confirmación
echo 'Sesión eliminada. <a href="set_session.php">Iniciar sesión nuevamente</a>';
?>
```

### 5.2 Introduction to Middleware 
**Middleware:** es una capa de software que se ejecuta entre la solicitud de un cliente y la respuesta de un servidor. El middleware actúa como un "intermediario" que procesa la solicitud HTTP y decide si debe continuar hacia el controlador o responder directamente (por ejemplo, redirigiendo al usuario a otra página).

***Funcionamiento:*** Cuando un cliente realiza una solicitud a una aplicación web, la solicitud pasa por una serie de middleware, cada uno ejecutando su propia lógica. Esta lógica puede ser:

- Interrumpir la solicitud (ejemplo: redirigir a una página de inicio de sesión si el usuario no está autenticado).
- Modificar la solicitud (ejemplo: adjuntar datos adicionales como información del usuario).
- Dejar que la solicitud continúe hacia el controlador sin cambios.

**Ejemplo de middleware en PHP:** [middleware](./PHP_beginners_course/Examples/middleware.md)
