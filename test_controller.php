<?php
include_once 'config/database.php';
include_once 'controllers/JobApplicationController.php';

$controller = new JobApplicationController($pdo);

// Test Create
echo "Testing Create...\n";
$newId = $controller->createApplication([
    'applicant_name' => 'John Doe',
    'position' => 'PHP Developer',
    'status' => 'pending',
    'link' => 'https://www.linkedin.com/in/johndoe',
    'applied_date' => date('Y-m-d')
]);
echo "Created application with ID: $newId\n\n";

// Test Read
echo "Testing Read...\n";
$application = $controller->getApplicationById($newId);
print_r($application);
echo "\n";


// Test List
echo "Testing List...\n";
$applications = $controller->listApplications();
print_r($applications);
echo "\n";

// Test Delete (optional - uncomment to test)
// echo "Testing Delete...\n";
// $controller->deleteApplication($newId);
// echo "Deleted!\n";