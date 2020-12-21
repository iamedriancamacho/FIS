<?php
require_once "dbconnect.php";

$idnum = $_GET['userID'];


$sql =  "DELETE FROM faculty WHERE fIDNumber = ?";
$dbStatement = $dbconnection->prepare($sql);
$dbStatement->bindParam(1, $searchKey, PDO::PARAM_STR);
$dbStatement->execute(array($idnum));
if ($dbStatement->rowCount() > 0)
   echo "Faculty Data has been deleted.";
else
   echo "No data was changed.. errors encountered";




?>

<html>

<head>
</head>

<body>
   <button><a href="<?php echo 'faculty_list.php?userID=', $idnum ?>">Go Back</a></button>
</body>

</html>