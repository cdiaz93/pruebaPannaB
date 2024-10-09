<?php


//Configuracion de la Base de datos.
require_once '../config/Database.php'; 


//Modelos
require_once '../models/AgendaMedica.php';
require_once '../models/Cita.php';

Class AgendaMedicaController{

    private $agenda;
    private $cita;


    public function __construct(){
        $db = (new Database())->getConnection();    //Inicializar conexion a la DB
        $this->cita = new Cita($db);                //Instancia del modelo Cita
        $this->agenda = new AgendaMedica($db);      //Instancia del modelo AgendaMedica

    }

    public function findByDoctorId($id, $fecha){

       //Obtengo el nombre del dia de la semana de la fecha seleccionada
        $timestamp = strtotime($fecha);
        $diaNumero = date('N', $timestamp); // 1 (Lunes) a 7 (Domingo)
        $dias = ['Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado', 'Domingo'];
        $Fdia =  $dias[$diaNumero - 1]; 

        //Consulto los datos de agenda del doctor para el dia de la semana seleccionado.
        $agendaMedica = $this->agenda->findByDoctorDay($id, $Fdia);

        //Asigno algunos valores de la agenda del medico en variaibles para posterior uso.
        $idTurno = $agendaMedica['id_turno'];
        $horaInicio = $agendaMedica['hora_inicio'];
        $horaFin = $agendaMedica['hora_fin'];

        //Creo un arreglo de horarios tomando como referencia el rango de fechas dela agenda del medico.
        // 1. Este arreglo sera el que se envia a la vista para la selecion de horas para la cita.
        // 2. Estableci un margen de horarios de atencion de 15 minutos entre citas para evitar el registro de citas con muy corto tiempo de duracion.
        $intervalos = [];
        $current = strtotime($horaInicio);
        $fin = strtotime($horaFin);
        while ($current <= $fin) {
            $intervalos[] = date('H:i:s', $current); // Agrega el tiempo en formato H:i:s
            $current = strtotime('+15 minutes', $current); // Suma 15 minutos
        }

        //Consulto las citas medicas que tenga ya programados el medico. se consulta por el turno para agilizar la busqueda por dias de semana que...
        //conicidan con las seleccionadas en el fronted.
        $citasMedico = $this->cita->findDoctorAppointment($idTurno);

        //Creo el arreglo horasOcupadas solo con las horas de las $citasMedico
        $horasOcupadas = [];
        foreach ($citasMedico as $cita) {
            $horasOcupadas[] = $cita['hora'];
        }

        //Se evaluan los dos arreglos ($intervalos - $ $horasOcupadas) para filtrar la horas que no esten ocupadas.
        $horariosDisponibles = array_diff($intervalos, $horasOcupadas);

        if (count($horariosDisponibles) > 0) {
            $response = [
                'success' => true,
                'horarios' => $horariosDisponibles,
                'idTurno' => $idTurno,
            ];

            header('Content-Type: application/json'); 
            echo json_encode($response);
          
        } else {
            header('Content-Type: application/json');
            echo json_encode([
                'success' => false,
                'message' => 'No hay horarios disponibles para la fecha seleccionada.'
            ]);
        }

       

    }
}


?>