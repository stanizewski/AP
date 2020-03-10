<?php

include("../includes/db.php");


if(isset($_GET['action']) && $_GET['action'] == "delete") { //om det finns action att göra o om den är satt så ska den deletas. Det innebär: allt som görs under

    $query = "DELETE FROM posts WHERE id=". $_GET['id']; //query returnerar en array med värdet från databasen 

    $return = $dbh->exec($query); //exec returnerar false

    header("location:../blog.php"); 
/*Detta block kommer användas när ett inlägg ska uppdateras */
} else if(isset($_GET['action']) && $_GET['action'] == "update"){
    $title = $_POST['titel'];
    $category = $_POST['category'];
    $description = $_POST['description'];

    $query = "UPDATE posts SET titel='$title', category='$category', description='$description' WHERE id=". $_GET['id'];
    $return = $dbh->exec($query);
    header("location:../blog.php");

} else {

$titel    = (!empty($_POST['titel']) ? $_POST['titel'] : "");
$description      = (!empty($_POST['description']) ? $_POST['description'] : "");


$errors = false;
$errorsMessages = "";


if (empty($titel)) {
    $errorsMessages .= "Du måste skriva en titel! <br />";
    $errors = true; /*Om titel är tom används denna fuktion*/
}

if (empty($description)) {
    $errorsMessages .= "Du måste skriva ett inlägg! <br />";
    $errors = true;/*Om description är tom så används denna funktion*/
}


if ($errors == true) {
    echo $errorsMessages;
    echo '<a href="../adminPage.php">Gå tillbaka</a>';
    die;
}




$titel = htmlspecialchars($titel);
$description = htmlspecialchars($titel);


print_r($_POST); /*inbygd funktion för  att skriva ut/visa information i en lagrad variabel. I detta fall POST*/

$titel = $_POST['titel'];
$category = ($_POST['category']);
$postimage = ($_POST['postimage']);
$description = ($_POST['description']);
/* $id = ($_POST['id']); */


$query = "INSERT INTO posts (titel, category, image, description) VALUES('$titel', '$category', '$postimage', '$description');"; /*queryn stoppar in värde i databasen från de olika variablerna*/
$return = $dbh->exec($query);


if (!$return) {
    print_r($dbh->errorInfo());
} else {
    header("location:../blog.php");
}

}
?>