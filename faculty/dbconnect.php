<?php

try {
    $dbconnection = new PDO("mysql:host=127.0.0.1;dbname=facultydb", "root", "root123");
} catch (PDOException $errors) {
    echo "connection failed: " . $errors->getMessage();
}
