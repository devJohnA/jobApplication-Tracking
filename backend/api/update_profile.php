<?php
require_once '../controllers/UserController.php';

header('Content-Type: application/json');

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $userController = new UserController($pdo);
    $data = [
        'id' => $_POST['id'],
        'email' => $_POST['email'],
        'password' => $_POST['password']
    ];

    $result = $userController->updateUser($data);
    echo json_encode([
        "updated" => $result > 0,
        "rows" => $result
    ]);
}
