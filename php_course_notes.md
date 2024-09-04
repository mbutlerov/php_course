
# Php for begginers course 






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


