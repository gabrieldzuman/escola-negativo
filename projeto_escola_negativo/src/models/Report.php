<?php

namespace Src\Models;

use PDO;

class Report {
    private $conn;
    private $table = 'agenda';

    public function __construct($db) {
        $this->conn = $db;
    }

    public function getAgendaByStudentId($student_id) {
        $query = 'SELECT * FROM ' . $this->table . ' WHERE aluno_id = :student_id';
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':student_id', $student_id);
        $stmt->execute();

        return $stmt;
    }
}
