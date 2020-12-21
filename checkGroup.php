<?php
require_once 'dbconnect.php';

//$idnum = $_GET['fIDNumber'];

if (isset($_GET['userID'])) {
    $idnum = $_GET['userID'];
} else $idnum = $_GET['fIDNumber'];
$sql = "SELECT * from users inner join usergroups on users.userID = usergroups.userID inner join groupslist on usergroups.roleID = groupslist.roleID where users.userID = $idnum;";
$dbStatement = $dbconnection->prepare($sql);
$dbStatement->bindParam(1, $idnum, PDO::PARAM_INT);
$dbStatement->execute();
$qResult = $dbStatement->fetchAll(PDO::FETCH_OBJ);
if ($dbStatement->rowCount() > 0) {
    // echo 'Menu sa user. Since pwde man more than 1 group.';
} else {
    //header('Location:http://localhost');

}

?>

<head>
    <link rel="stylesheet" href="css/style.css">
</head>
<nav>
    <ul>
        <li><img src="../assets/usjr-header-logo.png"></li>
        <?php
        $myGroup;
        foreach ($qResult as $key) {
            switch ($key->roleID) {
                case 0:
                    $myGroup = 'Administrator';
        ?><li><a href="http://localhost/FIS/univadmin/univhome.php?userID=<?php echo $_GET['userID'] ?>" id="isgroup"><?php echo $myGroup ?></a></li><?php
                                                                                                                                                        break;
                                                                                                                                                    case 1:
                                                                                                                                                        $myGroup = 'University Official';
                                                                                                                                                        ?><li><a href="http://localhost/FIS/univadmin/univhome.php?userID=<?php echo $_GET['userID'] ?>" id="isgroup"><?php echo $myGroup ?></a></li><?php
                                                                                                                                                                                                                                                                                                        break;
                                                                                                                                                                                                                                                                                                    case 2:
                                                                                                                                                                                                                                                                                                        $myGroup = 'Faculty Member';
                                                                                                                                                                                                                                                                                                        ?><li><a href="http://localhost/FIS/faculty/facultyhome.php?userID=<?php echo $_GET['userID'] ?>" id="isgroup"><?php echo $myGroup ?></a></li><?php
                                                                                                                                                                                                                                                                                                                                                                                                                                                        break;
                                                                                                                                                                                                                                                                                                                                                                                                                                                    case 3:
                                                                                                                                                                                                                                                                                                                                                                                                                                                        $myGroup = 'Student';
                                                                                                                                                                                                                                                                                                                                                                                                                                                        ?><li><a href="http://localhost/FIS/students/studenthome.php?userID=<?php echo $_GET['userID'] ?>" id="isgroup"><?php echo $myGroup ?></a></li><?php
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        break;
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    case 4:
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        $myGroup = 'General User';
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        ?><li><a href="" id="isgroup"><?php echo $myGroup ?></a></li><?php
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        break;
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                } ?>


        <?php
        }
        ?>
        <li><a href="http://localhost/FIS/searchscreen/searchscreen.php?userID=<?php echo $_GET['userID'] ?>" id="isgroup">Search</a></li>
        <li><a href="http://localhost/FIS/home.php" id="isgroup">Logout</a></li>

    </ul>
</nav>