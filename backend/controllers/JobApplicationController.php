<?php

include_once __DIR__ . '/../models/JobApplication.php';

class JobApplicationController {
    private $model;

    public function __construct($pdo) {
        $this->model = new JobApplication($pdo);
    }

    public function createApplication($data) {
        return $this->model->create($data);
    }

    public function getApplicationById($id) {
        return $this->model->getById($id);
    }

    public function listApplications() {
        return $this->model->getAll();
    }

    public function countApplications() {
        return $this->model->countAll();
    }

    public function updateApplication($data) {
        return $this->model->update($data);
    }
}
