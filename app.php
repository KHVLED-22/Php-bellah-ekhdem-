<!-- /ecommerce/App.php -->

<?php
// Include necessary files
require_once 'config/database.php'; // Include your database configuration if needed
require_once 'controllers/ProductController.php'; // Include other controllers if needed
// Include other necessary files...

// Start output buffering
ob_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Shop Homepage - Start Bootstrap Template</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="public/assets/favicon.ico" />
    <!-- Bootstrap icons-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="public/css/styles.css" rel="stylesheet" />
</head>
<body>

<?php
// Include the main content of your application
include 'public/index.php';

// Get the content from the output buffer
$content = ob_get_clean();

// You can include additional HTML, headers, or footers if needed

// Output the combined content
echo $content;
?>

<!-- Bootstrap core JS-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
<!-- Core theme JS-->
<script src="public/js/scripts.js"></script>

</body>
</html>
