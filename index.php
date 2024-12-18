<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>XSS Attack Demonstrations</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<video autoplay muted loop id="bg-video">
    <source src="xss_vid.mp4" type="video/mp4">
</video>
    <div class="container">
        <h1>Welcome to XSS Attack Demonstrations</h1>
        
        <div class="grid-container">
            <div class="grid-item">
                <h2>1. Reflected XSS Attack</h2>
                <p><a href="reflected_xss.php" class="perform-btn">Perform Reflected XSS Attack</a></p>
                <p><a href="reflected_xss_mitigated.php" class="mitigate-btn">Mitigate Reflected XSS</a></p>
            </div>
            <div class="grid-item">
                <h2>2. Persistent XSS Attack</h2>
                <p><a href="persistent_xss.php" class="perform-btn">Perform Persistent XSS Attack</a></p>
                <p><a href="persistent_xss_mitigated.php" class="mitigate-btn">Mitigate Persistent XSS</a></p>
            </div>
            <div class="grid-item">
                <h2>3. Keylogging XSS Attack</h2>
                <p><a href="keylogger_xss.php" class="perform-btn">Perform Keylogging XSS Attack</a></p>
                <p><a href="keylogger_xss_mitigated.php" class="mitigate-btn">Mitigate Keylogging XSS</a></p>
                <p><a href="log_display.php" class="view-keys-btn">View the stored Keys</a></p>
            </div>
            <div class="grid-item">
                <h2>4. DOM Based XSS Attack</h2>
                <p><a href="dom_xss.php" class="perform-btn">Perform Dom Based XSS Attack</a></p>
                <p><a href="dom_xss_mitigate.php" class="mitigate-btn">Mitigate Dom based XSS</a></p>
            </div>
        </div>

        <hr>
        <footer>
            <p>XSS Demonstration Project</p>
        </footer>
    </div>
</body>
</html>
