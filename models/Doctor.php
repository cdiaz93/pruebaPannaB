<?php

class Doctor {
    private $conn;
    private $table_name = "medicos";

    public $id;
    public $nombre;
    public $especialidad;
    public $correo;
    public $telefono;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function findAll(){
        $query = "SELECT * FROM "  .$this->table_name;
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $rows;
    }
}

?>