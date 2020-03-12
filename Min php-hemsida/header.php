<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">


  <link href="css/main.css" type="text/css" rel="stylesheet" />
  <script src="js/main.js"></script> 
</head>


<title>
  <?php 
    if(empty($title)){
     echo "Min sida!";
}
  else{
 echo $title;
  }

  ?>
  </title>

<body>
<h1> Välkommen till PHP-sida!</h1> 
<a href="index.php">Start</a> | <a href="about.php">OM OSS</a> | <a href="login.php">Logga in</a>
 
<hr />