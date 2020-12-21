<?php
session_start();

if (isset($_POST['edit']))
  $_SESSION['curID'] = $_POST['edit'];

  $sqlGetUserDetails = "SELECT * FROM users WHERE userID = ?;";
  $dbStatement = $dbconnection->prepare($sqlGetUserDetails);
  $dbStatement->bindParam('1', $_SESSION['curID'], PDO::PARAM_STR);
  $dbStatement->execute();
  $result = $dbStatement->fetch(PDO::FETCH_ASSOC);

  $uName = $result['userName'];
  $fName = $result['userFirstName'];
  $lName = $result['userLastName'];

  function displayRoles($dbconnection){
    $sqlGetRoles = "SELECT * FROM usergroups WHERE userID = " . $_SESSION['curID'];
    $result2 = $dbconnection->query($sqlGetRoles);
        
    $cnt = 0;
    while ($row2 = $result2->fetch(PDO::FETCH_ASSOC)) {
        $roles[$cnt] = $row2['roleID'];
        $cnt++;
    }

    for($i=0; $i<5; $i++){
        $rolesSelected[$i] = -1;
        for($j = 0; $j < sizeof($roles); $j++){
            if($i==$roles[$j]){
                $rolesSelected[$i] = 1;
                break;  
            }
        }
    }
    return $rolesSelected;
  }
