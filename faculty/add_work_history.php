<?php
$idnum=$_GET['fIDNumber'];

require_once "dbconnect.php";

$sql1 = "SELECT * FROM faculty_year;";
$dbStatement = $dbconnection->prepare($sql1);
$dbStatement->execute();
$qResult1 = $dbStatement->fetchAll(PDO::FETCH_OBJ);
?>


<html>
    <body>
        <form action="add_work_history_process.php" method ="post">
            <section>
            Faculty ID:
            <input type="text" name="fIDNumber" value="<?php echo $idnum?>">
            </section>

            <section>
            Company:
            <input type="text" name="company">
            </section>

            <section>
            Company Position:
            <input type="text" name="companyPosition">
            </section>

            <section>
            Year Completed:
            <select name="workYear">
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

