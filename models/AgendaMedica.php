<?php 

class AgendaMedica {
    private $conn;
    private $table_name = "agendamedica";

    public $id_turno;
    public $id_medico;
    public $dia_semana;
    public $hora_inicio;
    public $hora_fin;


    public function __construct($db) {
        $this->conn = $db;
    }


    // Consultar todos los horarios de un médico
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