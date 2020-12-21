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

$sql1 = "SELECT * FROM faculty_month;";
$dbStatement = $dbconnection->prepare($sql1);
$dbStatement->execute();
$qResult1 = $dbStatement->fetchAll(PDO::FETCH_OBJ);

$sql2 = "SELECT * FROM faculty_date;";
$dbStatement = $dbconnection->prepare($sql2);
$dbStatement->execute();
$qResult2 = $dbStatement->fetchAll(PDO::FETCH_OBJ);

$sql3 = "SELECT * FROM faculty_year;";
$dbStatement = $dbconnection->prepare($sql3);
$dbStatement->execute();
$qResult3 = $dbStatement->fetchAll(PDO::FETCH_OBJ);

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
                <select name="awardMonth">
                    <option hidden disabled selected value>
                        choose a month
                    </option>
                    <?php
                    foreach ($qResult1 as $rowmon) {
                        echo "<option value='$rowmon->fMonth'>$rowmon->fMonth</option>";
                    }
                    ?>
                </select>
            </section>

            <section>
                Award Date:
                <select name="awardDate">
                    <option hidden disabled selected value>
                        choose a date
                    </option>
                    <?php
                    foreach ($qResult2 as $rowd) {
                        echo "<option value='$rowd->fDate'>$rowd->fDate</option>";
                    }
                    ?>
                </select>
            </section>

            <section>
                Award Year:
                <select name="awardYear">
                    <option hidden disabled selected value>
                        choose a year
                    </option>
                    <?php
                    foreach ($qResult3 as $rowy) {
                        echo "<option value='$rowy->fYear'>$rowy->fYear</option>";
                    }
                    ?>
                </select>
            </section>

        <button type="submit">
            Submit
        </button>
    </form>
</body>

</html>