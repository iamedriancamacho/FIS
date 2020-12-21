<?php
require_once "dbconnect.php";


$idnum = $_GET['fIDNumber'];
$sql = "SELECT * FROM faculty WHERE fIDNumber = ?;";
$dbStatement = $dbconnection->prepare($sql);
$dbStatement->execute(array($idnum));
if ($dbStatement->rowCount() > 0) {
    $result = $dbStatement->fetch(PDO::FETCH_ASSOC);
} else {
    header('Location:http://localhost');
}

$sql = "SELECT * FROM publication;";
$dbStatement = $dbconnection->prepare($sql);
$dbStatement->execute();
$qResult = $dbStatement->fetchAll(PDO::FETCH_OBJ);

$sql1 = "SELECT * FROM publication_type;";
$dbStatement = $dbconnection->prepare($sql1);
$dbStatement->execute();
$qResult1 = $dbStatement->fetchAll(PDO::FETCH_OBJ);
?>

<html>

<head>
    <title>
        Add Book
    </title>
</head>

<body>
    <form action="add_book_process.php" method="post">
        <section>
            Author ID:
            <input type="text" name="fIDNumber" value="<?php echo $idnum ?>" readonly>
        </section>
        <section>
            Author Name:
            <?php echo $result['fFirstName'], ' ', $result['fLastName'] ?>
        </section>
        <section>
            <section>
                Book Title:
                <input type="text" name="bookTitle">
            </section>
            <section>
                Publisher:
                <select name="bookPub">
                    <option hidden disabled selected value>
                        choose a publication
                    </option>
                    <?php
                    foreach ($qResult as $rowpub) {
                        echo "<option value='$rowpub->pubName'>$rowpub->pubName</option>";
                    }
                    ?>
                </select>
            </section>
            <section>
                Book Type:
                <select name="bookType">
                    <option hidden disabled selected value>
                        choose a publication type
                    </option>
                    <?php
                    foreach ($qResult1 as $rowpubtype) {
                        echo "<option value='$rowpubtype->pubtype'>$rowpubtype->pubtype</option>";
                    }
                    ?>
                </select>
            </section>
            <button type="submit">
                Submit
            </button>
    </form>
</body>

</html>