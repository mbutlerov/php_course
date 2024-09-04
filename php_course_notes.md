
# Php for begginers course 
Link: https://laracasts.com/series/php-for-beginners-2023-edition






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
    - Para cargar el view se utiliza ***require***.
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