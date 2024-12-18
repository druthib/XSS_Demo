<?php
// Database connection
$host = 'localhost';
$user = 'root';
$password = '';
$db = 'xss_test_db';

$conn = new mysqli($host, $user, $password, $db);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// If form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['comment'])) {
    // Sanitize user input before storing in database
    $comment = htmlspecialchars($_POST['comment'], ENT_QUOTES, 'UTF-8');

    // Insert sanitized comment into database
    $stmt = $conn->prepare("INSERT INTO comments (text) VALUES (?)");
    $stmt->bind_param("s", $comment);
    $stmt->execute();
    $stmt->close();
}

// Fetch all comments from the database
$comments = $conn->query("SELECT text FROM comments");

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Persistent XSS Mitigation Demo</title>
    <link rel=stylesheet href=refstyle.css>
    
</head>
<body>
<video autoplay muted loop id="bg-video">
    <source src="vid.mp4" type="video/mp4">
</video>
<div class=container>
    <h1>Persistent XSS Mitigation</h1>
    <p>Enter a comment and see it displayed on the page securely.</p>

    <form method="POST" action="persistent_xss_mitigated.php">
        <label for="comment">Comment:</label><br>
        <textarea name="comment" id="comment" rows="4" cols="50"></textarea><br>
        <button type="submit">Submit</button>
    </form>

    <h2>Comments</h2>
    <ul>
        <?php while ($row = $comments->fetch_assoc()): ?>
            <li><?php echo $row['text']; ?></li>
        <?php endwhile; ?>
    </ul>
    <a href="index.php">
    <button type="button">Back to Home</button>
</a>

    </div>
</body>
</html>
