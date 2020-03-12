<?php
include("classes/Posts.php");
include("includes/db.php");


$query = "SELECT * FROM posts WHERE id=". $_GET['id'];


$sth =  $dbh->prepare($query); //statement handler
$sth->bindParam('id', $id); //BindParam sätter :name till variabel. PDO-funktion.

$return = $dbh->query($query); //exec returnerar false


$postdata = $return->fetch(PDO::FETCH_ASSOC);

print_r($postdata);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Millhouse Blogg</title>
    <link href="https://fonts.googleapis.com/css?family=Nunito+Sans&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
    
<div id="editstyle">


<h1>Redigera blogginlägg</h1>
<form method="POST" action='views/post.php?action=update&id=<?php echo $_GET['id'];?>'>

Rubrik <br />
<input type="text" name="titel" value="<?php echo $postdata['titel']; ?>" style="height: 30px; width: 300px;" /><br />

Kategori <br />
<select name="category" value="<?php echo $postdata['category']; ?>">
  <option value="accesoarer">Accesoarer</option>
  <option value="klader">Kläder</option>
  <option value="inredning">Inredning</option>
</select> <br />
<label for="img">Välj bild:</label>
  <input type="file" name="postimage" value="<?php echo $postdata['image']; ?>" accept="image/*">
<br/>
<input type="text" name="description" value="<?php echo $postdata['description']; ?>" style="width: 300px; height: 300px;" /><br />
<input type="submit" name="submit" value="Posta" />
</form>
</div>
</body>