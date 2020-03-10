<?php

include("includes/db.php");


$username    = (!empty($_POST['username']) ? $_POST['username'] : "");
$password      = (!empty($_POST['password']) ? $_POST['password'] : ""); /* */

$getusername = ("SELECT * FROM users WHERE username = '$username'");
$return = $dbh->prepare($getusername);
$return->execute();



if ($return->rowCount() > 0) {
    echo '<h1>Upptaget användarnamn! Välj ett nytt</h1>';
    die;
} /* Denna fuktion körs om använadnamnet är upptaget */


$username = htmlspecialchars($username);
$password = htmlspecialchars($password); /* Funktionen konventerar vissa fördefinierade tecken till HTML-enheter */

$errors = false;
$errorsMessages = "";


if (empty($username)) {
    $errorsMessages .= "Du måste skriva användarnamn! <br />";
    $errors = true; /*Om fältet användarnamn är tom kommer denna funktion användas*/
}

if (empty($password)) {
    $errorsMessages .= "Du måste skriva ett lösenord! <br />";
    $errors = true; /*Om fältet lösenord är tom kommer denna fuktion användas */
}

if ($errors == true) {
    echo $errorsMessages;
    echo '<a href="signupForm.php">Gå tillbaka</a>';
    die;
}


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
