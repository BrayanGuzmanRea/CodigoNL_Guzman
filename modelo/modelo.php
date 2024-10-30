<?php
class Denuncias {
    private $denuncia;
    private $db;
    public function __construct() {
        $this->denuncia = array();
        $this->db = new PDO('mysql:host=localhost;dbname=guzmanlogro', "root", "");
    }

    private function setNames() {
        return $this->db->query("SET NAMES 'utf8'");
    }

    public function getdenuncia() {
        self::setNames();
        $sql = "SELECT * FROM denuncias";
        $statement = $this->db->query($sql);
        foreach ( $statement as $denuncia ){
            $this->denuncia[] = $denuncia;
        }
        $statement->closeCursor();
        return $this->denuncia;
    }
    public function setdenuncia($titulo, $descripcion, $ubicacion, $estado, $ciudadano, $telefono_ciudadano) {
        self::setNames();
        $sql = "INSERT INTO denuncias (`titulo`, `descripcion`, `ubicacion`, `estado`, `ciudadano`, `telefono_ciudadano`) 
        VALUES (?, ?, ?, ?, ?, ?);";
        $statement = $this->db->prepare($sql);
        $statement->bindParam(1, $titulo, PDO::PARAM_STR);
        $statement->bindParam(2, $descripcion, PDO::PARAM_STR);
        $statement->bindParam(3, $ubicacion, PDO::PARAM_STR);
        $statement->bindParam(4, $estado, PDO::PARAM_STR);
        $statement->bindParam(5, $ciudadano, PDO::PARAM_STR);
        $statement->bindParam(6, $telefono_ciudadano, PDO::PARAM_STR);
        $success = $statement->execute();
        if ($success) {
            return true;
        } else {
            return false;
        }
    }

    public function updatedenuncia($id_denuncia, $titulo, $descripcion, $ubicacion, $estado, $ciudadano, $telefono_ciudadano) {
        self::setNames();
        $sql = "UPDATE `denuncias` SET `titulo` = ?, `descripcion` = ?, `ubicacion` = ?, `estado` = ?, `ciudadano` = ?, `telefono_ciudadano` = ? WHERE `denuncias`.`id` = ?;";
    
        $statement = $this->db->prepare($sql);
        $statement->bindParam(1, $titulo, PDO::PARAM_STR);
        $statement->bindParam(2, $descripcion, PDO::PARAM_STR);
        $statement->bindParam(3, $ubicacion, PDO::PARAM_STR);
        $statement->bindParam(4, $estado, PDO::PARAM_STR);
        $statement->bindParam(5, $ciudadano, PDO::  PARAM_STR);
        $statement->bindParam(6, $telefono_ciudadano, PDO::PARAM_STR);  
        $statement->bindParam(7, $id_denuncia, PDO::PARAM_INT);
        $success = $statement->execute();
        if ($success) {
            return true;
        } else {
            return false;
        }
    }
    

    public function deletedenuncia($id_denuncia){
        self::setNames();
        $sql = "DELETE FROM denuncias WHERE id = $id_denuncia";
        $result = $this->db->query($sql);
        if ( $result ){
            return true;
        } else {
            return false;
        }
    }
}
?>