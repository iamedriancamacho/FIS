<?php
require_once "dbconnect.php";


$sql = "INSERT INTO  work_history(company,companyPosition,workYear,fIDNumber) VALUES(?,?,?,?);";

$dbStatement = $dbconnection->prepare($sql);

$dbStatement->bindParam(1, $_POST['company'], PDO::PARAM_STR);
$dbStatement->bindParam(2, $_POST['companyPosition'], PDO::PARAM_STR);
$dbStatement->bindParam(3, $_POST['companyYear'], PDO::PARAM_STR);
$dbStatement->bindParam(4, $_POST['fIDNumber'], PDO::PARAM_STR);
$dbResult = $dbStatement->execute();
if ($dbStatement->rowCount() > 0)
   echo "Data is inserted to file.";
else
   echo "No data was added.. errors encountered";

?>

<html>

<head>
</head>

<body>
   <button><a href="<?php echo 'http://localhost/FIS/faculty/facultyhome.php?userID=', $_POST['fIDNumber'] ?>">Go Back</a></button>
</body>

</html>