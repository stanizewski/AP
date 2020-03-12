använd inte!!!
<?php
include("includes/db.php");

/*Detta block används om man lämnar username eller password tomt */
$username    = (!empty($_POST['username']) ? $_POST['username'] : "");
$password      = (!empty($_POST['password']) ? $_POST['password'] : "");

$username = htmlspecialchars($username);
$password = htmlspecialchars($password);

$errors = false;
$errorsMessages = "";

if (empty($username)) {
    $errorMessages .= "Du måste skriva användarnamn! <br />";
    $errors = true;
}

if (empty($password)) {
    $errorMessages .= "Du måste skriva ett lösenord! <br />";
    $errors = true;
}

if ($errors == true) {
    echo $errorMessages;
    echo '<a href="index.php">Gå tillbaka</a>';
    die;
} /*Block slut */



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


if(isset($_GET['action']) && $_GET['action'] == "delete") { //om det finns action att göra o om den är satt så ska den deletas. Det innebär: allt som görs under

    

    $query = "DELETE FROM messages WHERE id=". $_GET['id']; //query returnerar en array med värdet från databasen 

    $Id = htmlspecialchars($id);

    $sth =  $dbh->prepare($query); //statement handler
    $sth->bindParam('id', $id); //BindParam sätter :name till variabel. PDO-funktion.

    $return = $dbh->exec($query); //exec returnerar false

    header("location:index.php"); //de ska skickas tillbaka till gästboken
} else {

/*Detta block används om man lämnar username eller password tomt */
    $username    = (!empty($_POST['username']) ? $_POST['username'] : "");
    $password      = (!empty($_POST['password']) ? $_POST['password'] : "");

    $username = htmlspecialchars($username);
    $password = htmlspecialchars($password);

    $errors = false;
    $errorsMessages = "";

    if (empty($username)) {
        $errorMessages .= "Du måste skriva användarnamn! <br />";
        $errors = true;
    }

    if (empty($password)) {
        $errorMessages .= "Du måste skriva ett lösenord! <br />";
        $errors = true;
    }

    if ($errors == true) {
        echo $errorMessages;
        echo '<a href="index.php">Gå tillbaka</a>';
        die;
    } /*Block slut */



    $query = "INSERT INTO messages (name, message) VALUES('$name', '$message');"; /*Query sätter in värde i databasen */
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
