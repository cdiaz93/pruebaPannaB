<?php

Class Cita{

    public $id_paciente;
    public $id_medico;
    public $id_turno;
    public $fecha;
    public $hora;
    public $estado;  //Confirmada - Cancelada

    private $conn;
    private $table_name="citas";

    public function __construct($db) {
        $this->conn = $db;
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


    // Actualizar una cita
    public function update($id) {

        $query = "UPDATE " . $this->table_name . " SET 
            id_paciente=:id_paciente, 
            id_turno=:id_turno, 
            fecha=:fecha, 
            hora=:hora, 
            estado=:estado 
            WHERE id = :id
        ";

        $stmt = $this->conn->prepare($query);

        // Sanitizar
        $this->id_paciente = htmlspecialchars(strip_tags($this->id_paciente));
        $this->id_turno = htmlspecialchars(strip_tags($this->id_turno));
        $this->fecha = htmlspecialchars(strip_tags($this->fecha));
        $this->hora = htmlspecialchars(strip_tags($this->hora));
        $this->estado = htmlspecialchars(strip_tags($this->estado));

        // Bind de parámetros
        $stmt->bindParam(":id_paciente", $this->id_paciente);
        $stmt->bindParam(":id_turno", $this->id_turno);
        $stmt->bindParam(":fecha", $this->fecha);
        $stmt->bindParam(":hora", $this->hora);
        $stmt->bindParam(":estado", $this->estado);
        $stmt->bindParam(":id", $this->id);

        if ($stmt->execute()) {
            return true;
        }
        return false;
    }

    // Eliminar una cita
    public function delete($id) {

        $query = "DELETE FROM " . $this->table_name . " WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":id", $id);

        if ($stmt->execute()) {
            return true;
        }
        return false;
    }




}

?>