<?php
require_once "dbconnect.php";

$searchKey = $_GET['title'];
$idnum = $_GET['fIDNumber'];


$sql =  "DELETE FROM authored_books WHERE title IN(SELECT title FROM books WHERE title=?)";
$dbStatement = $dbconnection->prepare($sql);
$dbStatement->bindParam(1, $searchKey, PDO::PARAM_STR);
$dbStatement->execute(array($searchKey));
if ($dbStatement->rowCount() > 0)
   echo "Book has been deleted.";
else
   echo "No data was changed.. errors encountered";



$sql =  "DELETE FROM books WHERE title = ?";

$dbStatement = $dbconnection->prepare($sql);
$dbStatement->execute(array($searchKey));
if ($dbStatement->rowCount() > 0)
   echo "Book has been deleted.";
else
   echo "No data was changed.. errors encountered";




?>

<html>

<head>
</head>

<body>
   <button><a href="<?php echo 'facultyhome.php?userID=', $idnum ?>">Go Back</a></button>
</body>

</html>