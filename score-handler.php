<?php
// Retrieve the score from the POST request
$score = $_POST['score'];

// Process the score as needed
// ...

// Send a response back to the JavaScript code
$response = ['message' => 'Score received successfully!'];
header('Content-Type: application/json');
echo json_encode($response);
?>