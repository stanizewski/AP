<?php
include("classes/Posts.php");
include("includes/db.php");


$query = "SELECT * FROM posts WHERE id=". $_GET['id'];


$sth =  $dbh->prepare($query); //statement handler
$sth->bindParam('id', $id); //BindParam sätter :name till variabel. PDO-funktion.

$return = $dbh->query($query); //exec returnerar false


$postdata = $return->fetch(PDO::FETCH_ASSOC);


?>




<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=
  , initial-scale=1.0">
  <title>Kommentarer</title>
</head>
<body>
  

<link rel="stylesheet" type="text/css" href="css/style.css">



<a href="blog.php">Tillbaka till bloggen</a>
<div class="comments">

<?php



echo "<div id='category'>" . "Kategori: " . "" . $postdata ['category'] . "</div>";
echo "<div id='date'>" . "Skapad " . "" . $postdata ['date_posted'] . "</div><br />";
echo "<strong><div id='rubrik'>" . " " . "</strong>" . $postdata ['titel'] . "</div><br />"; 
echo "<img src='". $postdata ['image'] ."'>" . "<br /><br />";
echo "<div id='blogpost'>" . " " . "</strong>" . $postdata ['description'] . "</div><br /><br /><br />";


?>
<hr><br />
Kommentarer <br /><br />
<form method="POST" action="comments.php">

<input type="hidden" name="postid" value="<?php echo $_GET['id']; ?> "/>
<input type="text" name="content" id="input" style="height: 100px; width: 300px;" /><br /><br />
<input type="submit" name="submit" id="kommentera" value="Kommentera" />

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
  echo "" . "Användarnamn: " . "" . $post ['username'] . "<br />"; 
  echo "<div id='date'>" . "Skapad " . "" . $post ['date_posted'] . "</div><br />"; 
  echo "<strong>" . "Kommentar<br /> " . "</strong>" . $post ['content'] . "<br /><br /><br />"; 


  if(!isset($_SESSION)){
    session_start();
}


  if(!isset($_SESSION['role']) || $_SESSION['role'] != "admin") {
  echo "<hr />";
  } else {
    echo "<a href=\"comments.php?action=delete&id=" . $post['id'] ."\">Ta bort kommentar</a><br /><hr>";
  }
   echo "<br /><br /><br /><br />";

}


?>

</div>

</body>
</html>