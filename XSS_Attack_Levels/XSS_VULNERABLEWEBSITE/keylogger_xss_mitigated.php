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
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['message'])) {
    // Sanitize user input before storing in the database
    $message = htmlspecialchars($_POST['message'], ENT_QUOTES, 'UTF-8');

    // Insert sanitized message into the database
    $stmt = $conn->prepare("INSERT INTO messages (text) VALUES (?)");
    $stmt->bind_param("s", $message);
    $stmt->execute();
    $stmt->close();
}

// Fetch all messages from the database
$messages = $conn->query("SELECT text FROM messages");

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Keylogger XSS Mitigation Demo</title>
    <link rel=stylesheet href=refstyle.css>
    <!-- Content Security Policy to prevent keylogger XSS -->
    <meta http-equiv="Content-Security-Policy" content="default-src 'self'; script-src 'self'; style-src 'self';">
</head>
<body>
<video autoplay muted loop id="bg-video">
    <source src="vid.mp4" type="video/mp4">
</video>
<div class=container>
    <h1>Keylogger XSS Mitigation</h1>
    <p>Submit a message and see it displayed safely without allowing any malicious scripts to log keystrokes.</p>

    <form method="POST" action="keylogger_xss_mitigated.php">
        <label for="message">Message:</label><br>
        <textarea name="message" id="message" rows="4" cols="50"></textarea><br>
        <button type="submit">Submit</button>
    </form>

    <h2>Messages</h2>
    <ul>
        <?php while ($row = $messages->fetch_assoc()): ?>
            <li><?php echo $row['text']; ?></li>
        <?php endwhile; ?>
    </ul>
    <a href="index.php">
    <button type="button">Back to Home</button>
</a>

        </div>
</body>
</html>
