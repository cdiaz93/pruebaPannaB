<?php

    Class Database {

        //Atributos para la conexión con la DB
        private $host       = "localhost";
        private $db_name    = "sistemaagendamiento";
        private $username   = "root";
        private $password   = "";
        public $conn;
        

        // Funcion para estableces la conexion con la DB 
        public function getConnection() {

            $this->conn = null;
            
            try {
                $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, $this->username, $this->password);
                $this->conn->exec("set names utf8");
            } catch(PDOException $exception) {
                echo "Error de conexión: " . $exception->getMessage();
            }
            
            return $this->conn;
        }




    }
?>