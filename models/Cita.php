<?php

Class Cita{

    public $id_paciente;
    public $id_medico;
    public $id_turno;
    public $fecha;
    public $hora;
    public $estado;  //Confirmada - Cancelada

    private $conn;
    private $table_name="citas"; //Tabla principal del modelo

    //Tablas para hacer relaciones JOIN de campos foraneos.
    private $table_join1="pacientes";
    private $table_join2="agendamedica";
    private $table_join3="medicos";

    public function __construct($db) {
        $this->conn = $db;
    }

    //**Consultar todas las citas medicas */
    public function findAll(){
        $query = "SELECT c.id AS cita_id,  
            c.fecha         AS cita_fecha, 
            c.hora          AS cita_hora, 
            c.estado        AS cita_estado,
            pc.nombre       AS paciente_nombres,
            pc.apellido     AS paciente_apellidos, 
            md.nombre       AS medico_nombre,
            am.dia_semana   AS dia_semana
            FROM " .$this->table_name. " AS c
            INNER JOIN " .$this->table_join1. " AS pc ON c.id_paciente = pc.id 
            INNER JOIN " .$this->table_join2. " AS am ON c.id_turno    = am.id_turno
            INNER JOIN " .$this->table_join3. " AS md ON am.id_medico  =md.id"
        ;
        
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $rows;
    }

    //Consultar todas las citas medicas del Medico para una fecha determinada
    public function findByDoctorMedicalShift($idTurno, $fecha){
        $query = "SELECT c.id AS cita_id,  
            c.fecha         AS cita_fecha, 
            c.hora          AS cita_hora, 
            c.estado        AS cita_estado,
            pc.nombre       AS paciente_nombres,
            pc.apellido     AS paciente_apellidos, 
            md.nombre       AS medico_nombre,
            am.dia_semana   AS dia_semana
            FROM " .$this->table_name. " AS c
            INNER JOIN " .$this->table_join1. " AS pc ON c.id_paciente = pc.id 
            INNER JOIN " .$this->table_join2. " AS am ON c.id_turno    = am.id_turno
            INNER JOIN " .$this->table_join3. " AS md ON am.id_medico  =md.id
            WHERE c.id_turno= :idTurno AND c.fecha= :fecha "
        ;
        
        $stmt = $this->conn->prepare($query);

        // Vincula el parámetro
        $stmt->bindParam(':idTurno', $idTurno, PDO::PARAM_INT); // Especifica que el parámetro es un entero
        $stmt->bindParam(':fecha', $fecha, PDO::PARAM_STR); // Especifica que el parámetro es un String
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
       

    }

    //Consultar todas las citas medicas del paciente para una fecha determinada
    public function findByPatientId($id, $fecha){
        $query = "SELECT c.id AS cita_id,  
            c.fecha         AS cita_fecha, 
            c.hora          AS cita_hora, 
            c.estado        AS cita_estado,
            pc.nombre       AS paciente_nombres,
            pc.apellido     AS paciente_apellidos, 
            md.nombre       AS medico_nombre,
            am.dia_semana   AS dia_semana
            FROM " .$this->table_name. " AS c
            INNER JOIN " .$this->table_join1. " AS pc ON c.id_paciente = pc.id 
            INNER JOIN " .$this->table_join2. " AS am ON c.id_turno    = am.id_turno
            INNER JOIN " .$this->table_join3. " AS md ON am.id_medico  =md.id
            WHERE c.id_paciente= :id AND c.fecha= :fecha"
        ;

        $stmt = $this->conn->prepare($query);

        // Vincula el parámetro
        $stmt->bindParam(':id', $id, PDO::PARAM_INT); // Especifica que el parámetro es un entero
        $stmt->bindParam(':fecha', $fecha, PDO::PARAM_STR); // Especifica que el parámetro es un String
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
        
    }

    // Crear una nueva cita
    public function create() {
        $query = "INSERT INTO " .$this->table_name. " SET 
            id_paciente=:id_paciente, 
            id_turno=:id_turno, 
            fecha=:fecha, 
            hora=:hora, 
            estado=:estado
        ";
        
        $stmt = $this->conn->prepare($query);

        // Sanitizar
        $this->id_paciente = htmlspecialchars(strip_tags($this->id_paciente));
        $this->id_turno = htmlspecialchars(strip_tags($this->id_turno));
        $this->fecha = htmlspecialchars(strip_tags($this->fecha));
        $this->hora = htmlspecialchars(strip_tags($this->hora));
        $this->estado = htmlspecialchars(strip_tags($this->estado));

        // Bind de parametros
        $stmt->bindParam(":id_paciente", $this->id_paciente);
        $stmt->bindParam(":id_turno", $this->id_turno);
        $stmt->bindParam(":fecha", $this->fecha);
        $stmt->bindParam(":hora", $this->hora);
        $stmt->bindParam(":estado", $this->estado);

        if ($stmt->execute()) {
            return true;
        }
        return false;
    }

    //Consultar todas las citas programadas de un médico dado su id y la fecha
    public function findDoctorAppointment($idTurno) {
        $query = "SELECT * FROM " .$this->table_name. " WHERE id_turno =" .$idTurno;
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }


    //Cancelar una cita
    public function cancel($id, $data) {
      
        $query = "UPDATE citas SET estado = :estado WHERE id = :id";
        $stmt = $this->conn->prepare($query);
    
        // Asignar los parámetros
        $stmt->bindParam(':estado', $data['estado']);
        $stmt->bindParam(':id', $id);
    
        if ($stmt->execute()) {
            return true;
        }
        return false;

    }






}

?>