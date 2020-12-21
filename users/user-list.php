<?php
require_once 'dbconnect.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>


    <!-- css -->
    <link href="../css/style.css" rel="stylesheet" />

</head>

<body>
    <nav class="body-header-2">USER LIST</nav>
    <div class="main-body">
        <form method="post" action="edit-users.php" class="forList">
            <table name="userTable;" class="forTable">
                <tr>
                    <th> </th>
                    <th>User ID</th>
                    <th>Username</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>User Groups</th>
                </tr>

                <?php
                $sqlGetRowData = "SELECT * FROM users;";
                $result = $dbconnection->query($sqlGetRowData);

                if ($result->rowCount() > 0) {
                    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                ?>
                        <tr>
                            <td><?php echo '<button type="submit" value="' . $row['userID'] . '" name="edit">Edit</button>'; ?></td>
                            <td><?php echo $row['userID']; ?></td>
                            <td><?php echo $row['userName']; ?></td>
                            <td><?php echo $row['userFirstName']; ?></td>
                            <td><?php echo $row['userLastName']; ?></td>


                            <?php
                            $sqlGetRoles = "SELECT * FROM usergroups WHERE userID = " . $row['userID'];
                            $result2 = $dbconnection->query($sqlGetRoles);

                            if ($result2->rowCount() > 0) {
                                $cnt = 0;
                                while ($row2 = $result2->fetch(PDO::FETCH_ASSOC)) {
                                    $roles[$cnt] = $row2['roleID'];
                                    $cnt++;
                                }

                                for ($i = 0; $i < 5; $i++) {
                                    $rolesSelected[$i] = -1;
                                    for ($j = 0; $j < sizeof($roles); $j++) {
                                        if ($i == $roles[$j]) {
                                            $rolesSelected[$i] = 1;
                                            break;
                                        }
                                    }
                                }

                                for ($i = 0; $i < 5; $i++) {
                                    switch ($i) {
                                        case 0:
                                            $roleDesc = 'Administrator';
                                            break;
                                        case 1:
                                            $roleDesc = 'University Official';
                                            break;
                                        case 2:
                                            $roleDesc = 'Instructor/Faculty';
                                            break;
                                        case 3:
                                            $roleDesc = 'Student';
                                            break;
                                        case 4:
                                            $roleDesc = 'General User';
                                            break;
                                    }

                            ?>
                                    <td>
                                        <?php
                                        echo '<input type="checkbox" name="role[]" value="' . $i . '"';

                                        if ($rolesSelected[$i] == 1)
                                            echo 'checked ';
                                        echo 'disabled>
                                <label for="role">' . $roleDesc . '</label>';


                                        ?>
                                    </td>

                                <?php


                                }

                                ?>
                        </tr>
            <?php
                                unset($roles);
                                unset($rolesSelected);
                            }
                        }
                    }
            ?>
            </table>
        </form>
        </br></br>
        <form method="post" action="create-users.php" style="margin: auto; text-align: center;">
            <button type="submit" value="Create" name="create" class="body-header-button">Create User</button>
        </form>

        <!-- end DIV -->
    </div>

</body>

</html>