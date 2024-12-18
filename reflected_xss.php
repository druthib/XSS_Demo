<?php
// reflected_xss.php

// Check if there is a query string parameter
if (isset($_GET['input'])) {
    $input = $_GET['input']; // This is where the reflected XSS occurs
} else {
    $input = '';
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reflected XSS Attack</title>
    <link rel="stylesheet" href="refstyle.css">
</head>
<body>
<video autoplay muted loop id="bg-video">
    <source src="vid.mp4" type="video/mp4">
</video>
<div class=container>
    <h1>Reflected XSS Attack Demonstration</h1>
    <p>Enter any text below (e.g., <code>&lt;script&gt;alert('XSS')&lt;/script&gt;</code>)</p>
    
    <form method="GET">
        <input type="text" name="input" />
        <button type="submit">Submit</button>
    </form>

    <h3>Reflected Input:</h3>
    <p><?php echo $input; // XSS vulnerability here ?></p>

    <p>If you injected a script (e.g., <code>&lt;script&gt;alert('XSS')&lt;/script&gt;</code>), you should see an alert box appear!</p>
    <a href="index.php">
    <button type="button">Back to Home</button>
</a>

    </div>
</body>
</html>
