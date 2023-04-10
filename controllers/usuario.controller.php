<?php
session_start();
require_once '../models/Usuario.php';

if (isset($_POST['operacion'])){

  $usuario = new Usuario();

  //Identificando la operación...
  if ($_POST['operacion'] == 'login'){

    $registro = $usuario->iniciarSesion($_POST['nombreusuario']);
    $_SESSION["login"] = false;

    //Objeto para contener el resultado
    $resultado = [
      "status"    => false,
      "mensaje"   => ""
    ];
    
    if ($registro){
      //El usuario si existe
      $claveEncriptada = $registro["claveacceso"];
      
      //Validar la contraseña
      if (password_verify($_POST['claveIngresada'], $claveEncriptada)){
        $resultado["status"] = true;
        $resultado["mensaje"] = "Bienvenido al sistema";
        $_SESSION["login"] = true;
      }else{
        $resultado["mensaje"] = "Error en la contraseña";
      }

    }else{
      //El usuario No existe
      $resultado["mensaje"] = "No encontramos al usuario";
    }

    //Enviamos el objeto resultado a la vista
    echo json_encode($resultado);
  }

}

//Interceptar valores que llegan por la URL
if (isset($_GET['operacion'])){

  if ($_GET['operacion'] == 'finalizar'){
    session_destroy();
    session_unset();
    header('Location:../index.php');
  }

}