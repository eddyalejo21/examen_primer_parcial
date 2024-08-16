<?php

require_once('../models/paciente.model.php');
//error_reporting(0)

$paciente = new Paciente();

switch ($_GET["op"]) {

    case 'todos': 
        $datos = array();
        $datos = $paciente->todos();
        while ($row = mysqli_fetch_assoc($datos))
        {
            $todos[] = $row;
        }
        echo json_encode($todos);
        break;

    case 'uno':
        $id_paciente = $_POST["id_paciente"];
        $datos = array();
        $datos = $paciente->uno($id_paciente);
        $res = mysqli_fetch_assoc($datos);
        echo json_encode($res);
        break;

    case 'insertar':
        $nombres = $_POST["nombres"];
        $apellidos = $_POST["apellidos"];
        $cedula = $_POST["cedula"];
        $direccion = $_POST["direccion"];
        $telefono = $_POST["telefono"];
        $fecha_nacimiento = $_POST["fecha_nacimiento"];
        $sexo = $_POST["sexo"];

        $datos = array();
        $datos = $paciente->insertar($nombres, $apellidos, $cedula, $direccion, $telefono, $fecha_nacimiento, $sexo);
        echo json_encode($datos);
        break;

    case 'actualizar':
        $id_paciente = $_POST["id_paciente"];
        $nombres = $_POST["nombres"];
        $apellidos = $_POST["apellidos"];
        $cedula = $_POST["cedula"];
        $direccion = $_POST["direccion"];
        $telefono = $_POST["telefono"];
        $fecha_nacimiento = $_POST["fecha_nacimiento"];
        $sexo = $_POST["sexo"];
        $datos = array();
        $datos = $paciente->actualizar($id_paciente, $nombres, $apellidos, $cedula, $direccion, $telefono, $fecha_nacimiento, $sexo);
        echo json_encode($datos);
        break;

    case 'eliminar':
        $id_paciente = $_POST["id_paciente"];
        $datos = array();
        $datos = $paciente->eliminar($id_paciente);
        echo json_encode($datos);
        break;
}
