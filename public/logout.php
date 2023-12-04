<?php
session_start();

// Unset all session variables
session_unset();

// Destroy the session
session_destroy();

// Redirect to the main application page (app.php in this case)
header('Location: ../app.php'); // Utilisez le chemin approprié
exit(); // Stop further execution.
?>
