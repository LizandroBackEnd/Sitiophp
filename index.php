<?php
session_start();
if(isset($_SESSION["x"])) {
 header("location: info.php");
 return; // Importante detener la ejecución
}
?><!DOCTYPE html>
<html lang="es">
<head>
 <meta charset="UTF-8">
 <meta name="viewport" content="width=device-width">
 <title>Iniciar Sesión</title>
 <link rel="stylesheet" href="./css/index.css">
</head>
<body>
 <?php require "header.php" ?>

 <main class="login-wrap">
    <div class="login-card">
        <h1>Inicio de Sesión</h1>
        <p class="lead">Accede a tu cuenta para continuar</p>

        <form action="procesarInicio.php" method="post">
            <input type="text" name="cue" placeholder="Correo electrónico" required>
            <input type="password" name="matc" placeholder="Contraseña" required>
            <button type="submit">Iniciar sesión</button>
        </form>

        <p class="register-link">¿No tienes una cuenta? <a href="registro.php">Regístrate</a></p>
    </div>
 </main>

 <?php require "footer.php" ?>
</body>
</html>