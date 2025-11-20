<?php
session_start();
if(!isset($_SESSION["x"])) {
 header("location: index.php");
 return;
}
$usuario = htmlentities($_SESSION["x"]);
?><!DOCTYPE html>
<html lang="es">
<head>
 <meta charset="UTF-8">
 <meta name="viewport" content="width=device-width">
 <title>Información Privada</title>
 <link rel="stylesheet" href="./css/index.css">
</head>
<body>
 <?php require "header.php" ?>
  <main>
   <h1>Hola, <?= $usuario ?></h1>
   <p>Has iniciado sesión correctamente.</p>
   <p>Esta información es privada y viene de la base de datos SQLite.</p>
  </main>
 <?php require "footer.php" ?>
</body>
</html>