<?php
print_r($_POST);

$text = $_POST['message'];
if($_POST['selection'] == "crypt")
{
   $text = @crypt($text);
} 
else if ($_POST ['selection'] == 'htmlentities')
{
 $text = htmlentities($text);
}
else if ($_POST ['selection'] == 'explode')
{
    $text = explode($text);
}
else if ($_POST ['selection'] == 'str_word_count')
{
    $text = str_word_count($text);
}
else if ($_POST ['selection'] == 'strip_tags')
{
    $text = strip_tags($text);
}
else if ($_POST ['selection'] == 'strlen')
{
    $text = strlen($text);
}

echo "Text: $text";

?>



