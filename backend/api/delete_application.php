<?php 

require_once '../controllers/JobApplicationController.php';
header('Content-Type: application/json');
if(isset($_POST['id'])) {
    $applicationController = new JobApplicationController($pdo);
    $result = $applicationController->deleteApplication($_POST['id']);

    if($result) {
        echo json_encode(['status' => 'success', 'message' => 'Application deleted successfully']);
        exit;
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Failed to delete application']);
        exit;
    }

} else {
    http_response_code(400);
    echo json_encode(['error' => 'Missing id parameter']);
    exit;
}