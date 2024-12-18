<?php
// Database connection details
$host = 'localhost';
$username = 'root';
$password = '';
$dbname = 'xss_test_db'; // Update this to your database name

// Create connection
$conn = new mysqli($host, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle the form submission and insert the comment (malicious input)
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $comment = $_POST['comment']; // Get the input comment
    
    // Prepare the SQL statement to insert the comment into the database
    $stmt = $conn->prepare("INSERT INTO comments (text) VALUES (?)");
    $stmt->bind_param("s", $comment);
    $stmt->execute();
    $stmt->close();
}

// Fetch comments from the database
$sql = "SELECT * FROM comments";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cookie Stealing XSS Attack Demonstration</title>
</head>
<body>
    <h1>Cookie Stealing XSS Attack Demonstration</h1>

    <!-- Comment form where user can input their XSS payload -->
    <form method="POST" action="">
        <textarea name="comment" placeholder="Enter your comment (XSS payload here)" required></textarea><br>
        <button type="submit">Submit Comment</button>
    </form>

    <h3>Comments:</h3>

    <?php
    // Display comments (This will reflect the XSS payload)
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            // Display raw HTML (XSS reflected)
            echo "<p>" . $row['text'] . "</p>"; // This will execute the XSS script
        }
    } else {
        echo "No comments yet.";
    }

    // Close the database connection
    $conn->close();
    ?>

    <!-- Back to Home button -->
    <a href="index.php">
        <button type="button">Back to Home</button>
    </a>

</body>
</html>
