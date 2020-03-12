<?php
$host = "localhost";
$user = "root";
$pass = "";
$db = "guestbook"; //anslutning till database, PHP SETTING 

//alla man beskriver i en try kommer den försöka göra, MAKE CONNECTION
try {
$dsn = "mysql:host=$host;dbname=$db;";
$dbh = new PDO($dsn, $user, $pass);


} catch(PDOException $e) { //catch kommer fånga det som blivit fel, ON ERROR
    echo "Error! " . $e->getMessage() ."<br />";
    die;
}

?>