<?php


    //Configuracion de la Base de datos.
    require_once '../config/Database.php'; 

    //Modelos
    require_once './../models/Paciente.php';

    class PacienteController {
        private $paciente;

        public function __construct() {
            $db = (new Database())->getConnection();    //Inicializar conexion a la DB
            $this->paciente = new Paciente($db);        //Instancia del modelo Paciente
        }

       

        // Mostrar todos los pacientes
        public function index() {
            $pacientes = $this->paciente->obtenerPacientes();
            require 'view/pacientes/index.php'; 
        }

        //Consultar un paciente por su identificador(id en el caso; no existe campo cedula en la tabla)
        public function findById($id){
            $paciente = $this->paciente->findById($id);
            if ($paciente) {
                header('Content-Type: application/json');
                echo json_encode([
                    'success' => true,
                    'data' => $paciente, 
                    'message' => 'Paciente encontrado.'
                ]);
            } else {
                header('Content-Type: application/json');
                echo json_encode([
                    'success' => false,
                    'message' => 'No se encontró el paciente con ID  suministrado'
                ]);
            }

        }

        // Crear un nuevo paciente
        public function store() {

        }

        // Editar un paciente
        public function update($id) {

        }

        // Eliminar un paciente
        public function delete($id) {
            $this->paciente->eliminarPaciente($id);
            header('Location: index.php?controller=paciente&action=index');
        }
    }
?>