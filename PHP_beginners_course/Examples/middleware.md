
# Middleware Example

Imaginemos que queremos crear un middleware en PHP para asegurarnos de que solo los usuarios autenticados puedan acceder a ciertas rutas, mientras que otras deben estar disponibles solo para invitados (usuarios no autenticados).

### 1. Middleware para Autenticación
Queremos crear un middleware que redirija a los usuarios no autenticados a la página de inicio de sesión.

```php
class AuthMiddleware {
    public function handle($request, $next) {
        // Verificar si el usuario está autenticado
        if (!isset($_SESSION['user_id'])) {
            // Redirigir a la página de inicio de sesión si no está autenticado
            header('Location: /login');
            exit();
        }
        // Continuar hacia el siguiente middleware o controlador
        return $next($request);
    }
}
```

### 2. Middleware para Usuarios invitados
Ahora, necesitamos un middleware que redirija a los usuarios ya autenticados si intentan acceder a rutas como la de registro o inicio de sesión.

```php
<?php
class GuestMiddleware {
    public function handle($request, $next) {
        // Si el usuario está autenticado, redirigirlo a la página principal
        if (isset($_SESSION['user_id'])) {
            header('Location: /home');
            exit();
        }
        // Continuar hacia el siguiente middleware o controlador
        return $next($request);
    }
}
```

### 3. Implementando Middleware en Rutas
Podemos aplicar el middleware a las rutas de nuestra aplicación para controlar quién tiene acceso a ellas. Esto se puede hacer en un archivo de rutas o configuración de la aplicación.
```php
<?php
// Simulación de rutas con middleware
function route($uri, $controller, $middlewares = []) {
    // Obtenemos la solicitud actual (URI)
    $currentUri = $_SERVER['REQUEST_URI'];

    // Comprobamos si la ruta coincide con la solicitud
    if ($currentUri == $uri) {
        $request = $_REQUEST;

        // Ejecutar todos los middlewares
        foreach ($middlewares as $middleware) {
            $middlewareInstance = new $middleware;
            $middlewareInstance->handle($request, function($request) {});
        }

        // Llamar al controlador si todos los middlewares pasan
        $controller();
    }
}

// Definimos nuestras rutas
route('/dashboard', function() {
    echo "Bienvenido al panel de usuario";
}, [AuthMiddleware::class]); // Solo usuarios autenticados

route('/login', function() {
    echo "Página de inicio de sesión";
}, [GuestMiddleware::class]); // Solo usuarios invitados

route('/register', function() {
    echo "Página de registro";
}, [GuestMiddleware::class]); // Solo usuarios invitados
```

Si un middleware interrumpe la solicitud (por ejemplo, `AuthMiddleware` detecta que no estás autenticado), la cadena se detiene y no se ejecuta el controlador final.

# Ejemplo real en Laravel
En el framework Laravel, el middleware se implementa de manera similar, pero con más abstracción. Aquí hay un ejemplo básico de cómo definir un middleware y aplicarlo.

### 1. Definicion de Middleware en Laravel
```php
<?php
// app/Http/Middleware/EnsureUserIsAuthenticated.php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class EnsureUserIsAuthenticated
{
    public function handle($request, Closure $next)
    {
        if (!Auth::check()) {
            return redirect('/login');
        }

        return $next($request);
    }
}
```

### 2. Aplicación de Middleware en las Rutas
```php
<?php
// routes/web.php

// Aplica el middleware a una ruta específica
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware('auth');

// Aplica middleware a un grupo de rutas
Route::middleware(['auth'])->group(function () {
    Route::get('/profile', function () {
        // Solo usuarios autenticados pueden ver esto
    });

    Route::get('/settings', function () {
        // Solo usuarios autenticados pueden ver esto
    });
});
```

## Tipos comunes de middleware
- **`Autenticación`**: Asegura que solo los usuarios autenticados puedan acceder a ciertas rutas.
- **`Autorización`**: Verifica si el usuario tiene permisos para realizar cierta acción o ver cierta página.
- **`Logging`**: Registra información sobre la solicitud o el usuario que accede.
- **`CORS`**: Maneja las políticas de origen cruzado entre servidores.
- **`Rate Limiting`**: Limita la cantidad de solicitudes que un usuario puede hacer en un periodo de tiempo.