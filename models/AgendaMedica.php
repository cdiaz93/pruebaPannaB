<?php 

class AgendaMedica {

    private $conn;
    private $table_name = "agendamedica";

    //Tabla para hacer relaciones JOIN de campos foraneos.
    private $table_join1 = "medicos";

    public $id_turno;
    public $id_medico;
    public $dia_semana;
    public $hora_inicio;
    public $hora_fin;


    public function __construct($db) {
        $this->conn = $db;
    }

    // Consultar la agenda de un medico dado su id
    public function find($id) {
        $query = "SELECT * FROM " .$this->table_name. " WHERE id_medico=:id";

        $query = "SELECT a.id_turno AS id_turno,  
            a.dia_Semana    AS dia_semana, 
            a.hora_inicio   AS hora_inicio, 
            a.hora_fin      AS hora_fin,
            m.nombre        AS medico_nombre,
            m.especialidad  AS medico_especialidad, 
            m.correo        AS medico_correo,
            m.telefono      AS medico_telefono
            FROM " .$this->table_name. " AS a
            INNER JOIN " .$this->table_join1. " AS m ON a.id_medico = m.id 
            WHERE a.id_medico= :id"
        ;
        $stmt = $this->conn->prepare($query);

        // Vincula el parámetro
        $stmt->bindParam(':id', $id, PDO::PARAM_INT); // Especifica que el parámetro es un entero
        $stmt->execute();
    
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }


    // Consultar todos los horarios de un médico dado su id y una fecha para saber su turno.
    public function findByDoctorDay($id, $Fday) {
        $query = "SELECT * FROM " .$this->table_name. " WHERE id_medico=:id AND dia_semana =:Fday";
        $stmt = $this->conn->prepare($query);

        // Vincula el parámetro
        $stmt->bindParam(':id', $id, PDO::PARAM_INT); // Especifica que el parámetro es un entero
        $stmt->bindParam(':Fday', $Fday, PDO::PARAM_STR); // Especifica que el parámetro es un String
        $stmt->execute();
    
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

}

?>