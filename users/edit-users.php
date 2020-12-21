<?php
require_once 'dbconnect.php';
require 'edit-users-details.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- css -->
    <link href="../css/style.css" rel="stylesheet" />
</head>

<body>
    <?php require '../checkGroup.php'; ?>
    <nav class="body-header-2">EDIT USERS</nav>
    <div class="main-body">
        <section style="text-align: center;">
            <form action="" method="post" class="cuser">
                <span class="form-labels">Username</span> <input type="text" name="uname" placeholder="<?php echo (isset($uName)) ? $uName : ''; ?>"><br>
                <span class="form-labels">First Name</span> <input type="text" name="fname" placeholder="<?php echo (isset($fName)) ? $fName : ''; ?>"><br>
                <span class="form-labels">Last Name</span> <input type="text" name="lname" placeholder="<?php echo (isset($lName)) ? $lName : ''; ?>"><br>

                </br>Select Role:</br>
                <?php $r = displayRoles($dbconnection); ?>
                <input type="checkbox" name="role[]" value="0" <?php echo ($r[0] == 1) ? 'checked ' : ''; ?>>
                <label for="role1">Administrator</label></br>
                <input type="checkbox" name="role[]" value="1" <?php echo ($r[1] == 1) ? 'checked ' : ''; ?>>
                <label for="role2">University Official</label></br>
                <input type="checkbox" name="role[]" value="2" <?php echo ($r[2] == 1) ? 'checked ' : ''; ?>>
                <label for="role3">Instructor/Faculty</label></br>
                <input type="checkbox" name="role[]" value="3" <?php echo ($r[3] == 1) ? 'checked ' : ''; ?>>
                <label for="role4">Student</label></br>
                <input type="checkbox" name="role[]" value="4" <?php echo ($r[4] == 1) ? 'checked ' : ''; ?>>
                <label for="role5">General User</label></br>
                <br><br>

                <input type="submit" value="Update" name="update" onclick="window.location.href = 'user-list.php'">
                <input type="submit" value="Delete" name="delete">
            </form>
        </section>
        <form action="user-list.php" method="post">
            <button type="submit" value="View" name="create">View User List</button>
        </form>
    </div>

    <?php

    function delFromTable($table, $dbconnection, $target)
    {
        $sqlDelElements = 'DELETE FROM ' . $table . ' WHERE userID = ?;';
        $dbStatement = $dbconnection->prepare($sqlDelElements);
        $dbStatement->bindParam('1', $target, PDO::PARAM_STR);
        $dbStatement->execute();
    }

    function upUser($dbconnection, $userDetails)
    {
        $sqlUpdateUser = 'UPDATE users SET userName = ?, userFirstName = ?, userLastName = ? WHERE userID = ?';
        $dbStatement = $dbconnection->prepare($sqlUpdateUser);
        $dbStatement->execute($userDetails);
    }

    function addRole($dbconnection, $target)
    {
        if (isset($_POST['role'])) {
            $roleItems = $_POST['role'];
            $cnt = 0;

            foreach ($roleItems as $role) {
                $userRoleSelected[$cnt] = $role;
                $cnt++;
            }

            for ($i = 0; $i < sizeof($userRoleSelected); $i++) {
                $userRole = [
                    $target,
                    $userRoleSelected[$i]
                ];

                $sqlAssignRole = 'INSERT INTO usergroups VALUES(null,?,?)';
                $dbStatement = $dbconnection->prepare($sqlAssignRole);
                $dbStatement->execute($userRole);
            }
        }
    }

    if (isset($_POST['update'])) {
        if (isset($_POST['uname'])) {
            if ($_POST['uname'] == '')
                $userName = $uName;
            else
                $userName = $_POST['uname'];
        }
        if (isset($_POST['fname'])) {
            if ($_POST['fname'] == '')
                $userFName = $fName;
            else
                $userFName = $_POST['fname'];
        }
        if (isset($_POST['lname'])) {
            if ($_POST['lname'] == '')
                $userLName = $lName;
            else
                $userLName = $_POST['lname'];
        }

        $userAcct = [
            $userName,
            $userFName,
            $userLName,
            $_SESSION['curID']
        ];

        upUser($dbconnection, $userAcct);
        delFromTable('usergroups', $dbconnection, $_SESSION['curID']);
        addRole($dbconnection, $_SESSION['curID']);
    }

    if (isset($_POST['delete'])) {
        delFromTable('usergroups', $dbconnection, $_SESSION['curID']);
        delFromTable('users', $dbconnection, $_SESSION['curID']);
    }

    ?>
    </br></br>

</body>

</html>