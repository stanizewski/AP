<?php

include("db.php");

$username = $_POST['username'];
$password = md5($_POST['password']);


$query = "INSERT INTO users (username, password) VALUES('$username', '$password');";
$return = $dbh->exec($query);

if (!$return) {
    print_r($dbh->errorInfo());
} else {
    header("location:index.php");
}

// SKICKAR TILLBAKA
?>