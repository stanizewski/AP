<?php
include("includes/db.php");

if(isset($_GET['action']) && $_GET['action'] == "delete") { //om det finns action att göra o om den är satt så ska den deletas

    $query = "DELETE FROM comments WHERE id=". $_GET['id']; //query returnerar en array med värdet från databasen 

    $return = $dbh->exec($query); //exec returnerar false

        header("location:blog.php");

 //de ska skickas tillbaka till gästboken

}
?>

<?php

session_start();

print_r($_POST);

$content = $_POST['content'];


$query = "INSERT INTO comments (content, postid, userid) VALUES('$content', '{$_POST['postid']}', '{$_SESSION['userid']}');";
$return = $dbh->exec($query);


if (!$return) {
    print_r($dbh->errorInfo());
} else {
    header("location:commentForm.php?id={$_POST['postid']}");
}


?>





