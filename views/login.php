<?php 

include("db.php");

print_r($_POST);

$username = $_POST['username'];
$password = md5($_POST['password']);


$query = "SELECT id, username, role, password FROM users WHERE username='$username' AND password='$password'";

$return = $dbh->query($query);

$row = $return->fetch(PDO::FETCH_ASSOC);

if(empty($row)) {
    
    header("location:index.php?err=true");

} else {
    echo "Du kan logga in";

    session_start();
    $_SESSION['username'] = $row['username'];
    $_SESSION['password'] = $row['password'];
    $_SESSION['role'] = $row['role'];

    header("location:index.php");

}



?>