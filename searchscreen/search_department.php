<?php
require_once 'dbconnect.php';

$searchKey = $_GET['gsearch'];
if ($_GET['gsearch'] == '') {
    $sql = "SELECT * FROM department;";
} else $sql = "SELECT * FROM department where deptName like '%$searchKey%';";

$dbStatement = $dbconnection->prepare($sql);
$dbStatement->execute();
$qResult = $dbStatement->fetchAll(PDO::FETCH_OBJ);
?>

<body>
    <table>
        <tr>
            <th>Dept. ID</th>
            <th>Department Name</th>
            <th>Telephone No.</th>
            <th>Campus address</th>
        </tr>

        <?php
        foreach ($qResult as $row) {
        ?>
            <tr>
                <td><?php echo $row->deptID ?></td>
                <td><?php echo $row->deptName ?></td>
                <td><?php echo $row->telephoneNumber ?></td>
                <td><?php echo $row->address ?></td>
            </tr>

        <?php
        }
        ?>
    </table>
</body>