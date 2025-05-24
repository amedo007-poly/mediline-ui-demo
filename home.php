<?php
// Redirect to index.php if accessed directly
if (basename($_SERVER['SCRIPT_NAME']) === 'home.php') {
    header('Location: index.php?page=home');
    exit;
}

// Home page content
?>
<h2>Welcome to MediLine</h2>
<p>Upload your prescription to get started.</p>
<a href="index.php?page=upload">Upload Prescription</a>
