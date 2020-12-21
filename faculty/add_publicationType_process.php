<?php
require_once "dbconnect.php";

$sql = "INSERT INTO publication_type(pubType) VALUES (?);";

$dbStatement = $dbconnection->prepare($sql);
$dbStatement->bindParam(1,$_POST['pubType'],PDO::PARAM_STR);
$dbResult = $dbStatement->execute();
if($dbStatement->rowCount() > 0)
   echo "Data is inserted to file.";
else
   echo "No data was added.. errors encountered";  

?>


<html>
<head>
</head>
<body>
<button><a href="<?php echo 'faculty_list.php'?>">Go Back</a></button>
</body>
</html>