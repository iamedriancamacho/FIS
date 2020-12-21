<?php
$idnum=$_GET['fIDNumber'];
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
            Year Ended:
            <input type="text" name="companyYear">
            </section>
            <button type="submit">
            Submit
            </button>
        </form>
    </body>

</html>

