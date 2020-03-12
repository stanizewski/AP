<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    
<?php

session_start();

echo (isset($_GET['err']) && $_GET['err'] == true ? "Något gick fel!" : "");


if(isset($_SESSION['username'])) {

    echo "Hej ". $_SESSION['username'] ."!<br />";
    echo '<a href="logout.php?action=logout">Logga ut!</a>';

} else {
    include('loginForm.php');
echo '<a href="signUpForm.php">Registrera!</a>';
}
?>



</body>
</html>



