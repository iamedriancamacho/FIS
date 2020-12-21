<?php
require_once 'dbconnect.php';

//$tempID = $_GET['userID'];
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Faculty Homepage</title>

    <!-- CSS -->
    <link rel="stylesheet" href="../css/style.css">
</head>

<body>
    <?php require "../checkGroup.php"; ?>
    <?php require 'faculty_test.php' ?>
</body>

</html>