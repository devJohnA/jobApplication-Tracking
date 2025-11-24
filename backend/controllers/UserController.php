<?php

include_once __DIR__ . '/../models/User.php';

class UserController {
    private $model;

    public function __construct($pdo) {
        $this->model = new User($pdo);
    }

    public function loginUser($email, $password) {
        return $this->model->login($email, $password);
    }

    public function updateUser($data) {
        return $this->model->update($data);
    }

    public function getUserByEmail($email) {
        return $this->model->getUserByEmail($email);
    }
}