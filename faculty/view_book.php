<?php
require_once "dbconnect.php";
$idnum = $_GET['fIDNumber'];

$booktitle = $_GET['title'];
$sql = "SELECT * FROM books WHERE title =?;";
$dbStatement = $dbconnection->prepare($sql);
$dbStatement->execute(array($booktitle));
$result = $dbStatement->fetch(PDO::FETCH_ASSOC);

$sql = "SELECT * FROM faculty where fIDNumber in (select fIDNumber from authored_books where title=?)";
$dbStatement = $dbconnection->prepare($sql);
$dbStatement->bindParam(1, $result['title'], PDO::PARAM_STR);
$dbStatement->execute();
$qResult = $dbStatement->fetchAll(PDO::FETCH_OBJ);
?>

<html>

<body>



    <p>
        <label>
            Book Title:
            <?php echo $result['title'] ?>
        </label>
    </p>

    <p>
        <label>
            Publisher:
            <?php echo $result['pubName'] ?>
        </label>
    </p>

    <p>
        <label>
            Publication Type:
            <?php echo $result['pubType'] ?>
        </label>
    </p>

    <p>
        Authors:
        <br>
        <?php
        foreach ($qResult as $rowauthor) {
            echo $rowauthor->fLastName, ' ', $rowauthor->fFirstName, '<br>';
        }
        ?>
    </p>


    <!-- <button><a href="<?php echo 'faculty_test.php?fIDNumber=', $idnum ?>">Go Back</a></button> -->
    <button onclick="goBack()">Go Back</button>

    <script>
        function goBack() {
            window.history.back();
        }
    </script>


</body>

</html>