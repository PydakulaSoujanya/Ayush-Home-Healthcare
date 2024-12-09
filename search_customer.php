<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require 'config.php';

$response = [
    'success' => false,
    'message' => 'Error preparing SQL statement.'
];

// Check if a search query is provided
if (isset($_GET['search'])) {
    $search = $_GET['search'];

    // Prepare SQL query with LIKE operator
    $sql = "
        SELECT customer_name, emergency_contact_number
        FROM customer_master
        WHERE customer_name LIKE '%$search%'
           OR emergency_contact_number LIKE '%$search%'
    ";

    $queryResult = mysqli_query($conn, $sql);

    if ($queryResult) {
        $results = [];

        while ($row = mysqli_fetch_assoc($queryResult)) {
            $results[] = $row;
        }

        $response = [
            'success' => true,
            'message' => 'Data retrieved successfully.',
            'data' => $results
        ];
    } else {
        $response['message'] = 'Error executing SQL query.';
    }
}

// Return the response as JSON
header('Content-Type: application/json');
echo json_encode($response);
?>
