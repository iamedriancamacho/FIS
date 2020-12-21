<?php
require_once "dbconnect.php";

$sql3 = "SELECT count(courseID) FROM course;";
$dbStatement = $dbconnection->prepare($sql3);
$dbStatement->execute();
$qResult = $dbStatement->fetch(PDO::FETCH_ASSOC);

$idnum = $_GET['fIDNumber'];
$sql = "SELECT * FROM faculty WHERE fIDNumber = ?;";
$dbStatement = $dbconnection->prepare($sql);
$dbStatement->execute(array($idnum));
if ($dbStatement->rowCount() > 0) {
    $result = $dbStatement->fetch(PDO::FETCH_ASSOC);
} else {
    header('Location:http://localhost');
}
?>

<html>

<body>
    <form action="add_course_process.php" method="post">
        <section>
            Course ID:
            <input type='number' name="courseID" value="<?php echo $qResult['count(courseID)'] += 1 ?>" readonly>
        </section>
        <section>
            Course Description:
            <input type="text" name="courseDesc">
        </section>
        <section>
            Course Day:
            <input type="text" name="courseDay">
        </section>
        <section>
            Course Time:
            <input type="text" name="courseTime">
        </section>
        <section>
            Course Room:
            <input type="text" name="courseRoom">
        </section>
        <section>
            Faculty ID:
            <input type="text" name="fIDNumber" value="<?php echo $idnum ?>" readonly>
        </section>
        <section>
            Faculty:
            <?php echo $result['fFirstName'], ' ', $result['fLastName'] ?>
        </section>

        <button type="submit">
            Submit
        </button>
    </form>
</body>

</html>