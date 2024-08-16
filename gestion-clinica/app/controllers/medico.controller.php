<?php

require_once('../models/medico.model.php');
//error_reporting(0)

$medico = new Medico();

switch ($_GET["op"]) {

    case 'todos':
        $datos = array();
        $datos = $medico->todos();

        echo json_encode($datos);
        break;

    case 'uno':
        $id_medico = $_POST["id_medico"];
        // $datos = array();
        $datos = $medico->uno($id_medico);
        // $res = mysqli_fetch_assoc($datos);
        echo json_encode($datos);
        break;

    case 'insertar':
        $data = [
            'nombres' => $_POST["nombres"],
            'apellidos' => $_POST["apellidos"],
            'cedula' => $_POST["cedula"],
            'telefono' => $_POST["cedula"],
            'email' => $_POST["email"],
            'especialidades_id_especialidad' => (int)$_POST["especialidades_id_especialidad"],
        ];

        $datos = $medico->insertar($data);
        echo json_encode($datos);
        break;

    case 'actualizar':

        $id_medico = $_POST["id_medico"];
        $data = [
            'id_medico' => (int)$_POST["id_medico"],
            'nombres' => $_POST["nombres"],
            'apellidos' => $_POST["apellidos"],
            'cedula' => $_POST["cedula"],
            'telefono' => $_POST["cedula"],
            'email' => $_POST["email"],
            'especialidades_id_especialidad' => (int)$_POST["especialidades_id_especialidad"],
        ];

        $datos = $medico->actualizar($id_medico, $data);
        echo json_encode($datos);
        break;

    case 'eliminar':
        $id_medico = $_POST["id_medico"];
        $datos = array();
        $datos = $medico->eliminar($id_medico);
        echo json_encode($datos);
        break;
}
