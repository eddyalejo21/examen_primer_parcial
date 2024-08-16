<?php

require_once('../config/Conexion.php');

class Medico
{

    public function todos()
    {
        $con = new ClaseConectar();
        $con = $con->Conectar();
        $cadena = "
            SELECT 
                m.id_medico, 
                m.nombres, 
                m.apellidos, 
                m.cedula,
                m.email,
                e.nombre_especialidad
            FROM 
                medicos m
            JOIN 
                especialidades e ON m.especialidades_id_especialidad = e.id_especialidad
        ";

        $result = mysqli_query($con, $cadena);

        if (!$result) {
            return ["error" => mysqli_error($con)];
        }

        $datos = mysqli_fetch_all($result, MYSQLI_ASSOC);
        return $datos;
    }

    public function uno($id_medico)
    {
        $con = new ClaseConectar();
        $con = $con->Conectar();
        $cadena = "
            SELECT 
                m.id_medico, 
                m.nombres, 
                m.apellidos, 
                m.cedula,
                m.email,
                e.nombre_especialidad
            FROM 
                medicos m
            JOIN 
                especialidades e ON m.especialidades_id_especialidad = e.id_especialidad
            WHERE `id_medico` = $id_medico
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
        $cadena = "INSERT INTO `medicos` ($columns) VALUES ('$values')";
        if (mysqli_query($con, $cadena)) {
            return mysqli_insert_id($con);
        } else {
            return mysqli_error($con);
        }
    }

    public function actualizar($id_medico, $data)
    {
        $con = new ClaseConectar();
        $con = $con->Conectar();
        $set = "";
        foreach ($data as $column => $value) {
            $set .= "`$column` = '$value', ";
        }
        $set = rtrim($set, ", ");
        $query = "UPDATE `medicos` SET $set WHERE `id_medico` = $id_medico";

        if (mysqli_query($con, $query)) {
            return true;
        } else {
            return mysqli_error($con);
        }
    }

    public function eliminar($id_medico)
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
