<?php
require_once "dbconnect.php";


$sql = "INSERT INTO course VALUES(?,?,?,?,?)";
$dbStatement = $dbconnection->prepare($sql);
$dbStatement->bindParam(1, $_POST['courseID'], PDO::PARAM_STR);
$dbStatement->bindParam(2, $_POST['courseDesc'], PDO::PARAM_STR);
$dbStatement->bindParam(3, $_POST['courseDay'], PDO::PARAM_STR);
$dbStatement->bindParam(4, $_POST['courseTime'], PDO::PARAM_STR);
$dbStatement->bindParam(5, $_POST['courseRoom'], PDO::PARAM_STR);
$dbResult = $dbStatement->execute();

$sql = "INSERT INTO  courses_taught(courseID,fIDNumber) VALUES(?,?);";
$dbStatement = $dbconnection->prepare($sql);
$dbStatement->bindParam(1, $_POST['courseID'], PDO::PARAM_STR);
$dbStatement->bindParam(2, $_POST['fIDNumber'], PDO::PARAM_STR);
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