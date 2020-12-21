<?php
require_once 'dbconnect.php';
// count userID
$sqlCount = "SELECT count(userID) from users";
$dbStatement = $dbconnection->prepare($sqlCount);
$dbResult = $dbStatement->execute();
$qCount = $dbStatement->fetch(PDO::FETCH_ASSOC);

$idNum = $qCount['count(userID)'];
$tempemail = $_GET['email'];
$tempdep = $_GET['group'];
//THIS PART WONT GO TO INSERT

$sqlportal = "UPDATE `facultydb`.`faculty` SET `fEmailAdd` = '$tempemail', `deptID` = '$tempdep' WHERE (`fIDNumber` = '$idNum');";
$dbStatement = $dbconnection->prepare($sqlportal);
$dbStatement->execute();

if ($dbStatement->rowCount() > 0)
    echo "Data is inserted to file.";
else
    echo "No data was added.. errors encountered";

//header('location: login.php');
?>

<body>
    <button><a href="<?php echo 'login.php' ?>">Go Back</a></button>
</body>