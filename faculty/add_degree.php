<?php
session_start();
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

$sql = "SELECT * FROM degree_program;";
$dbStatement = $dbconnection->prepare($sql);
$dbStatement->execute();
$qResult = $dbStatement->fetchAll(PDO::FETCH_OBJ);

$sql1 = "SELECT * FROM faculty_year;";
$dbStatement = $dbconnection->prepare($sql1);
$dbStatement->execute();
$qResult1 = $dbStatement->fetchAll(PDO::FETCH_OBJ);
?>


<html>

<body>
    <?php
    echo $_SESSION['curID'];

    ?>
    <form action="add_degree_process.php" method="post">
        <section>
            Faculty ID:
            <input type="text" name="fIDNumber" value="<?php echo $idnum ?>" readonly>
        </section>

        <section>
            Degree Holder:
            <?php echo $result['fFirstName'], ' ', $result['fLastName'] ?>
        </section>

        <section>
            Degree:
            <select name="degree">
                <option hidden disabled selected value>
                    select degree
                </option>
                <?php
                foreach ($qResult as $rowdeg) {
                    echo "<option value='$rowdeg->degree'>$rowdeg->degree</option>";
                }
                ?>
            </select>
        </section>
        <section>
            Year Completed:
            <select name="degreeYear">
                <option hidden disabled selected value>
                    select year
                </option>
                <?php
                foreach ($qResult1 as $rowy) {
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