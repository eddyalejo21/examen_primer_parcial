<?php

require_once('../config/Conexion.php');

class Consulta
{

    public function todos()
    {
        $con = new ClaseConectar();
        $con = $con->Conectar();
        $cadena = "
            SELECT 
                c.id_consulta, 
                c.fecha, 
                CONCAT(p.nombres, ' ', p.apellidos) as nombre_paciente,
                CONCAT(m.nombres, ' ', m.apellidos) as nombre_medico
            FROM 
                consultas c
            JOIN 
                pacientes p ON c.pacientes_id_paciente = p.id_paciente
            JOIN 
                medicos m ON c.medicos_id_medico = m.id_medico
        ";

        $result = mysqli_query($con, $cadena);

        if (!$result) {
            return ["error" => mysqli_error($con)];
        }

        $datos = mysqli_fetch_all($result, MYSQLI_ASSOC);
        return $datos;
    }

    public function uno($id_consulta)
    {
        $con = new ClaseConectar();
        $con = $con->Conectar();
        $cadena = "
            SELECT 
                c.id_consulta, 
                c.fecha, 
                CONCAT(p.nombres, ' ', p.apellidos) as nombre_paciente,
                CONCAT(m.nombres, ' ', m.apellidos) as nombre_medico
            FROM 
                consultas c
            JOIN 
                pacientes p ON c.pacientes_id_paciente = p.id_paciente
            JOIN 
                medicos m ON c.medicos_id_medico = m.id_medico
             WHERE `id_consulta` = $id_consulta
        ";

        $result = mysqli_query($con, $cadena);

        if (!$result) {
            return ["error" => mysqli_error($con)];
        }

        $datos = mysqli_fetch_all($result, MYSQLI_ASSOC);
        return $datos;
    }

    public function insertar($data)
    {
        $con = new ClaseConectar();
        $con = $con->Conectar();
        $columns = implode(", ", array_keys($data));
        $values = implode("', '", array_values($data));
        $cadena = "INSERT INTO `consultas` ($columns) VALUES ('$values')";
        if (mysqli_query($con, $cadena)) {
            return mysqli_insert_id($con);
        } else {
            return mysqli_error($con);
        }
    }

    public function actualizar($id_consulta, $data)
    {
        $con = new ClaseConectar();
        $con = $con->Conectar();
        $set = "";
        foreach ($data as $column => $value) {
            $set .= "`$column` = '$value', ";
        }
        $set = rtrim($set, ", ");
        $cadena = "UPDATE `consultas` SET $set WHERE `id_consulta` = $id_consulta";

        if (mysqli_query($con, $cadena)) {
            return true;
        } else {
            return mysqli_error($con);
        }
    }

    public function eliminar($id_medico) //delete from provedores where id = $id
    {
        try {
            $con = new ClaseConectar();
            $con = $con->Conectar();
            $cadena = "DELETE FROM `medicos` WHERE `id_medico`= $id_medico";
            if (mysqli_query($con, $cadena)) {
                return 1;
            } else {
                return $con->error;
            }
        } catch (Exception $th) {
            return $th->getMessage();
        } finally {
            $con->close();
        }
    }
}
