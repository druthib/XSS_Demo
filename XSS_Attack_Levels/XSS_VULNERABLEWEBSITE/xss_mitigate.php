<?php
// xss_mitigate.php
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>XSS Mitigation</title>
</head>
<body>
    <h1>XSS Mitigation</h1>
    
    <h2>1. Sanitize Input</h2>
    <p>Ensure that user inputs are sanitized to remove any malicious code.</p>
    <pre>
    // Example: Using htmlspecialchars() to sanitize input
    $safe_input = htmlspecialchars($input, ENT_QUOTES, 'UTF-8');
    </pre>
    
    <h2>2. Use Content Security Policy (CSP)</h2>
    <p>Implement CSP headers to limit the sources of executable scripts.</p>
    <pre>
    Content-Security-Policy: default-src 'self'; script-src 'self' https://trusted.com;
    </pre>

    <h2>3. Encode Outputs</h2>
    <p>Encode output data to prevent browser from executing injected scripts.</p>
    <pre>
    echo htmlspecialchars($user_input, ENT_QUOTES, 'UTF-8');
    </pre>

</body>
</html>
