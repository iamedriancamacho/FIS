<?php
require_once 'dbconnect.php';

$searchKey = $_GET['gsearch'];
if ($_GET['gsearch'] == '') {
    $sql = "SELECT * FROM publication_type;";
} else $sql = "SELECT * FROM publication_type where pubType like '%$searchKey%';";



$dbStatement = $dbconnection->prepare($sql);
$dbStatement->execute();
$qResult = $dbStatement->fetchAll(PDO::FETCH_OBJ);
?>

<body>
    <table>
        <tr>
            <th>Publication Type</th>
        </tr>

        <?php
        foreach ($qResult as $row) {
        ?>
            <tr>
                <td><?php echo $row->pubtype ?></td>
            </tr>

        <?php
        }
        ?>
    </table>
</body>