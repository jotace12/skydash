<?php
error_reporting(0);
// Requerimientos
require_once('../config/sesiones.php');
require_once('../models/usuarios.model.php');
$Usuario = new UsuariosModel; // Declaración de variable
switch ($_GET['op']) { // Clausula de decisión para obtener variable tipo GET
  case 'login': // Caso 1: Login
    $usuario = $_POST['usuario']; // Declaración de variable para obtener datos tipo POST
    $clave = $_POST['clave'];
    if (empty($usuario) || empty($clave)) { // Validación de variables
      header("Location: ../index.php?op=2"); // Redireccionamiento a página index
      exit(); // Fin de ejecución de código
    }
    $datos = array();
    $datos = $Usuario->login($usuario, $clave);
    $res = mysqli_fetch_assoc($datos);
    try {
      if (is_array($res) && count($res) > 0) {
        $_SESSION['idUsuario'] = $res['idUsuario'];
        $_SESSION['Nombres'] = $res['Nombres'];
        $_SESSION['usuario'] = $res['usuario'];
        $_SESSION['correo'] = $res['correo'];
        $_SESSION['idRoles'] = $res['idRoles'];
        $_SESSION['Detalle'] = $res['Detalle'];
        header('Location: ../views/Dashboard/home.php');
        exit();
      } else {
        header("Location: ../index.php?op=1");
        exit();
      }
    } catch (Throwable $th) {
      echo json_encode($th->getMessage());
    }
    break;
  case 'todos':
    $datos = array();
    $datos = $Usuario->todos();
    while ($fila = mysqli_fetch_assoc($datos)) {
      $todos[] = $fila;
    }
    echo json_encode($todos);
    break;
  case 'insertar':
    $Nombres = $_POST['Nombres'];
    $usuario = $_POST['usuario'];
    $correo = $_POST['correo'];
    $clave = $_POST['clave'];
    $idRoles = $_POST['idRoles'];
    $datos = array();
    $datos = $Usuario->Insertar($Nombres, $usuario, $correo, $clave, $idRoles);
    echo json_encode($datos);
    break;
  case 'actualizar':
    break;
}
?>