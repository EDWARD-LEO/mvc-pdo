<?php

//Tabla
$claveUsuario = "SENATI";

$claveMD5 = md5($claveUsuario);
$claveSHA = sha1($claveUsuario);
$claveHASH = password_hash($claveUsuario, PASSWORD_BCRYPT);

//Clave acceso (LOGIN)
$claveAcceso = "SENATI";

//var_dump($claveHASH);

//Validar clave HASH
if (password_verify($claveAcceso, $claveHASH)){
  echo "Acceso correcto";
}