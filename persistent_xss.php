<?php
// Database connection details
$host = 'localhost';
$username = 'root';
$password = '';
$dbname = 'xss_test_db'; // Your database name

// Create connection
$conn = new mysqli($host, $username, $password, $dbname);

// Check if connection was successful
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle the form submission and insert the malicious comment into the database
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the comment text from the form input
    $comment = $_POST['comment'];

    // Prepare the SQL statement (no escaping, vulnerable to XSS)
    $stmt = $conn->prepare("INSERT INTO comments (text) VALUES (?)");
    $stmt->bind_param("s", $comment); // Bind user input as a string to the SQL query
    $stmt->execute();

    echo "Your comment has been submitted. Please wait for the redirection.";
    $stmt->close();
}

// Fetch and display all comments (including the malicious script)
$sql = "SELECT * FROM comments";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        // Display the comment without sanitizing or escaping the output
        // This will allow the script to be executed
        echo "<p>" . $row['text'] . "</p>"; // The XSS script will execute here
    }
} else {
    echo "No comments yet.";
}

// Close the connection
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Persistent XSS Attack Demo</title>
    <link rel="stylesheet" href="refstyle.css">
</head>
<body>
<video autoplay muted loop id="bg-video">
    <source src="vid.mp4" type="video/mp4">
</video>
    <div class=container>
    <h1>Persistent XSS Attack Demo</h1>
    <form method="POST" action="">
        <textarea name="comment" placeholder="Enter your comment (XSS payload here)" required></textarea><br>
        <button type="submit">Submit Comment</button>
    </form>
    <a href="index.php">
    <button type="button">Back to Home</button>
</a>
    </div>
</body>
</html>
