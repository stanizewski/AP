
<?php
session_start();
echo (isset($_GET['err']) && $_GET['err'] == true ? "Något gick fel!" : "");


if(isset($_SESSION['username'])) {
    if($_SESSION['role'] == "admin") {
        echo "<h1>Du är admin!</h1>";
        echo "<a href='adminPage.php'>Adminpanelen</a>";
    }
    else {
        echo "<h1>Du är inte admin!</h1>";
    }
    echo "Hej ". $_SESSION['username'] ."<br />";
    echo '<a href="logout.php">Logga ut!</a>';
}

else {
    include("loginForm.php");
    echo '<a href="signupForm.php">REGISTRERA NY MEDLEM</a>';
}


?>


