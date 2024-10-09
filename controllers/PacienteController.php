<?php

    //Modelos
    require_once './../models/Paciente.php';

    class PacienteController {
        private $paciente;

        public function __construct($dbConnection) {
            $this->paciente = new Paciente($dbConnection);
        }

        // Crear un nuevo paciente
        public function crear() {

        }

        // Mostrar todos los pacientes
        public function index() {
            $pacientes = $this->paciente->obtenerPacientes();
            require 'view/pacientes/index.php'; 
        }


        // Editar un paciente
        public function editar($id) {

        }

        // Eliminar un paciente
        public function eliminar($id) {
            $this->paciente->eliminarPaciente($id);
            header('Location: index.php?controller=paciente&action=index');
        }
    }
?>