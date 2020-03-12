<?php
session_start();
if(!isset($_SESSION['role']) || $_SESSION['role'] != "admin") {
  header("location:index.php");

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nytt inlägg</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">

</head>
<body>
    
<div id="editstyle">

<h1>Nytt blogginlägg</h1>
<form method="POST" action="views/post.php">

Rubrik <br />
<input type="text" name="titel" style="height: 30px; width: 300px;" /><br />

Kategori <br />
<select name="category">
  <option value="accesoarer">Accesoarer</option>
  <option value="klader">Kläder</option>
  <option value="inredning">Inredning</option>
</select> <br />
<label for="img">Välj bild:</label>
  <input type="file" name="postimage" accept="image/*">
<br/>
<input type="text" name="description" style="width: 300px; height: 300px;" /><br />
<input type="submit" name="submit" value="Posta" />
</form>
</div>
</body>
</html>