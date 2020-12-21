<?php
// var_dump($_POST);

try {
    $dbconnection = new PDO("mysql:host=localhost;dbname=Facultydb", "root", "root123");
    // var_dump($dbh);
} catch (PDOException $e) {
    echo 'failed to connect: ' . $e->getMessage();
}

// //this is a placeholder
// $sql = "INSERT INTO usjrstudent VALUES(:studid, :studfname, :studlname, :studprogram, :studcollege, :studyr)";

// $dbStatement = $dbh->prepare($sql);

// $dbStatement->bindParam(':studid', $_POST['studid'], PDO::PARAM_STR);
// $dbStatement->bindParam(':studfname', $_POST['studfname'], PDO::PARAM_STR);
// $dbStatement->bindParam(':studlname', $_POST['studlname'], PDO::PARAM_STR);
// $dbStatement->bindParam(':studprogram', $_POST['studprogram'], PDO::PARAM_INT);
// $dbStatement->bindParam(':studcollege', $_POST['studcollege'], PDO::PARAM_INT);
// $dbStatement->bindParam(':studyr', $_POST['studyr'], PDO::PARAM_INT);

// try {
//     $dbStatement->execute();
// } catch (PDOException $e) {
//     echo $e->getMessage();
// }
// if ($dbStatement->rowCount() > 0) {
//     echo 'input success';
// } else echo 'insert failed';
