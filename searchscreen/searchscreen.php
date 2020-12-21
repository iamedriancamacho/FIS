<?php
require_once 'dbconnect.php';

$idnum = $_GET['userID'];
$sql = "SELECT * from users inner join usergroups on users.userID = usergroups.userID inner join groupslist on usergroups.roleID = groupslist.roleID where users.userID = $idnum;";
$dbStatement = $dbconnection->prepare($sql);
$dbStatement->bindParam(1, $idnum, PDO::PARAM_INT);
$dbStatement->execute();
$qResult = $dbStatement->fetchAll(PDO::FETCH_OBJ);
if ($dbStatement->rowCount() > 0) {
    // echo 'Menu sa user. Since pwde man more than 1 group.';
} else {
    //header('Location:http://localhost');
    echo 'walay sulod!!';
}

$sqlusers = "SELECT * FROM Users;";
$dbStatement = $dbconnection->prepare($sqlusers);
$dbStatement->execute();
$qusers = $dbStatement->fetchAll(PDO::FETCH_OBJ);


$userg = 'users';
$departmentg = 'department'; //including phone
$pubg = 'publication';
$pubtg = 'publication_type';
$authorg = 'authored_books'; //select * from authored_books inner join faculty in authored_books.fIDNumber = faculty.fIDNumber;
$workhisg = 'work_history';

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Screen</title>
    <link rel="stylesheet" href="../css/style.css">
</head>

<body>
    <?php require "../checkGroup.php"; ?>
    <nav class="body-header-2">SEARCH</nav>
    <div class="main-body">

        <section style="padding-left: 60%">
            <label for="cars">Choose a group:</label>

            <!-- HTML STARTS HERE -->


            <form action="searchscreen.php?userID=<?php echo $idnum ?>" method="POST">
                <select name="group" id="group">
                    <option value="users">Users</option>
                    <option value="department">Department</option>
                    <option value="publication">Publication</option>
                    <option value="publication_type">Type of Publication</option>
                    <option value="authored_books" selected>Authors</option>
                    <option value="work_history">Work</option>
                </select>
                <br>
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

        <!-- PHP STARTS HERE -->
        <section class='univAdminList'>
            <?php

            if (isset($_POST['gsearch'])) {
                if ($_POST['group'] == 'users') {
                    require 'search_users.php';
                }
                //
                if ($_POST['group'] == 'department') {
                    require 'search_department.php';
                }
                //
                if ($_POST['group'] == 'publication') {
                    require 'search_publication.php';
                }
                //
                if ($_POST['group'] == 'publication_type') {
                    require 'search_publicationtype.php';
                }
                //
                if ($_POST['group'] == 'authored_books') {
                    require 'search_authorbooks.php';
                }
                //
                if ($_POST['group'] == 'work_history') {
                    require 'search_workhistory.php';
                }
                //

            }
            ?>


        </section>

    </div>
</body>

</html>