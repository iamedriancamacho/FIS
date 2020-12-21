<?php
require_once 'dbconnect.php';

// count userID
$sqlCount = "SELECT count(userID) from users";
$dbStatement = $dbconnection->prepare($sqlCount);
$dbResult = $dbStatement->execute();
$qCount = $dbStatement->fetch(PDO::FETCH_ASSOC);

?>

<body>
    <section style="text-align: center;">
        <form action="create-users-portal-process.php" method="get">

            Email<br><input type="text" name="email" required><br>
            Department ID<br>
            <select name="group" id="group">
                <option value="SAMS">School of Allied Medical Sciences</option>
                <option value="SAS">School of Arts and Sciences</option>
                <option value="SBM">School of Business and Management</option>
                <option value="SCS" selected>School of Computer Studies</option>
                <option value="SE">School of Education</option>
                <option value="SEng">School of Engineering</option>
                <option value="SL">School of Law</option>
            </select>

            <section style="text-align: center;">
                <input type="submit" value="Sign Up" name="submit" class="body-header-button" style="width: 40%; ">
            </section>

        </form>

    </section>
</body>

<?php
$sqlportal = "INSERT INTO faculty(fIDNumber, fFirstName, fLastName, fEmailAdd, deptID) VALUES(?,?,?,?,?);";
$dbStatement = $dbconnection->prepare($sqlportal);
$dbStatement->bindParam(1, $qCount['count(userID)'], PDO::PARAM_STR);
$dbStatement->bindParam(2, $_POST['fname'], PDO::PARAM_STR);
$dbStatement->bindParam(3, $_POST['lname'], PDO::PARAM_STR);
$dbStatement->bindParam(4, $_POST['email'], PDO::PARAM_STR);
$dbStatement->bindParam(5, $_POST['group'], PDO::PARAM_STR);
$dbStatement->execute();

// if ($dbStatement->rowCount() > 0)
//     echo "Data is inserted to file.";
// else
//     echo "No data was added.. errors encountered";

?>