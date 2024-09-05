
# Php for beginners course 
Link: https://laracasts.com/series/php-for-beginners-2023-edition

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

**1.1 PHP tag:** el codigo se escribe entre las etiquetas 
"<?php" "?>"

**1.2 Variables:**
Las variables en PHP se definen con el símbolo $ y pueden almacenar diferentes tipos de datos, como cadenas, enteros y arrays.
```
<?php
$nombre = "Juan";
$edad = 30;
echo "Nombre: $nombre, Edad: $edad";
?>
```
***obs:***
Al usar Comillas dobles (" "), PHP evalua las variables dentro de la cadena y al usar comillas simples (' '),PHP no evalua las variables y las trata como texto literal
```
$nombre = "Ana";
echo "Hola, $nombre"; // Imprime "Hola, Ana"

$nombre = "Ana";
echo 'Hola, $nombre'; // Imprime "Hola, $nombre"
```

**1.3 Conditionals and Booleans**
```
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
```
//Creacion de array
$libros = [
    "Do Androids Dream of Electric Sheep",
    "The Langoliers",
     "Project Hail Mary"];

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
```
<?php
$persona = array("nombre" => "Ana", "edad" => 25);
echo $persona["nombre"]; // Imprime "Ana"
?>

```

**1.6 Functions and filters:** Similar a los diccionarios de Python.

Ejemplo de Función
```
<?php
function saludo($nombre) {
    return "Hola, $nombre!";
}
echo saludo("Carlos"); // Imprime "Hola, Carlos!"
?>

```

Ejemplo de filtro utilizando comparacion estricta "==="
```
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
    ```
    <?php
    $nombreVariable = function() {
        // Código a ejecutar
    };
    ?>

    ```
    Ejemplo Básico:
    ```
    $miFuncion = function() {
    echo '¡Hola Mundo!';
    };
    $miFuncion(); // Llama a la función anónima
    ```
- 1.7.2 Uso como parámetros en otras funciones:

    **Concepto:**
    Las funciones anónimas pueden ser pasadas como argumentos a otras funciones.
    Esto es útil para definir comportamientos específicos al momento de la  llamada. 
    
    **Ejemplo de Uso de parámetro**
    ```
    function ejecutar($funcion) {
    $funcion();
    }

    ejecutar(function() {
        echo '¡Hola Mundo!';
    });

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
```
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
```
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

        
        <?php
        require 'functions.php';
        require 'router.php';

        // Obtener la ruta actual
        $requestUri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

        // Enrutar la solicitud
        route($requestUri);

2. `router.php`
    ```
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




