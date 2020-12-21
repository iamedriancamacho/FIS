<?php
require_once "dbconnect.php";


$sql = "INSERT INTO award(awardDesc,awardMonth,awardDate,awardYear) VALUES(?,?,?,?);";
$dbStatement = $dbconnection->prepare($sql);
$dbStatement->bindParam(1, $_POST['award'], PDO::PARAM_STR);
$dbStatement->bindParam(2, $_POST['awardMonth'], PDO::PARAM_STR);
$dbStatement->bindParam(3, $_POST['awardDate'], PDO::PARAM_STR);
$dbStatement->bindParam(4, $_POST['awardYear'], PDO::PARAM_STR);
$dbResult = $dbStatement->execute();
if ($dbStatement->rowCount() > 0)
   echo "Data is inserted to file.";
else
   echo "No data was added.. errors encountered";


$sql = "INSERT INTO grant_recipeints VALUES(?,?)";
$dbStatement = $dbconnection->prepare($sql);
$dbStatement->bindParam(1, $_POST['award'], PDO::PARAM_STR);
$dbStatement->bindParam(2, $_POST['fIDNumber'], PDO::PARAM_STR);
$dbResult = $dbStatement->execute();
?>

<html>

<head>
</head>

<body>
   <button><a href="<?php echo 'facultyhome.php?userID=', $_POST['fIDNumber'] ?>">Go Back</a></button>
</body>

</html>