<!-- <pre>

/*
include("db.php");


print_r($_POST);

$username   = (!empty($_POST['username']) ? $_POST['username'] : ""); 
$password   = (!empty($_POST['password']) ? $_POST['password'] : "");


$query = "INSERT INTO users (username,password) VALUES ('$username', '$password');";
$return = $dbh->exec($query);

if(!$return)
print_r($dbh->errorInfo());

 else {
header("location:login.php");
}
?>*/
// </pre>  -->


<?php


include("db.php");

$username = $_POST['username'];
$password = md5($_POST['password']);

$query = "SELECT id, username, password FROM users WHERE username='$username' AND password='$password'";

$return = $dbh->query($query);

$row = $return->fetch(PDO::FETCH_ASSOC);


if(empty($row)) {

    header("location:login.php?err=true");

} else {
    echo "Du kan logga in";

    session_start();
    $_SESSION['username'] = $row['username'];
    $_SESSION['password'] = $row['password'];

    header("location:login.php");
}




?>
