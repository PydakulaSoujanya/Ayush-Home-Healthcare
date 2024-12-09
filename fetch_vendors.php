<?php
session_start(); // Start session

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    // User is not logged in, redirect to login page
    header("Location: login.php");
    exit;
}

// Your protected page content goes here
?>
<?php
include("config.php");

$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$size = isset($_GET['size']) ? (int)$_GET['size'] : 5;
$search = isset($_GET['search']) ? $_GET['search'] : '';

$offset = ($page - 1) * $size;

$searchCondition = $search ? "WHERE vendor_name LIKE '%" . $conn->real_escape_string($search) . "%'" : "";

// Get total rows
$totalRowsQuery = "SELECT COUNT(*) as count FROM vendors $searchCondition";
$totalRowsResult = $conn->query($totalRowsQuery);
$totalRows = $totalRowsResult->fetch_assoc()['count'];

// Get paginated data
$query = "SELECT * FROM vendors $searchCondition LIMIT $offset, $size";
$result = $conn->query($query);

$rows = [];
while ($row = $result->fetch_assoc()) {
    $rows[] = $row;
}

$totalPages = ceil($totalRows / $size);

echo json_encode([
    'rows' => $rows,
    'totalPages' => $totalPages,
]);

$conn->close();
?>
