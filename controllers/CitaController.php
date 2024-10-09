<?php


//Configuracion de la Base de datos.
require_once '../config/Database.php'; 


//Modelos
require_once '../models/Cita.php';
require_once '../models/AgendaMedica.php';


Class CitaController{

    private $cita;
    private $agenda;

    public function __construct(){
        $db = (new Database())->getConnection();    //Inicializar conexion a la DB
        $this->cita = new Cita($db);                //Instancia del modelo Cita
        $this->agenda = new AgendaMedica($db);      //Instancia del modelo AgendaMedica
    }


    public function index() {
        include '../views/citas/index.php';
    }

    //Consultar todas las citas medicas
    public function findAll(){
        $citas = $this->cita->findAll();
        header('Content-Type: application/json');
        http_response_code(200);
        echo  json_encode($citas);
    }

    public function create() {
        include '../views/citas/create.php';
    }


    //Crear una nueva cita medica
    public function store(){

        // Validar que los datos lleguen por el método POST
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            //Se verifica que esten todos los datos requeridos del POST
            if (!empty($_POST['id_paciente']) && !empty($_POST['id_turno']) && !empty($_POST['fecha']) && !empty($_POST['hora'])) {

                //Se asignan los valores de POST a las propiedades del objeto de Cita
                $this->cita->id_paciente    = $_POST['id_paciente'];
                $this->cita->id_turno       = $_POST['id_turno'];
                $this->cita->fecha          = $_POST['fecha'];
                $this->cita->hora           = $_POST['hora'];
                $this->cita->estado         = 'Confirmada';

                // Crear la cita
                if ($this->cita->create()) {
                    header('Content-Type: application/json'); 
                    echo json_encode(['message' => 'Cita asignada correctamente.']);
                } else {
                    header('Content-Type: application/json'); 
                    echo json_encode(['message' => 'Error al asignar la cita.']);
                }
              
            } else {
                header('Content-Type: application/json'); 
                echo json_encode(['message' => 'Datos incompletos.']);
            }
        } else {
            header('Content-Type: application/json'); 
            echo json_encode(['message' => 'Método no permitido.']);
        }

    }
}

?>