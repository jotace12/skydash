<?php
// Archivos requeridos
require_once('../config/config.php');
require_once('usuariosroles.model.php');

class UsuariosModel
{
  public function login($usuario, $clave)
  {
    $con = new ClaseConexion();
    $con = $con->ProcedimientoConectar();
    $cadena = "SELECT usuario.*, roles.* FROM usuario INNER JOIN Usuarios_Roles on usuario.idUsuario = Usuarios_Roles.idUsuario INNER JOIN roles on Usuarios_Roles.idRoles = roles.idRoles WHERE usuario = '$usuario' and clave='$clave'";
    $datos = mysqli_query($con, $cadena);
    return $datos;
  }

  public function todos()
  { // Procedimiento para obtener todos los registros de la BDD
    $con = new ClaseConexion();
    $con = $con->ProcedimientoConectar();
    $cadena = "SELECT * FROM usuario INNER JOIN Usuarios_Roles on usuario.idUsuario = Usuarios_Roles.idUsuario INNER JOIN roles on Usuarios_Roles.idRoles = roles.idRoles ORDER BY usuario";
    $datos = mysqli_query($con, $cadena);
    return $datos;
  }

  public function Insertar($Nombres, $usuario, $correo, $clave, $idRoles)
  {
    $con = new ClaseConexion();
    $con = $con->ProcedimientoConectar();
    $cadena = "INSERT INTO `usuario`(`Nombres`, `usuario`, `clave`, `correo`) VALUES ('$Nombres','$usuario','$clave','$correo')";
    $datos = mysqli_query($con, $cadena);
    if (mysqli_insert_id($con) > 0) {
      // Definir el modelo UsuariosRoles
      $UsuarioRoles = new UsuariosRolesModel();
      return $UsuarioRoles->Insertar(mysqli_insert_id($con), $idRoles);
    } else {
      return 'Error al insertar el rol del usuario';
    }
  }

  public function uno($idUsuario)
  {
    $con = new ClaseConexion;
    $con = $con->ProcedimientoConectar();
    $cadena = "SELECT usuario.*, roles.* FROM `usuario` INNER JOIN Usuarios_Roles on usuario.idUsaurio = Usuarios_Roles.idUsuario INNER JOIN roles on Usuarios_Roles.idRoles = roles.idRoles where usuario.idUsaurio = $idUsuario";
    $datos = mysqli_query($con, $cadena);
    return $datos;
  }
}
?>