<?php
require_once "dbconnect.php";

$sql = "SELECT * FROM faculty;";
$dbStatement = $dbconnection->prepare($sql);
$dbStatement->execute();
$qResult = $dbStatement->fetchAll(PDO::FETCH_OBJ);

?>

<html>

<head>
    <!-- css -->
    <link href="../css/style.css" rel="stylesheet" />
</head>

<body>

    <table>
        <tr>
            <th>Family Name</th>
            <th>First Name</th>
            <th>Email address</th>
            <th>Department</th>
        </tr>

        <?php
        foreach ($qResult as $rowfaculty) {
        ?>
            <tr>
                <td><?php echo $rowfaculty->fLastName ?></td>
                <td><?php echo $rowfaculty->fFirstName ?></td>
                <td><?php echo $rowfaculty->fEmailAdd ?></td>
                <td><?php echo $rowfaculty->deptID ?></td>
                <td><a href="<?php echo '../faculty/facultyhome.php?userID=', $rowfaculty->fIDNumber ?>">Open</a></td>
            </tr>

        <?php
        }
        ?>
    </table>

    <section class="sectionB">
        <button><a href="<?php echo '../faculty/add_publication.php' ?>">Add Publication</a></button>
        <button><a href="<?php echo '../faculty/add_publicationType.php' ?>">Add Publication Type</a></button>
    </section>

</body>

</html>