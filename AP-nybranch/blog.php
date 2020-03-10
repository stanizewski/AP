<link rel="stylesheet" type="text/css" href="css/style.css">
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Millhouse Blogg</title>
</head>
<body>
<div class="blogposts">
<?php

/* Sessionen gör så att man kan logga in eller registera ny medlem */
session_start();
echo (isset($_GET['err']) && $_GET['err'] == true ? "Något gick fel!" : "");


if(isset($_SESSION['username'])) {
    if($_SESSION['role'] == "admin") {
        echo "Välkommen ". $_SESSION['username'] ."! du är inloggad som admin.<br /><br />";
        echo "<a id='btn' href='adminPage.php'>Nytt inlägg</a>";
    }
    else {
        echo "Välkommen ". $_SESSION['username'] ."!";
    }
    echo '<br /><a href="logout.php">Logga ut!</a><br /><br /><br />';
    echo '<div id="blogrubrik"> Millhouse Blogg</div><br />';
}

else {
    include("loginForm.php");
    echo '<a href="signupForm.php">REGISTRERA NY MEDLEM</a>';
    die; /* avslutar sessionen*/
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
  echo "<div id='category'>" . "Kategori: " . "" . $post ['category'] . "</div>";
  echo "<div id='date'>" . "Skapad " . "" . $post ['date_posted'] . "</div><br />";
  echo "<strong><div id='rubrik'>" . " " . "</strong>" . $post ['titel'] . "</div><br />"; 
  echo "<strong>" . "(Bild)" . "</strong>" . $post ['image'] . "<br /><br />";
  echo "<div id='blogpost'>" . " " . "</strong>" . $post ['description'] . "</div><br /><br /><br />";
  echo "<a href=\"commentForm.php?id=" . $post['id'] ."\">Kommentarer</a> <br />";
  if(!isset($_SESSION['role']) || $_SESSION['role'] != "admin") {
  echo "<hr />";
  } else {
    echo "<a href=\"views/post.php?action=delete&id=" . $post['id'] ."\">Ta bort inlägg</a><br />
    <a href=\"editPost.php?id=" . $post['id'] ."\">Redigera inlägg</a> <br />
    ";

  }
  echo "<br /><br /><hr><br /><br />";

 
}


?>
</div>
</body>
</html>
