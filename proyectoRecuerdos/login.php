<?php
   session_start();
   require_once 'config.php';

   //comprobar si se ha iniciado sesión
   if($_SERVER['REQUEST_METHOD']==='POST'){
      //guardar los datos del formulario en variables
      $user = $_POST['name'];
      $password = $_POST['password'];
      
      //ejecutar la consulta
      $result = $mysqli->query("SELECT * FROM users WHERE name = '$user'");
     
      //comprobar si hay resultados
      if($result && $result->num_rows > 0){
         $user = $result->fetch_assoc();

         //comprobar la contraseña es correcta
         if(password_verify($password, $user['password'])){
            //iniciar sesión
            $_SESSION['name'] = $user['name'];
            $_SESSION['email'] = $user['email'];
            
            header('Location: index.php');
            exit;
         } else {
            //mostrar error de contraseña incorrecta
            echo '<script>alert("Contraseña incorrecta.");</script>';
         }
      }else {
         //mostrar error de usuario no encontrado
         echo '<script>alert("Usuario no encontrado.");</script>';
      }

   }
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión - Aplicación de Recuerdos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body {
            min-height: 100vh;
            background: linear-gradient(to bottom, #f0f5ff, #f5f0ff);
            display: flex;
            flex-direction: column;
        }
        .login-container {
            flex: 1;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 2rem 1rem;
        }
        .login-card {
            max-width: 450px;
            width: 100%;
        }
        .brand-logo {
            width: 80px;
            height: 80px;
            background-color: #4f46e5;
            color: white;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 2rem;
            margin: 0 auto 1.5rem;
        }
        .divider {
            display: flex;
            align-items: center;
            text-align: center;
            margin: 1.5rem 0;
        }
        .divider::before, .divider::after {
            content: '';
            flex: 1;
            border-bottom: 1px solid #dee2e6;
        }
        .divider span {
            padding: 0 1rem;
            color: #6c757d;
        }
    </style>
</head>
<body>
    <!-- Header -->
    <header class="bg-white shadow-sm">
        <div class="container py-4">
            <div class="d-flex align-items-center">
                <h1 class="h4 mb-0 mx-auto">Iniciar Sesión</h1>
            </div>
        </div>
    </header>

    <!-- Login Form -->
    <div class="login-container">
        <div class="login-card">
            <div class="card shadow">
                <div class="card-body p-4 p-md-5">
                    <div class="text-center mb-4">
                        <div class="brand-logo">
                            <i class="fas fa-user"></i>
                        </div>
                        <h2 class="h4 mb-2">Hola</h2>
                        <p class="text-muted">Inicia sesión para acceder a los recuerdos</p>
                    </div>

                    <form id="loginForm" method="post" action="">
                        <div class="mb-3">
                            <label for="name" class="form-label">Nombre de usuario</label>
                            <div class="input-group">
                                <span class="input-group-text">
                                    <i class="fas fa-user"></i>
                                </span>
                                <input type="text" class="form-control" id="name" name="name" required>
                            </div>
                        </div>

                        <div class="mb-3">
                            <div class="d-flex justify-content-between align-items-center">
                                <label for="password" class="form-label">Contraseña</label>
                                <a href="#" class="text-primary small text-decoration-none">¿Olvidaste tu contraseña?</a>
                            </div>
                            <div class="input-group">
                                <span class="input-group-text">
                                    <i class="fas fa-lock"></i>
                                </span>
                                <input type="password" class="form-control" id="password" name="password" placeholder="Tu contraseña" required>
                                <button class="btn btn-outline-secondary" type="button" id="togglePassword">
                                    <i class="fas fa-eye"></i>
                                </button>
                            </div>
                        </div>

                        <button type="submit" id="submitBtn" class="btn btn-primary w-100 py-2 mb-3">
                            Iniciar Sesión
                        </button>

                        <div class="text-center">
                            <p class="mb-0">¿No tienes una cuenta? <a href="register.php" class="text-primary text-decoration-none">Regístrate</a></p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    
    <script>
        // Toggle password visibility
        document.getElementById('togglePassword').addEventListener('click', function() {
            const passwordInput = document.getElementById('password');
            const icon = this.querySelector('i');
            
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                icon.classList.remove('fa-eye');
                icon.classList.add('fa-eye-slash');
            } else {
                passwordInput.type = 'password';
                icon.classList.remove('fa-eye-slash');
                icon.classList.add('fa-eye');
            }
        });
    </script>
</body>
</html>