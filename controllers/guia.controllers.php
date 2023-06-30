<?php
/*TODO: Requerimientos */
require_once("../config/config.php");
require_once("../models/guia.model.php");
error_reporting(0);

$ID_guia = new ID_guia;
switch ($_GET["op"]) {
        /*TODO: Procedimiento para listar todos los registros */
    case 'todos':
        $datos = array();
        $datos = $ID_guia->todos();
        while ($row = mysqli_fetch_assoc($datos)) {
            $todos[] = $row;
        }
        echo json_encode($todos);
        break;
        /*TODO: Procedimiento para sacar un registro */
    case 'uno':
        $ID_guia = $_POST["ID_guia"];
        $datos = array();
        $datos = $ID_guia->uno($ID_guia);
        $res = mysqli_fetch_assoc($datos);
        echo json_encode($res);
        break;
        /*TODO: Procedimiento para insertar */
    case 'insertar':
        $ID_guia = $_POST["ID_guia"];
        $Nombre = $_POST["Nombre"];
        $datos = array();
        $datos = $ID_guia->Insertar($ID_guia, $Nombre);
        echo json_encode($datos);
        break;
        /*TODO: Procedimiento para actualizar */
    case 'actualizar':
        $ID_guia = $_POST["ID_guia"];
        $Nombre = $_POST["Nombre"];
        $datos = array();
        $datos = $ID_guia->Actualizar($ID_guia, $Nombre);
        echo json_encode($datos);
        break;
        /*TODO: Procedimiento para eliminar */
    case 'eliminar':
        $ID_guia = $_POST["ID_guia"];
        $datos = array();
        $datos = $ID_guia->Eliminar($ID_guia);
        echo json_encode($datos);
        break;
}
