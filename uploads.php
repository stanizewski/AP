<?php
include("includes/db.php");

if (isset($_POST['submit'])) { // Om man trycker på submit i Skapa inlägg-formen...
    $file = $_FILES['postimage']; 
print_r($file);
    $fileName = $_FILES['postimage']['name'];
    $fileTmpName = $_FILES['postimage']['tmp_name'];
    $fileSize = $_FILES['postimage']['size'];
    $fileError = $_FILES['postimage']['error'];
    $fileType = $_FILES['postimage']['type'];
// Variablar för kommande if sats

    $fileExt = explode('.', $fileName); // Explodear filnamnet vid punkten
    $fileActualExt = strtolower(end($fileExt));

    $allowed = array('jpg', 'jpeg', 'png');

    if (in_array($fileActualExt, $allowed)) { // Om filen är tillåten (dvs är en jpg, jpeg eller png fil)
        if ($fileError === 0) { // Om det inte är någon error
            if ($fileSize < 5000000 ) { // Om filen är större än 5000000
                $fileNameNew = uniqid('', true).".".$fileActualExt; // Skapar ett unikt id
                $fileDestination = 'uploads/'.$fileNameNew; // Gör så filen hamnar i uploads mappen med sitt nya unika filnamn
                move_uploaded_file($fileTmpName, $fileDestination);
                $description = (!empty($_POST['description']) ? $_POST['description'] : "");
            $titel = (!empty($_POST['titel']) ? $_POST['titel'] : "");
            $category = (!empty($_POST['category']) ? $_POST['category'] : ""); // variablar från databsen


            $description = filter_var($description, FILTER_SANITIZE_STRING);
            $titel = filter_var($titel, FILTER_SANITIZE_STRING);
            $category = filter_var($category, FILTER_SANITIZE_STRING);


            $query = "INSERT INTO posts (titel, description, image, category) values ('$titel', '$description', '$fileDestination', '$category');";
            $return = $dbh ->exec($query);

                header("Location: blog.php?uploadsuccsess");
            } else {
                echo "Din fil är för stor!";

            }
        } else {
            echo "ERROR";

        }
    } else {
        echo "Du kan inte ladda upp en fil med denna filtyp";
    }
// lite errors ifall filen inte kan laddas upp

}

    ?>