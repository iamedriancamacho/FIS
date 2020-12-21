<?php

require_once 'dbconnect.php';


$searchKey = $_POST['gsearch'];
if ($_POST['gsearch'] == '') {
    $sql = "SELECT * FROM books inner join authored_books on books.title = authored_books.title inner join faculty on authored_books.fIDNumber = faculty.fIDNumber;";
} else $sql = "SELECT * FROM books inner join authored_books on books.title = authored_books.title inner join faculty on authored_books.fIDNumber = faculty.fIDNumber where authored_books.title like '%$searchKey%';";


$dbStatement = $dbconnection->prepare($sql);
$dbStatement->execute();
$qResult = $dbStatement->fetchAll(PDO::FETCH_OBJ);

?>

<body>
    <div>
        <section>
            <table>
                <tr>
                    <th>Book Title</th>
                    <th>Faculty Name</th>
                    <th>Department</th>
                </tr>

                <?php
                foreach ($qResult as $rowbook) {
                ?>
                    <tr>
                        <td><?php echo $rowbook->title ?></td>
                        <td><?php echo $rowbook->fFirstName . " " . $rowbook->fLastName ?></td>
                        <td><?php echo $rowbook->deptID ?></td>
                    </tr>

                <?php
                }
                ?>
            </table>
        </section>
    </div>
</body>