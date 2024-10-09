<?php
    class Paciente {

        private $db;
        private $table_name = "pacientes";

        public function __construct($db) {
            $this->conn = $db;
        }


        // Consultar los datos de un paciente por su ID
        public function findById($id) {
            $query = "SELECT * FROM " .$this->table_name. " WHERE id=:id";
            $stmt = $this->conn->prepare($query);

            // Vincula el parámetro
            $stmt->bindParam(':id', $id, PDO::PARAM_INT); // Especifica que el parámetro es un entero
            $stmt->execute();
        
            return $stmt->fetch(PDO::FETCH_ASSOC);
        }
        // Crear un nuevo paciente
        public function store() {
        
        }

    }
?>