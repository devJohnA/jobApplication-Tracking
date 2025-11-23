<?php 
require_once '../controllers/JobApplicationController.php';

header('Content-Type: application/json');

if(isset($_GET['id'])) {
    $applicationController = new JobApplicationController($pdo);
    $application = $applicationController->getApplicationById($_GET['id']);

    if($application) {
        echo json_encode($application);
        exit;
    } else {
        http_response_code(404);
        echo json_encode(['error' => 'Application not found']);
        exit;
    }

} else {
    http_response_code(400);
    echo json_encode(['error' => 'Missing id parameter']);
    exit;
}

?>