<?php

require_once('../models/examen.model.php');
//error_reporting(0)

$examen = new Examen();

switch ($_GET["op"]) {

    case 'todos':
        $datos = array();
        $datos = $examen->todos();
        while ($row = mysqli_fetch_assoc($datos))
        {
            $todos[] = $row;
        }
        echo json_encode($todos);
        break;

    case 'uno':
        $id_examen = $_POST["id_examen"];
        $datos = array();
        $datos = $examen->uno($id_examen);
        $res = mysqli_fetch_assoc($datos);
        echo json_encode($res);
        break;

    case 'insertar':
        $nombre = $_POST["nombre"];
        $descripcion = $_POST["descripcion"];

        $datos = array();
        $datos = $examen->insertar($nombre, $descripcion);
        echo json_encode($datos);
        break;

    case 'actualizar':
        $id_examen = $_POST["id_examen"];
        $nombre = $_POST["nombre"];
        $descripcion = $_POST["descripcion"];
        
        $datos = array();
        $datos = $examen->actualizar($id_examen, $nombre, $descripcion);
        echo json_encode($datos);
        break;

    case 'eliminar':
        $id_examen = $_POST["id_examen"];
        $datos = array();
        $datos = $examen->eliminar($id_examen);
        echo json_encode($datos);
        break;
}
