<?php

require_once('../models/consulta.model.php');
//error_reporting(0)

$consulta = new Consulta();

switch ($_GET["op"]) {

    case 'todos':
        $datos = array();
        $datos = $consulta->todos();

        echo json_encode($datos);
        break;

    case 'uno':
        $id_consulta = $_POST["id_consulta"];
        $datos = $consulta->uno($id_consulta);
        
        echo json_encode($datos);
        break;

    case 'insertar':
        $data = [
            'fecha' => $_POST["fecha"],
            'pacientes_id_paciente' => (int)$_POST["pacientes_id_paciente"],
            'medicos_id_medico' => (int)$_POST["medicos_id_medico"]
        ];

        $datos = $consulta->insertar($data);
        echo json_encode($datos);
        break;

    case 'actualizar':

        $id_consulta = $_POST["id_consulta"];
        $data = [
            'id_consulta' => (int)$_POST["id_consulta"],
            'fecha' => $_POST["fecha"],
            'pacientes_id_paciente' => (int)$_POST["pacientes_id_paciente"],
            'medicos_id_medico' => (int)$_POST["medicos_id_medico"]
        ];

        $datos = $consulta->actualizar($id_consulta, $data);
        echo json_encode($datos);
        break;

    case 'eliminar':
        $id_consulta = $_POST["id_consulta"];
        $datos = array();
        $datos = $consulta->eliminar($id_consulta);
        echo json_encode($datos);
        break;
}
