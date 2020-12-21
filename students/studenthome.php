<?php
require_once 'dbconnect.php';
$idnum = $_GET['userID'];
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
            <form action="studenthome.php?userID=<?php echo $idnum ?>" method="post">
                <label for="gsearch">Search:</label>
                <?php
                $searchKey = '';
                if (isset($_POST['gsearch'])) {
                    $searchKey = $_POST['gsearch'];
                }

                ?>
                <input type="search" id="gsearch" name="gsearch" value=<?php echo $searchKey ?>>
                <input type="submit">
            </form>
        </section>
        <section class="univAdminList" style="text-align: center;">
            <?php
            if (isset($_POST['gsearch'])) {
                require 'student_bibliography_list.php';
            } else echo '<br>' . 'press SUBMIT to view table'

            ?>
        </section>

    </div>

    <!-- PHP STARTS HERE -->




    <!-- PHP ENDS HERE -->
</body>

</html>