<?php

require_once('../config/Conexion.php');

class Especialidad{

    public function todos(){
        $con = new ClaseConectar();
        $con = $con->Conectar();
        $cadena = "SELECT * FROM `especialidades`";
        $datos = mysqli_query($con, $cadena);
        $con->close();
        return $datos;
    }

    public function uno($id_especialidad){
        $con = new ClaseConectar();
        $con = $con->Conectar();
        $cadena = "SELECT * FROM `especialidades` WHERE `id_especialidad`=$id_especialidad";
        $datos = mysqli_query($con, $cadena);
        $con->close();
        return $datos;
    }

    public function insertar($nombre_especialidad)
    {
        try {
            $con = new ClaseConectar();
            $con = $con->Conectar();
            $cadena = "INSERT INTO `especialidades` (`nombre_especialidad`) VALUES ('$nombre_especialidad')";
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

    public function actualizar($id_especialidad, $nombre_especialidad)
    {
        try {
            $con = new ClaseConectar();
            $con = $con->Conectar();
            $cadena = "UPDATE `especialidades` SET `nombre_especialidad`='$nombre_especialidad' WHERE `id_especialidad` = $id_especialidad";
            if (mysqli_query($con, $cadena)) {
                return $id_especialidad;
            } else {
                return $con->error;
            }
        } catch (Exception $th) {
            return $th->getMessage();
        } finally {
            $con->close();
        }
    }

    public function eliminar($id_especialidad)
    {
        try {
            $con = new ClaseConectar();
            $con = $con->Conectar();
            $cadena = "DELETE FROM `especialidades` WHERE `id_especialidad`= $id_especialidad";
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