<?php
require_once "dbconnect.php";

$sql = "SELECT * FROM books inner join authored_books on books.title = authored_books.title inner join faculty on authored_books.fIDNumber = faculty.fIDNumber;";
$dbStatement = $dbconnection->prepare($sql);
$dbStatement->execute();
$qResult = $dbStatement->fetchAll(PDO::FETCH_OBJ);

?>

<body>
    <div>
        <section>
            <table>
                <tr>
                    <th>Department</th>
                    <th>Faculty Name</th>
                    <th>Book Title</th>
                    <th>Publication Name</th>
                    <th>Publication Type</th>
                </tr>

                <?php
                foreach ($qResult as $rowbook) {
                ?>
                    <tr>
                        <td><?php echo $rowbook->deptID ?></td>
                        <td><?php echo $rowbook->fFirstName . " " . $rowbook->fLastName ?></td>
                        <td><?php echo $rowbook->title ?></td>
                        <td><?php echo $rowbook->pubName ?></td>
                        <td><?php echo $rowbook->pubType ?></td>
                    </tr>

                <?php
                }
                ?>
            </table>
        </section>
    </div>
</body>