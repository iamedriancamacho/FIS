<?php
require_once '../dbconnect.php';
$tempMessage = '';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Faculty Information System</title>

    <!-- css -->
    <link href="../css/style.css" rel="stylesheet" />
</head>

<body>
    <nav class="body-header-2">
        <section>CREATE USER</section>
    </nav>
    <div class="main-body">


        <form method="post" class="cuser">
            <section style="text-align: center;">
                Username<br><input type="text" name="uname" required><br>
                Password<br><input type="password" name="pass" required><br>
                First Name<br><input type="text" name="fname" required><br>
                Last Name<br><input type="text" name="lname" required><br>
            </section>

            <section style="padding-left: 30%;">
                <br> Select Role: <br>
                <input type="checkbox" name="role[]" value="0">
                <label for="role1">Administrator</label><br>
                <input type="checkbox" name="role[]" value="1">
                <label for="role2">University Official</label><br>
                <input type="checkbox" name="role[]" value="2">
                <label for="role3">Instructor/Faculty</label><br>
                <input type="checkbox" name="role[]" value="3">
                <label for="role4">Student</label><br>
                <input type="checkbox" name="role[]" value="4">
                <label for="role5">General User</label>
            </section>
            <br>
            <section style="text-align: center;">

                <input type="submit" value="Sign Up" name="submit" class="body-header-button" style="width: 40%; ">

            </section>
        </form>
        <span><a href="../home.php">Go back</a></span>

        <?php

        if (isset($_POST['submit'])) {

            //insert user acct-----------------------------------------------------
            $userAcct = [
                $_POST['uname'],
                password_hash($_POST['pass'], PASSWORD_BCRYPT),
                $_POST['fname'],
                $_POST['lname']
            ];

            //checks for username duplicates
            $isDuplicate = false;

            $sqlCheck = "SELECT userName FROM users;";
            $dbStatement = $dbconnection->prepare($sqlCheck);
            $dbStatement->execute();
            $qResult = $dbStatement->fetchAll(PDO::FETCH_ASSOC);
            foreach ($qResult as $row) {
                $tempCmp = strcmp($userAcct[0], $row['userName']);
                if ($tempCmp == 0) {
                    $isDuplicate = true;
                    $tempMessage = 'Username already exists' . '<br>';
                }
            }

            if (!$isDuplicate) {
                $sqlCreateUser = "INSERT IGNORE INTO users VALUES(null,?,?,?,?);";
                $dbStatement = $dbconnection->prepare($sqlCreateUser);
                $dbResult = $dbStatement->execute($userAcct);
            }

            if ($dbStatement->rowCount() > 0 && !$isDuplicate && !empty($userAcct[0])) {
                $tempMessage = 'User created successfully';
                //header('location: login.php');
            }


            if (!$isDuplicate) {
                //get user ID----------------------------------------------------------
                $sqlGetUID = "SELECT * FROM users WHERE userName = ?;";
                $dbStatement = $dbconnection->prepare($sqlGetUID);
                $dbStatement->bindParam('1', $_POST['uname'], PDO::PARAM_STR);
                $dbStatement->execute();
                $result = $dbStatement->fetch(PDO::FETCH_ASSOC);
                $uID = $result['userID'];

                //set roles-----------------------------------------------------------
                if (isset($_POST['role'])) {
                    $roleItems = $_POST['role'];
                    $cnt = 0;

                    foreach ($roleItems as $role) {
                        $userRoleSelected[$cnt] = $role;
                        $cnt++;
                    }

                    for ($i = 0; $i < sizeof($userRoleSelected); $i++) {
                        $userRole = [
                            $uID,
                            $userRoleSelected[$i]
                        ];
                        if ($userRoleSelected[$i] == 2) { //checks if user-create ky naay faculty
                            $tempMessage = 'This user requires a Department ID';



                            //THIS IS THE PORTAL FOR FACULTY
        ?> <section class='cuser'>
                                <?php require 'create-faculty-portal.php'; ?>

                            </section> <?php
                                    }
                                    $sqlAssignRole = 'INSERT INTO usergroups VALUES(null,?,?)';
                                    $dbStatement = $dbconnection->prepare($sqlAssignRole);
                                    $dbStatement->execute($userRole);
                                }
                                //var_dump($userRole);
                            }
                        }
                    }

                    //delete/edit role
                    //delete/edit user info
                                        ?>

        <section class="errorM"><?php echo $tempMessage ?></section>
        <!-- end of main-body -->
    </div>


</body>

</html>