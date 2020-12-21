<?php
require_once 'dbconnect.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>University Official</title>

    <link rel="stylesheet" href="../css/style.css">
</head>

<body>
    <?php require "../checkGroup.php"; ?>
    <nav class="body-header-2">UNIVERSITY OFFICIAL</nav>

    <div class="main-body">
        <section class="univAdminList">
            <?php require "../faculty/faculty_list.php"; ?>
        </section>
        <br>

        <section class="univAdminList">
            <?php require 'univ_publication_list.php' ?>
        </section>

    </div>
</body>

</html>