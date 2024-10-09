<?php
    class Paciente {

        private $db;
        private $table_name = "pacientes";

        public function __construct($db) {
            $this->conn = $db;
        }

        // Crear un nuevo paciente
        public function store() {
        
        }

    }
?>