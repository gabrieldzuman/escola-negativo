<?php

namespace Src\Controllers;

use Src\Models\Report;

class ReportController {
    private $db;
    private $report;

    public function __construct($db) {
        $this->report = new Report($db);
    }

    public function getAgenda($student_id) {
        $result = $this->report->getAgendaByStudentId($student_id);
        $agenda = $result->fetchAll(PDO::FETCH_ASSOC);

        if(count($agenda) > 0) {
            echo json_encode([
                'status' => 'success',
                'data' => $agenda
            ]);
        } else {
            echo json_encode([
                'status' => 'fail',
                'message' => 'Nenhuma agenda encontrada para o aluno.'
            ]);
        }
    }
}
