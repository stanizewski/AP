<?php
include("db.php");

if(isset($_GET['action']) && $_GET['action'] == "delete") { //om det finns action att göra o om den är satt så ska den deletas. Det innebär: allt som görs under

    $query = "DELETE FROM messages WHERE id=". $_GET['id']; //query returnerar en array med värdet från databasen 

    $Id = htmlspecialchars($id);

    $sth =  $dbh->prepare($query); //statement handler
    $sth->bindParam('id', $id); //BindParam sätter :name till variabel. PDO-funktion.

    $return = $dbh->exec($query); //exec returnerar false

    header("location:index.php"); //de ska skickas tillbaka till gästboken
} else {


    $message    = (!empty($_POST['message']) ? $_POST['message'] : "");
    $name       = (!empty($_POST['name']) ? $_POST['name'] : "");

    $message = htmlspecialchars($message);
    $name = htmlspecialchars($name);

    $errors = false;
    $errorsMessages = "";

    if (empty($message)) {
        $errorMessages .= "Du måste skriva ett meddelande! <br />";
        $errors = true;
    }

    if (empty($name)) {
        $errorMessages .= "Du måste skriva ett namn! <br />";
        $errors = true;
    }

    if ($errors == true) {
        echo $errorMessages;
        echo '<a href="index.php">Gå tillbaka</a>';
        die;
    }



    $query = "INSERT INTO messages (name, message) VALUES('$name', '$message');";
    $sth = $dbh->prepare($query);
    $sth->bindParam(':name', $name);
    $sth->bindParam(':message', $message);

    $return = $sth->execute();

    //$return = $dbh->exec($query);

    if (!$return) {
        print_r($dbh->errorInfo());
    } else {
        header("location:index.php");
    }
}
