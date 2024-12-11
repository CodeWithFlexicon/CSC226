<?php
// Include the database connection
include('db.php');

// Only handle GET request
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    // If specific ID is passed, filter by ID
    if (isset($_GET['brand'])) {
        $brand = $_GET['brand'];
        $sql = "SELECT * FROM cars WHERE brand = '$brand'";
    } else {
        // Fetch all users if no ID is provided
        $sql = "SELECT * FROM cars";
    }

    $result = $conn->query($sql);

    // Check if any records were found
    if ($result->num_rows > 0) {
        $cars = [];
        while ($row = $result->fetch_assoc()) {
            $cars[] = $row;
        }
        echo json_encode($cars);
    } else {
        echo json_encode(["message" => "No records found"]);
    }
}

$conn->close();
?>
