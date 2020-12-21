<?php
require_once 'dbconnect.php';

$searchKey = $_POST['gsearch'];
if ($_POST['gsearch'] == '') {
    $sql = "SELECT * FROM authored_books inner join faculty where authored_books.fIDNumber = faculty.fIDNumber;";
} else $sql = "SELECT * FROM authored_books inner join faculty on faculty.fIDNumber = authored_books.fIDNumber where title like '%$searchKey%';";

$dbStatement = $dbconnection->prepare($sql);
$dbStatement->execute();
$qResult = $dbStatement->fetchAll(PDO::FETCH_OBJ);
?>

<body>
    <table>
        <tr>
            <th>Book Title</th>
            <th>Full Name</th>
        </tr>

        <?php
        foreach ($qResult as $row) {
        ?>
            <tr>
                <td><?php echo $row->title ?></td>
                <td><?php echo $row->fFirstName . ' ' . $row->fLastName ?></td>
            </tr>

        <?php
        }
        ?>
    </table>
</body>