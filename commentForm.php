


<h1>Kommentarer</h1>
<form method="POST" action="comments.php">

Kommentar:
<input type="hidden" name="postid" value="<?php echo $_GET['id']; ?> "/>
<input type="text" name="content" style="height: 100px; width: 300px;" />
<input type="submit" name="submit" value="Kommentera" />

<br /> <br /> <br />

<?php 

include("classes/Comments.php");
include("includes/db.php");
?>

<?php

$Posts = new BlogComment($dbh);
$Posts->fetchAll($_GET['id']);


Foreach( $Posts->getPosts() as $post ) {
  echo "<center>";
  echo "<strong>" . "AnvändarID: " . "</strong>" . $post ['userid'] . "<br />"; 
  echo "<strong>" . "Tid: " . "</strong>" . $post ['date_posted'] . "<br />"; 
  echo "<strong>" . "Kommentar: " . "</strong>" . $post ['content'] . "<br />"; 




session_start();

  if(!isset($_SESSION['role']) || $_SESSION['role'] != "admin") {
  echo "<hr />";
  } else {
    echo "<a href=\"comments.php?action=delete&id=" . $post['id'] ."\">Ta bort!</a><br />";
  }
   echo "<br /><br /><hr><br /><br />";

}


?>