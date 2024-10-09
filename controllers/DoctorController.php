<?php


//Configuracion de la Base de datos.
require_once '../config/Database.php'; 


//Modelos
require_once '../models/Doctor.php';
require_once '../models/AgendaMedica.php';


Class DoctorController{

    private $doctor;
    private $agenda;

    public function __construct(){
        $db = (new Database())->getConnection();    //Inicializar conexion a la DB
        $this->doctor = new Doctor($db);                //Instancia del modelo Cita
        $this->agenda = new AgendaMedica($db);      //Instancia del modelo AgendaMedica
    }

    //Consultar todos los medicos
    public function findAll(){
        $medicos = $this->doctor->findAll();
        header('Content-Type: application/json');
        http_response_code(200);
        echo  json_encode($medicos);
    }

}

?>