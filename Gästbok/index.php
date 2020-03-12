<?php
include("db/db.php");
include("classes/gbpost.php");

?>

<html>
<head>

</head>
<body>
<h1> <marquee> Gästbok! </marquee></h1>

<center>

 <form method="GET" action="index.php">
    <input type="search" name="search_query" />
    <input type="submit" value="SÖK!" />
 </form>

</center>

<hr />

<?php


if(isset($_GET['search_query'])) {
  $searchQuery = $_GET['search_query'];

  $order = "desc";

  if(isset($_GET['order']) && $_GET['order'] == "ascending"){
    $order = "asc";
  }


$query = "SELECT id,name,message,date_posted FROM messages WHERE name LIKE '%$searchQuery%' OR message LIKE '%$searchQuery%' ORDER BY date_posted $order"; 
/* $rows = $dbh->query($query); */

if(!$rows) {
    print_r($dbh->errorInfo());
    die;
}

echo "<h2>Sökresultat!</h2> Vi hittade". $rows->rowCount() ."inlägg på sökordet $searchQuery!<hr />";
echo '<center>Sortering: <a href="index.php?search_query='.$searchQuery.'&order=ascending">Stigande</a> | <a href="index.php?search_query='.$searchQuery.'&order=descending">Fallande</a></center>';


while($row = $rows->fetch(PDO::FETCH_ASSOC)) //loopar igenom 
{
    echo "<strong>" . "Name: " . "</strong>" . $row ['name'] . "<br />"; 
    echo "<strong>" . "Message: " . "</strong>" . $row ['message'] . "<br />";
    echo "<strong>" . "Posted: " . "</strong>" . $row ['date_posted'] . "<br />";
    echo "<a href=\"handlePost.php?action=delete&id=" . $row['id'] . "\">Delete!</a>";
    echo "<hr />";
   
}

?>

<?php

} else {

?>



<center>Sortering: <a href="index.php?order=ascending">Stigande</a> | <a href="index.php?order=descending">Fallande</a></center>

<?php

$Posts = new GBPost($dbh);
$Posts->fetchAll();

Foreach( $Posts->getPosts() as $post ) {
  echo "<strong>" . "Name: " . "</strong>" . $post ['name'] . "<br />"; 
  echo "<strong>" . "Message: " . "</strong>" . $post ['message'] . "<br />";
  echo "<strong>" . "Posted: " . "</strong>" . $post ['date_posted'] . "<br />";
  echo "<a href=\"handlePost.php?action=delete&id=" . $post['id'] . "\">Delete!</a>";
  echo "<hr />";
}


/* $order = "desc";

if(isset($_GET['order']) && $_GET['order'] == "ascending"){
  $order = "asc";
}

$query = "SELECT id, name, message, date_posted FROM messages WHERE name LIKE '%:searchQuery' OR message LIKE '%:searchQuery' ORDER BY date_posted $order";
$sth = $dbh->prepare($query);
        $queryParam = '%' . $searchQuery . '%';
        $sth->bindParam(':searchQuery', $searchQuery);


$return = $sth->execute();
// $rows = $sth->execute();

// $rows = $dbh->query($query); //hämtar kommentarer från gästboken


if(!$return) {
  print_r($dbh->errorInfo());
  die;
}


/* echo "<pre>"; */
/* while($row = $rows->fetch(PDO::FETCH_ASSOC)) //loopar igenom 
{
    //echo $row['name']. "<br />";
    echo "<strong>" . "Name: " . "</strong>" . $row ['name'] . "<br />"; //skriver ut namn med hjälp av html i kolumnen row i databasen
    echo "<strong>" . "Message: " . "</strong>" . $row ['message'] . "<br />";
    echo "<strong>" . "Posted: " . "</strong>" . $row ['date_posted'] . "<br />";
    echo "<a href=\"handlePost.php?action=delete&id=" . $row['id'] . "\">Delete!</a>";
    echo "<hr />";
   
}

echo "</pre>" */

?>


<form method="POST" action="handlePost.php"> 
Message: <br />
<textarea name="message" rows="10" cols="60" required></textarea><br />
Name: <br />
<input type="text" name="name" required /><br />
<input type="submit" value="Post" />
</form> 
<!-- Denna ger vi en varialbel Post, innehåller allt inom from--> 


<?php
    }
?>


</body>
</html>