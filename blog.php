<?php
session_start();
echo (isset($_GET['err']) && $_GET['err'] == true ? "Något gick fel!" : "");


if(isset($_SESSION['username'])) {
    if($_SESSION['role'] == "admin") {
        echo "Välkommen ". $_SESSION['username'] ."! du är inloggad som admin.<br />";
        echo "<a href='adminPage.php'>Skapa ett nytt blogginlägg</a>";
    }
    else {
        echo "Välkommen ". $_SESSION['username'] ."!";
    }
    echo '<br /><a href="logout.php">Logga ut!</a>';
}

else {
    include("loginForm.php");
    echo '<a href="signupForm.php">REGISTRERA NY MEDLEM</a>';
    die;
}




?>

<hr>

<?php 

include("classes/Posts.php");
include("includes/db.php");
?>


<?php


$Posts = new BlogPost($dbh);
$Posts->fetchAll();

Foreach( $Posts->getPosts() as $post ) {
  echo "<strong>" . "Rubrik: " . "</strong>" . $post ['titel'] . "<br />"; 
  echo "<strong>" . "Datum: " . "</strong>" . $post ['date_posted'] . "<br />";
  echo "<strong>" . "Kategori: " . "</strong>" . $post ['category'] . "<br />";
  echo "<strong>" . "Bild: " . "</strong>" . $post ['image'] . "<br />";
  echo "<strong>" . "Inlägg: " . "</strong>" . $post ['description'] . "<br />";

  if(!isset($_SESSION['role']) || $_SESSION['role'] != "admin") {
  echo "<hr />";
  } else {
    echo "<a href=\"views/post.php?action=delete&id=" . $post['id'] ."\">Ta bort!</a><br />
    <a href='editPost.php'>Redigera inlägg</a> <br />";

  }
 
}


?>
