
<<<<<<< HEAD
=======
<?php
session_start();
echo (isset($_GET['err']) && $_GET['err'] == true ? "Något gick fel!" : "");

/* Detta block ser om användaren är admin eller inte*/
if(isset($_SESSION['username'])) {
    if($_SESSION['role'] == "admin") {
        echo "Välkommen ". $_SESSION['username'] ."! du är inloggad som admin.<br />";
        echo "<a href='adminPage.php'>Skapa ett nytt blogginlägg</a>";
    }
    else {
        echo "<h1>Du är inte admin!</h1>";
    }
    echo '<br /><a href="logout.php">Logga ut!</a>';
}

else {
    include("loginForm.php");
    echo '<br /><a href="signupForm.php" id="newmember">Ny medlem</a>';
}


?>

<hr>
>>>>>>> 28e681bab9fc343ca16ad464b3b04bd7a4d3e89e

