<?php
include("includes/db.php");

if (isset($_POST["submit"])) {
$file = $_FILES['postimage'];

$fileName = $_FILES['postimage']['name'];
$fileTmpName = $_FILES['postimage']['tmp_name'];
$fileSize = $_FILES['postimage']['size'];
$fileError = $_FILES['postimage']['error'];
$fileType = $_FILES['postimage']['type'];
$fileCategory = $_FILES['postimage']['category'];



$fileExt = explode('.', $fileName);
$fileActualExt = strtolower(end($fileExt));

$allowed = array('jpg', 'jpeg', 'png', 'pdf');

if (in_array($fileActualExt, $allowed)){
    if($fileError === 0){
        if($fileSize < 1000000){
            $fileNameNew = uniqid('', true).".".$fileActualExt;
            $fileDestination = 'uploads/'.$fileNameNew;
            move_uploaded_file($fileTmpName, $fileDestination);
            $description = (!empty($_POST['description']) ? $_POST['description'] : "");
            $title = (!empty($_POST['title']) ? $_POST['title'] : "");

            $description = filter_var($description, FILTER_SANITIZE_STRING);
            $title = filter_var($title, FILTER_SANITIZE_STRING);

            $query = "INSERT INTO posts (titel, description, image, category) values ('$title', '$description', '$fileDestination', '$category');";
            $return = $dbh ->exec($query);

             header("Location: blog.php?uploadsuccsess");
} else {
    echo "Din fil är för stor!";
    }
} else {
 echo "Det blev något fel när du försökte ladda upp bilden";
    }
} else{
    echo "Du kan inte ladda upp den här typen av fil!";
}
}
?>

