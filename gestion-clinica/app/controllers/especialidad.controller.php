<?php

require_once('../models/especialidad.model.php');
//error_reporting(0)

$especialidad = new Especialidad();

switch ($_GET["op"]) {

    case 'todos':
        $datos = array();
        $datos = $especialidad->todos();
        while ($row = mysqli_fetch_assoc($datos))
        {
            $todos[] = $row;
        }
        echo json_encode($todos);
        break;

    case 'uno':
        $id_especialidad = $_POST["id_especialidad"];
        $datos = array();
        $datos = $especialidad->uno($id_especialidad);
        $res = mysqli_fetch_assoc($datos);
        echo json_encode($res);
        break;

    case 'insertar':
        $nombre_especialidad = $_POST["nombre_especialidad"];

        $datos = array();
        $datos = $especialidad->insertar($nombre_especialidad);
        echo json_encode($datos);
        break;

    case 'actualizar':
        $id_especialidad = $_POST["id_especialidad"];
        $nombre_especialidad = $_POST["nombre_especialidad"];
        $datos = array();
        $datos = $especialidad->actualizar($id_especialidad, $nombre_especialidad);
        echo json_encode($datos);
        break;

    case 'eliminar':
        $id_especialidad = $_POST["id_especialidad"];
        $datos = array();
        $datos = $especialidad->eliminar($id_especialidad);
        echo json_encode($datos);
        break;
}
