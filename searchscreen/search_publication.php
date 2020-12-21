<?php
require_once 'dbconnect.php';

$searchKey = $_POST['gsearch'];
if ($_POST['gsearch'] == '') {
    $sql = "SELECT * FROM publication;";
} else $sql = "SELECT * FROM publication where pubName like '%$searchKey%';";


$dbStatement = $dbconnection->prepare($sql);
$dbStatement->execute();
$qResult = $dbStatement->fetchAll(PDO::FETCH_OBJ);
?>

<body>
    <table>
        <tr>
            <th>Publication Name</th>
            <th>Publication Address</th>
        </tr>

        <?php
        foreach ($qResult as $row) {
        ?>
            <tr>
                <td><?php echo $row->pubName ?></td>
                <td><?php echo $row->pubAddress ?></td>
            </tr>

        <?php
        }
        ?>
    </table>
</body>