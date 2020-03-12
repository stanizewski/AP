<?php 

include("db/db.php"); //databasfil

if(isset($_GET['action']) && $_GET['action'] == "delete") { //här kollar vi om det finns någon action satt(om variabel finns) och om den är likamed deleite, ska den göra allt i blocket

    $query = "DELETE FROM messages WHERE id=". $_GET['id']; 
    $return = $dbh->exec($query); // skillande mellan exec ger ett true/false svar. Query är en varibael som retunerar från SQL

    header("location:index.php"); //För att skicka tillbaka till startsidan

} else { //OM inte action finns så kör detta (false)

$message   = (!empty($_POST['message']) ? $_POST['message'] : ""); //om meddelande inte är tomt, empty betyder ha den något värde?
$name      = (!empty($_POST['name']) ? $_POST['name'] : "");

$message = htmlspecialchars($message);
$name = htmlspecialchars($name);

$errors = false;
$errorMessages = "";

    if( empty($message) ) {
        $errorMessages .= "Du måste skriva ett meddelande! <br />"; //OM det är en tom sträng så kommer dettta värdet 
        $errors = true;
    } 
    if( empty($name)) {
       $errorMessages .= "Du måste skriva ett namn! <br />";
        $errors = true;
    }

    if($errors == true) {
        echo $errorMessages;
        echo '<a href="index.php">Gå tillbaka</a>';
        die;
    }


$query = "INSERT INTO messages (name, message) VALUES(:name, :message);";
$sth = $dbh->prepare($query);
$sth->bindParam(':name', $name);
$sth->bindParam(':message', $message);

$return = $sth->exec($query);


if(!$return){//om den är false skriver det ut error, att man skriver fel eller stoppar in nytt värde
print_r($dbh->errorInfo());

} else {
    header("location:index.php");
}

}

?> 

