<?php
require 'dbconnect.php';

$searchKey = $_POST['gsearch'];
if ($_POST['gsearch'] == '') {
    $sql = "SELECT * FROM publication_type;";
} else $sql = "SELECT * FROM work_history inner join faculty on work_history.fIDNumber = faculty.fIDNumber where companyPosition like '%$searchKey%';";


$dbStatement = $dbconnection->prepare($sql);
$dbStatement->execute();
$qResult = $dbStatement->fetchAll(PDO::FETCH_OBJ);
?>

<body>
    <table>
        <tr>
            <th>Company</th>
            <th>Position</th>
            <th>Years of Work</th>
            <th>Full Name</th>
        </tr>

        <?php
        foreach ($qResult as $row) {
        ?>
            <tr>
                <td><?php echo $row->company ?></td>
                <td><?php echo $row->companyPosition ?></td>
                <td><?php echo $row->workYear ?></td>
                <td><?php echo $row->fFirstName . ' ' . $row->fLastName ?></td>
            </tr>

        <?php
        }
        ?>
    </table>
</body>