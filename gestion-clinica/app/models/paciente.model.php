<?php

require_once('../config/Conexion.php');

class Paciente{

    public function todos(){
        $con = new ClaseConectar();
        $con = $con->Conectar();
        $cadena = "SELECT * FROM `pacientes`";
        $datos = mysqli_query($con, $cadena);
        $con->close();
        return $datos;
    }

    public function uno($id_paciente){
        $con = new ClaseConectar();
        $con = $con->Conectar();
        $cadena = "SELECT * FROM `pacientes` WHERE `id_paciente`=$id_paciente";
        $datos = mysqli_query($con, $cadena);
        $con->close();
        return $datos;
    }

    public function insertar($nombres, $apellidos, $cedula, $direccion, $telefono, $fecha_nacimiento, $sexo)
    {
        try {
            $con = new ClaseConectar();
            $con = $con->Conectar();
            $cadena = "INSERT INTO `pacientes` (`nombres`, `apellidos`, `cedula`, `direccion`, `telefono`, `fecha_nacimiento`, `sexo`) VALUES ('$nombres', '$apellidos', '$cedula', '$direccion', '$telefono', '$fecha_nacimiento', '$sexo')";
            if (mysqli_query($con, $cadena)) {
                return $con->insert_id;
            } else {
                return $con->error;
            }
        } catch (Exception $th) {
            return $th->getMessage();
        } finally {
            $con->close();
        }
    }

    public function actualizar($id_paciente, $nombres, $apellidos, $cedula, $direccion, $telefono, $fecha_nacimiento, $sexo)
    {
        try {
            $con = new ClaseConectar();
            $con = $con->Conectar();
            $cadena = "UPDATE `pacientes` SET `nombres`='$nombres', `apellidos`='$apellidos', `cedula`='$cedula',`direccion`='$direccion',`telefono`='$telefono',`fecha_nacimiento`='$fecha_nacimiento',`sexo`='$sexo' WHERE `id_paciente` = $id_paciente";
            if (mysqli_query($con, $cadena)) {
                return $id_paciente;
            } else {
                return $con->error;
            }
        } catch (Exception $th) {
            return $th->getMessage();
        } finally {
            $con->close();
        }
    }

    public function eliminar($id_paciente)
    {
        try {
            $con = new ClaseConectar();
            $con = $con->Conectar();
            $cadena = "DELETE FROM `pacientes` WHERE `id_paciente`= $id_paciente";
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