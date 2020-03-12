<?php

/* $students = [
	"Anders",
	"Lisa",
	"Bosse"
];
echo "<pre>";
print_r($students);
echo "</pre>";

for($i = 0; $i <count($students); $i){
	echo "Varv: $i Student: $students[$i] <br />";
	if($students [$i] == "Bosse"){
		echo "Hej $students[$i]";
	}
} */

/* $anders["name"] = "Anders";
$anders["age"] = "28";
$anders["title"] = "teacher"; */

/* $course = [
	"teacher" => "Anders",
	"students" => [
		0 => [
			"name" => "Bosse",
			"age" => 25
		],
		1 => [
			"name" => "Lisa",
			"age" => 30
		]
      ]
]; ///Multidimonitionell array */

/* //Detta är en typ av array
 $namn = array("anders", "lisa", "bosse");

Foreach($namn as $value){ //Foreach gör att bokstäverna blir stora 
	echo "Välkommen <b>". ucfirst($value)  ."<br />";
}///slutet på denna array
 */

/* $csv = file_get_contents("./kurser.csv");
$coursesAndDances = explode("\n", $csv);
$courses = explode(",", $coursesAndDances[0]);
$dances = explode(",", $coursesAndDances[1]);

echo "<pre>";
print_r($courses);
echo "</pre>"; */


/*  $csv = "matte,svenska,php,javascript";
 $course = explode(",", $csv);
echo "<pre>";
print_r($course);
echo "</pre>"; */

if(!empty($_GET['action']) && $_GET['action']== "update") {
	echo $POST['name'];
}

echo "<pre>";
print_r($_POST);
echo "</pre>";

?>
<html>
<head>
<title>PHP</title>
</head>
<body>
	<h1>
	
	</h1>
	<!-- Dagens datum: <?php echo date("l jS \of F Y h:i:s A"); ?>
<h1>Gästbok</h1>
<form method="POST" action="handlePost.php">
Name:<br />
<Input type="text" name="name" /><br />
Ålder: <br />
<input type="number" name="age" /><br />
Email:<br />
<input type="email" name="email" /><br />

Message:<br />
<textarea name="message">Write your message..</textarea><br />
<input type="submit" value="Post" />
</form> -->

<Form method="POST" action="handlePost.php">
Name:<br />
<Input type="text" name="name" /><br />
Age:<br />
<Input type="number" name="age" /><br />
Email:<br />
<Input type="email" name="email" /><br />


Gender:<br />

<input type="radio" name="gender" value="female" />Female<br />
<input type="radio" name="gender" value="male" />Male<br />
<input type="radio" name="gender" value="other" />Other<br />

Favorite color:<br />
<input type="color" name="favcolor" value="#ffe6f2"><br>

Pets:<br />
<select name="animals">
<option value="cat">Cat</option>
<option value="dog">Dog</option>
<option value="fish">Fish</option>
<option value="bird">Bird</option>
</select><br />


Message:<br />
<textarea name="message">Write your message..</textarea><br />
<input type="submit" value="Post" /><br />
</Form>
</body>
</html>