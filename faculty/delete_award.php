<?php
require_once "dbconnect.php";

$searchKey = $_GET['awardDesc'];
$idnum = $_GET['fIDNumber'];


$sql =  "DELETE FROM grant_recipeints WHERE awardDesc =?";
$dbStatement = $dbconnection->prepare($sql);
$dbStatement->bindParam(1, $searchKey, PDO::PARAM_STR);
$dbStatement->bindParam(2, $idnum, PDO::PARAM_STR);
$dbStatement->execute(array($searchKey));
if ($dbStatement->rowCount() > 0)
   echo "Award has been deleted.";
else
   echo "No data was changed.. errors encountered";



$sql =  "DELETE FROM award WHERE awardDesc = ?";

$dbStatement = $dbconnection->prepare($sql);
$dbStatement->execute(array($searchKey));
if ($dbStatement->rowCount() > 0)
   echo "award has been deleted.";
else
   echo "No data was changed.. errors encountered";

?>

<html>

<head>
</head>

<body>
   <button><a href="<?php echo 'faculty_test.php?userID=', $idnum ?>">Go Back</a></button>
</body>

</html>