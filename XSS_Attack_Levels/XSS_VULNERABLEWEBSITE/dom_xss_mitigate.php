<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DOM XSS Protected Page</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dompurify/2.4.1/purify.min.js"></script>
    <link rel=stylesheet href=refstyle.css>
</head>
<body>
<video autoplay muted loop id="bg-video">
    <source src="vid.mp4" type="video/mp4">
</video>
<div class=container>
    <h1>Welcome to the DOM XSS Demo</h1>
    <p>Enter your name in the URL query string: <code>?name=YourName</code></p>
    <div id="output"></div>

    <script>
        // Get the user-provided query parameter "name" from the URL
        var params = new URLSearchParams(window.location.search);
        var userInput = params.get('name');

        // Use DOMPurify to sanitize user input
        if (userInput) {
            var sanitizedInput = DOMPurify.sanitize(userInput);
            document.getElementById('output').textContent = "Hello, " + sanitizedInput;
        }
    </script>
</div>
</body>
</html>
