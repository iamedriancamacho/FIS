<?php
require_once "dbconnect.php";


$sql = "INSERT INTO  books(title,pubName,pubtype) VALUES(?,?,?);";

$dbStatement = $dbconnection->prepare($sql);

$dbStatement->bindParam(1, $_POST['bookTitle'], PDO::PARAM_STR);
$dbStatement->bindParam(2, $_POST['bookPub'], PDO::PARAM_STR);
$dbStatement->bindParam(3, $_POST['bookType'], PDO::PARAM_STR);
$dbResult = $dbStatement->execute();
if ($dbStatement->rowCount() > 0)
   echo "Data is inserted to file.";
else
   echo "No data was added.. errors encountered";


$sql = "INSERT INTO authored_books VALUES(?,?)";
$dbStatement = $dbconnection->prepare($sql);
$dbStatement->bindParam(1, $_POST['fIDNumber'], PDO::PARAM_STR);
$dbStatement->bindParam(2, $_POST['bookTitle'], PDO::PARAM_STR);
$dbResult = $dbStatement->execute();
?>

<html>

<head>
</head>

<body>
   <button><a href="<?php echo 'http://localhost/FIS/faculty/facultyhome.php?userID=', $_POST['fIDNumber'] ?>">Go Back</a></button>
</body>

</html>