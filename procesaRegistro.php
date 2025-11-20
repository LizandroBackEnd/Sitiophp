<?php
require_once "conexion.php";
require_once "recuperaTexto.php";

const CUE = "cue";
const MATC = "matc";

try {
 // 1. Recuperar datos
 $cue = recuperaTexto(CUE);
 $matc = recuperaTexto(MATC);

 // 2. Validar
 if ($cue === false || trim($cue) === "")
  throw new Exception("La cuenta es obligatoria.", 1);

 if ($matc === false || $matc === "")
  throw new Exception("La contraseña es obligatoria.", 1);

 // Reglas mínimas para contraseña
 if (strlen($matc) < 6)
  throw new Exception("La contraseña debe tener al menos 6 caracteres.", 1);

 // 3. Conectar
 $bd = Bd::pdo();

 // 4. Insertar (El try-catch detectará si el usuario ya existe por el UNIQUE)
 // Almacenar contraseña tal cual (sin hash) según solicitud
 $stmt = $bd->prepare(
   "INSERT INTO USUARIO (USU_CUE, USU_MATCH) 
    VALUES (:cue, :matc)"
 );

 $stmt->execute([
   ":cue" => trim($cue),
   ":matc" => $matc
 ]);

 // 5. Redirigir al login tras éxito
 // Opcional: Podrías iniciar sesión directamente, pero lo estándar es ir al login.
 header("Location: index.php");
 exit;

} catch (Exception $error) {
 // Detectar error de duplicado en SQLite (código 23000)
 if ($error->getCode() == "23000") {
    $errorHtml = "Ese nombre de usuario ya existe.";
 } else {
    $errorHtml = htmlentities($error->getMessage());
 }
 require "error.php";
}