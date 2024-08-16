<?php

require_once('../config/Conexion.php');

class Examen{

    public function todos(){
        $con = new ClaseConectar();
        $con = $con->Conectar();
        $cadena = "SELECT * FROM `examenes`";
        $datos = mysqli_query($con, $cadena);
        $con->close();
        return $datos;
    }

    public function uno($id_examen){
        $con = new ClaseConectar();
        $con = $con->Conectar();
        $cadena = "SELECT * FROM `examenes` WHERE `id_examen`=$id_examen";
        $datos = mysqli_query($con, $cadena);
        $con->close();
        return $datos;
    }

    public function insertar($nombre, $descripcion)
    {
        try {
            $con = new ClaseConectar();
            $con = $con->Conectar();
            $cadena = "INSERT INTO `examenes` (`nombre`, `descripcion`) VALUES ('$nombre', '$descripcion')";
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

    public function actualizar($id_examen, $nombre, $descripcion)
    {
        try {
            $con = new ClaseConectar();
            $con = $con->Conectar();
            $cadena = "UPDATE `examenes` SET `nombre`='$nombre', `descripcion`='$descripcion' WHERE `id_examen` = $id_examen";
            if (mysqli_query($con, $cadena)) {
                return $id_examen;
            } else {
                return $con->error;
            }
        } catch (Exception $th) {
            return $th->getMessage();
        } finally {
            $con->close();
        }
    }

    public function eliminar($id_examen)
    {
        try {
            $con = new ClaseConectar();
            $con = $con->Conectar();
            $cadena = "DELETE FROM `examenes` WHERE `id_examen`= $id_examen";
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