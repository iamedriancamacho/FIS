<?php
require_once "dbconnect.php";
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
    <form action="add_award_process.php" method="post">
        <section>
            Faculty ID:
            <input type="text" name="fIDNumber" value="<?php echo $idnum ?>" readonly>
        </section>

        <section>
            Awardee:
            <?php echo $result['fFirstName'], ' ', $result['fLastName'] ?>
        </section>

        <section>
            Award:
            <input type="text" name="award">
        </section>

        <section>
            Award Month:
            <input type="text" name="awardMonth">
        </section>

        <section>
            Award Date:
            <input type="text" name="awardDate">
        </section>

        <section>
            Award Year:
            <input type="text" name="awardYear">
        </section>
        <button type="submit">
            Submit
        </button>
    </form>
</body>

</html>