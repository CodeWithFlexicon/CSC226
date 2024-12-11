<?php
// Include the database connection
include('db.php');

// Only handle POST request
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the JSON data from the request body
    $data = json_decode(file_get_contents("php://input"), true);

    // Check if the required fields are present
    if (isset($data['brand']) && isset($data['model']) && isset($data['msrp'])) {
        $brand = $data['brand'];
        $model = $data['model'];
        $msrp = $data['msrp'];

        // Prepare the SQL query to insert the record
        $sql = "INSERT INTO cars (brand, model, msrp) VALUES ('$brand', '$model', '$msrp')";

        if ($conn->query($sql) === TRUE) {
            echo json_encode(["message" => "New record created successfully"]);
        } else {
            echo json_encode(["error" => $conn->error]);
        }
    } else {
        echo json_encode(["error" => "Invalid input data"]);
    }
}

$conn->close();
?>
