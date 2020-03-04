<?php

include("../includes/db.php");


if(isset($_GET['action']) && $_GET['action'] == "delete") { //om det finns action att göra o om den är satt så ska den deletas. Det innebär: allt som görs under

    $query = "DELETE FROM posts WHERE id=". $_GET['id']; //query returnerar en array med värdet från databasen 

    $return = $dbh->exec($query); //exec returnerar false

    header("location:../blog.php"); //

}

$titel    = (!empty($_POST['titel']) ? $_POST['titel'] : "");
$description      = (!empty($_POST['description']) ? $_POST['description'] : "");


$errors = false;
$errorsMessages = "";


if (empty($titel)) {
    $errorsMessages .= "Du måste skriva en titel! <br />";
    $errors = true;
}

if (empty($description)) {
    $errorsMessages .= "Du måste skriva ett inlägg! <br />";
    $errors = true;
}


if ($errors == true) {
    echo $errorsMessages;
    echo '<a href="../adminPage.php">Gå tillbaka</a>';
    die;
}




$titel = htmlspecialchars($titel);
$description = htmlspecialchars($titel);


print_r($_POST);

$titel = $_POST['titel'];
$category = ($_POST['category']);
$postimage = ($_POST['postimage']);
$description = ($_POST['description']);
/* $id = ($_POST['id']); */


$query = "INSERT INTO posts (titel, category, image, description) VALUES('$titel', '$category', '$postimage', '$description');";
$return = $dbh->exec($query);


if (!$return) {
    print_r($dbh->errorInfo());
} else {
    header("location:../blog.php");
}


?>