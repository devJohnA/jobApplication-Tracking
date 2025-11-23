<?php

include_once __DIR__ . '/../config/database.php';

class JobApplication {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    // --- Create job application (used by createApplication in controller)
    public function create($data) {
        $sql = "INSERT INTO job_applications (company_name, job_role, date_applied, link) 
                VALUES (:company_name, :job_role, :date_applied, :link)";
        $stmt = $this->pdo->prepare($sql);

        $stmt->execute([
            ':company_name' => $data['company_name'],
            ':job_role'     => $data['job_role'],
            ':date_applied' => $data['date_applied'],
            ':link'         => $data['link']
        ]);

        return $this->pdo->lastInsertId();
    }

    // --- Get a single job application by ID
    public function getById($id) {
        $sql = "SELECT * FROM job_applications WHERE id = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([':id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // --- Get all job applications
    public function getAll() {
        $sql = "SELECT * FROM job_applications ORDER BY date_applied DESC";
        $stmt = $this->pdo->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    
    } 
    //count all job applications
    public function countAll() {
        $sql = "SELECT COUNT(*) as total FROM job_applications";
        $stmt = $this->pdo->query($sql);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result['total'];
    }


    public function update($data) {
        $sql = "UPDATE job_applications SET 
                company_name = :company_name,
                job_role = :job_role,
                date_applied = :date_applied,
                link = :link
                WHERE id = :id";

        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([
            ':company_name' => $data['company_name'],
            ':job_role'     => $data['job_role'],
            ':date_applied' => $data['date_applied'],
            ':link'         => $data['link'],
            ':id'           => $data['id']
        ]);
        
    }
}
