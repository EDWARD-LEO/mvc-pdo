<?php

require_once '../models/Usuario.php';

if (isset($_POST['operacion'])){

  $usuario = new Usuario();

  //Identificando la operación...
  if ($_POST['operacion'] == 'login'){

    $registro = $usuario->iniciarSesion($_POST['nombreusuario']);
    echo json_encode($registro);

  }

}