<?php

header("Content-Type: application/json");
include '../config/database.php';
include '../controllers/JobApplicationController.php';

$controller = new JobApplicationController($pdo);

if (!isset($_POST['action'])) {
    echo json_encode(["status" => "error", "message" => "Action missing"]);
    exit;
}

if ($_POST['action'] === "create") {

    try {
        $id = $controller->createApplication($_POST);

        echo json_encode([
            "status" => "success",
            "id" => $id
        ]);
        exit;

    } catch (Exception $e) {
        echo json_encode([
            "status" => "error",
            "message" => $e->getMessage()
        ]);
        exit;
    }
}

echo json_encode(["status" => "error", "message" => "Invalid action"]);
exit;
