<?php
require_once 'dbconnect.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student</title>

    <link rel="stylesheet" href="../css/style.css">
</head>

<body>
    <?php require "../checkGroup.php"; ?>
    <nav class="body-header-2">STUDENT</nav>
    <div class="main-body">

        <section style="padding-left: 60%">
            <form action="/action_page.php">
                <label for="gsearch">Search:</label>
                <input type="search" id="gsearch" name="gsearch">
                <input type="submit">
            </form>
        </section>
        <section class="univAdminList">
            <?php require 'student_bibliography_list.php' ?>
        </section>

    </div>
</body>

</html>