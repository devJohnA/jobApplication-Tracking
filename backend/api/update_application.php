<?php
require_once '../controllers/JobApplicationController.php';

header('Content-Type: application/json');


if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $applicationController = new JobApplicationcontroller($pdo);

    $data = [
        'id' => $_POST['id'],
        'company_name' => $_POST['company_name'],
        'job_role' => $_POST['job_role'],
        'date_applied' => $_POST['date_applied'],
        'link' => $_POST['link']
    ];

    $result = $applicationController->updateApplication($data);

    echo json_encode([
        "updated" => $result > 0,
        "rows" => $result
    ]);
    exit;
}

// if ($_SERVER["REQUEST_METHOD"] === "POST") {
//     $applicationController = new JobApplicationcontroller($pdo);

//     $data = [
//         'id' => $_POST['id'],
//         'company_name' => $_POST['company_name'],
//         'job_role' => $_POST['job_role'],
//         'date_applied' => $_POST['date_applied'],
//         'link' => $_POST['link']
//     ];

//     $result = $applicationController->updateApplication($data);


//     if ($result) {
//         echo json_encode(["status" => "success", "message" => "Application updated successfully"]);
//     } else if (!$result) {
//         echo json_encode(["status" => "info", "message" => "No changes made to the application"]);
//     } else {
//         echo json_encode(["status" => "error", "message" => "Failed to update application"]);
//         exit;
//     }
// }



