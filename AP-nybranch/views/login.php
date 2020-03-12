<?php 

include("../includes/db.php");

/*Detta block beskriver vad som händer om användarnamn eller lösenord-rutan är tom */
$username    = (!empty($_POST['username']) ? $_POST['username'] : "");
$password      = (!empty($_POST['password']) ? $_POST['password'] : "");

$username = htmlspecialchars($username);
$password = htmlspecialchars($password);

$errors = false;
$errorsMessages = "";

if (empty($username)) {
    $errorsMessages .= "Du måste skriva användarnamn! <br />";
    $errors = true;
}

if (empty($password)) {
    $errorsMessages .= "Du måste skriva ett lösenord! <br />";
    $errors = true;
}

if ($errors == true) {
    echo $errorsMessages;
    echo '<a href="../index.php">Gå tillbaka</a>';
    die;
}
/*slut på block */

print_r($_POST);

$username = $_POST['username'];
$password = md5($_POST['password']);


$query = "SELECT id, username, role, password FROM users WHERE username='$username' AND password='$password'";/*query returnerar en array med värdet från databasen*/

$return = $dbh->query($query);

$row = $return->fetch(PDO::FETCH_ASSOC);

if(empty($row)) {
    
    header("location:../index.php?err=true");

} else {
    echo "Du kan logga in";

    session_start();
    $_SESSION['username'] = $row['username'];
    $_SESSION['password'] = $row['password'];
    $_SESSION['role'] = $row['role'];
    $_SESSION['userid'] = $row['id'];

    header("location:../blog.php");

}



?>