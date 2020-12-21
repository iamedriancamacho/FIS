<?php
require_once "dbconnect.php";

if (isset($_GET['userID']) && !isset($_GET['fIDNumber'])) {
    $idnum = $_GET['userID'];
} elseif (isset($_GET['fIDNumber']) && !isset($_GET['userID'])) {
    $idnum = $_GET['fIDNumber'];
} else $idnum = $_GET['fIDNumber'];
$sql = "SELECT * FROM faculty WHERE fIDNumber = ?;";
$dbStatement = $dbconnection->prepare($sql);
$dbStatement->execute(array($idnum));
if ($dbStatement->rowCount() > 0) {
    $result = $dbStatement->fetch(PDO::FETCH_ASSOC);
} else {
    //header('Location:http://localhost');
    echo 'wako kasulod';
}

$sql3 = "SELECT * FROM degree WHERE fIDNumber=?;";
$dbStatement = $dbconnection->prepare($sql3);
$dbStatement->bindParam(1, $result['fIDNumber'], PDO::PARAM_STR);
$dbStatement->execute();
$qResult3 = $dbStatement->fetchAll(PDO::FETCH_OBJ);

$sql = "SELECT DISTINCT title FROM books WHERE title in (SELECT title FROM authored_books where fIDNumber = ?);";
$dbStatement = $dbconnection->prepare($sql);
$dbStatement->bindParam(1, $result['fIDNumber'], PDO::PARAM_STR);
$dbStatement->execute();
$qResult = $dbStatement->fetchAll(PDO::FETCH_OBJ);

$sql1 = "SELECT * FROM course WHERE courseID in (SELECT courseID FROM courses_taught where fIDNumber = ?);";
$dbStatement = $dbconnection->prepare($sql1);
$dbStatement->bindParam(1, $result['fIDNumber'], PDO::PARAM_STR);
$dbStatement->execute();
$qResult1 = $dbStatement->fetchAll(PDO::FETCH_OBJ);

$sql2 = "SELECT DISTINCT awardDesc,awardMonth,awardDate,awardYear FROM award WHERE awardDesc in (SELECT awardDesc FROM grant_recipeints where fIDNumber = ?);";
$dbStatement = $dbconnection->prepare($sql2);
$dbStatement->bindParam(1, $result['fIDNumber'], PDO::PARAM_STR);
$dbStatement->execute();
$qResult2 = $dbStatement->fetchAll(PDO::FETCH_OBJ);

$sql4 = "SELECT * FROM work_history WHERE fIDNumber=?;";
$dbStatement = $dbconnection->prepare($sql4);
$dbStatement->bindParam(1, $result['fIDNumber'], PDO::PARAM_STR);
$dbStatement->execute();
$qResult4 = $dbStatement->fetchAll(PDO::FETCH_OBJ);

?>

<html>

<head>
    <title>
        faculty test
    </title>
    <!-- css -->
    <link href="../css/style.css" rel="stylesheet" />
</head>

<body class="main-body">
    <nav class="body-header-2">FACULTY</nav>
    <div class="univAdminList">
        <?php echo $idnum, ' ', $result['fLastName'], ' ', $result['fFirstName'];
        echo '<br> Degree: <br>';
        foreach ($qResult3 as $rowdegree) {
            echo $rowdegree->degree, '<br>';
        }
        ?>

        <br>
        <button><a href="<?php echo 'add_book.php?fIDNumber=', $result['fIDNumber'] ?>">Add Book</a></button>
        <button><a href="<?php echo 'add_award.php?fIDNumber=', $result['fIDNumber'] ?>">Add Award</a></button>
        <button><a href="<?php echo 'add_degree.php?fIDNumber=', $result['fIDNumber'] ?>">Add Degree</a></button>
        <button><a href="<?php echo 'add_work_history.php?fIDNumber=', $result['fIDNumber'] ?>">Add Work History</a></button>
        <button><a href="<?php echo 'add_courses_taught.php?fIDNumber=', $result['fIDNumber'] ?>">Add Courses Taught</a></button>
        <br>
        <h3>
            Books Published
        </h3>
        <table>
            <tr>
                <th>Book Title</th>
            </tr>

            <?php
            foreach ($qResult as $rowbook) {
            ?>
                <tr>
                    <td><?php echo $rowbook->title ?></td>
                    <td><a href="<?php echo 'view_book.php?title=', $rowbook->title, '&fIDNumber=', $result['fIDNumber'] ?>">View Book</a></td>
                    <td><a href="<?php echo 'delete_book.php?title=', $rowbook->title, '&fIDNumber=', $result['fIDNumber'] ?>">Delete</a></td>
                </tr>

            <?php
            }
            ?>
        </table>
        <h3>
            Courses Taught
        </h3>
        <table>
            <tr>
                <th>Course ID</th>
                <th>Course Description</th>
                <th>Day</th>
                <th>Time</th>
                <th>Room</th>
            </tr>

            <?php
            foreach ($qResult1 as $rowcourse) {
            ?>
                <tr>
                    <td><?php echo $rowcourse->courseID ?></td>
                    <td><?php echo $rowcourse->courseDesc ?></td>
                    <td><?php echo $rowcourse->courseDay ?></td>
                    <td><?php echo $rowcourse->courseTime ?></td>
                    <td><?php echo $rowcourse->courseRoom ?></td>
                    <td><a href="<?php echo 'delete_course.php?courseID=', $rowcourse->courseID, '&fIDNumber=', $result['fIDNumber'] ?>"> Delete</a></td>
                </tr>

            <?php
            }
            ?>
        </table>

        <h3>
            Awards
        </h3>
        <table>
            <tr>
                <th>Award Description</th>
                <th>Award Date</th>
            </tr>

            <?php
            foreach ($qResult2 as $rowaward) {
            ?>
                <tr>
                    <td><?php echo $rowaward->awardDesc ?></td>
                    <td><?php echo $rowaward->awardMonth, ' ', $rowaward->awardDate, ' ', $rowaward->awardYear ?></td>
                    <td><a href="<?php echo 'delete_award.php?awardDesc=', $rowaward->awardDesc, '&fIDNumber=', $result['fIDNumber'] ?>">Delete</a></td>
                </tr>

            <?php
            }
            ?>
        </table>

        <h3>
            Work History
        </h3>

        <table>
            <tr>
                <th>Company Name</th>
                <th>Position</th>
                <th>Years</th>
            </tr>
            <?php
            foreach ($qResult4 as $rowwork) {
            ?>
                <tr>
                    <td><?php echo $rowwork->company ?></td>
                    <td><?php echo $rowwork->companyPosition ?></td>
                    <td><?php echo $rowwork->workYear ?></td>
                </tr>

            <?php
            }
            ?>
            <br>
        </table>
    </div>
</body>

</html>