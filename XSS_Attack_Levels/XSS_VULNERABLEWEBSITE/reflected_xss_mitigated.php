<?php
// Check if input is set
if (isset($_GET['input'])) {
    // Apply htmlspecialchars to escape HTML entities and mitigate XSS
    $input = htmlspecialchars($_GET['input'], ENT_QUOTES, 'UTF-8');
} else {
    $input = '';
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Reflected XSS Mitigation Demo</title>
    <link rel=stylesheet href=refstyle.css>
</head>
<body>
<video autoplay muted loop id="bg-video">
    <source src="vid.mp4" type="video/mp4">
</video>
<div class=container>
    <h1>Reflected XSS Mitigation</h1>
    <p>Enter any text in the input field and submit to see it reflected on the page safely.</p>
    
    <form method="GET" action="reflected_xss_mitigated.php">
        <label for="input">Enter some text:</label>
        <input type="text" name="input" id="input" value="">
        <button type="submit">Submit</button>
    </form>

    <?php if ($input): ?>
        <h2>Your input (safely displayed):</h2>
        <p><?php echo $input; ?></p>
    <?php endif; ?>
    <a href="index.php">
    <button type="button">Back to Home</button>
</a>

    </div>
</body>
</html>
