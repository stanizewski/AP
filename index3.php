<?php

function checkWin($sticks, $isPlayerOneTurn, $drawnSticks){
    if($sticks < 1) {
 if($isPlayerOneTurn === true){

    echo "<h1> Grattis spelare 1, du vann!</h1>";

 }else{
     echo "<h1> Grattis spelare 2, du vann!</h1>";
 }
 echo '<a href="index3.php">Reset</a>';
 die;
    }
   /*  echo "Sticks: $sticks isPlayerOneTurn: $isPlayerOneTurn drawSticks: $drawnSticks";
    die; */
}

//Options
$title = "spelet!";
$startingSticks = 21;
$playerOneTurn = true;
$sticksToDraw = 0;

$sticksToDraw = (isset($_GET['sticks_to_draw']) ? $_GET['sticks_to_draw'] : $sticksToDraw);

//Game variables 
$currentSticks = ( isset($_GET['current_sticks']) ? $_GET['current_sticks'] -$sticksToDraw : $startingSticks);
$playerOneName = ( isset($_GET['player_one']) ? $_GET['player_one'] : "");
$playerTwoName = ( isset($_GET['player_two']) ? $_GET['player_two'] : "");
echo "Current sticks: $currentSticks";

$playerOneTurn = (isset($_GET['player_one_turn']) ? !$_GET['player_one_turn'] : $playerOneTurn);

checkWin($currentSticks, $playerOneTurn, $sticksToDraw);

/* echo "<pre>";
print_r($_GET);
echo "</pre>"; */

function drawSticks($numberOfSticks){
    $pastSticks = 0;
    for($i = 0; $i < $numberOfSticks; $i++){
        echo "|";
        /* if(isEven($pastSticks+$i) != true){
            echo "<br />";
        } */

        $pastSticks++;
    }
}

function isEven($numberToCheck){
    if($numberToCheck % 2 == 0){
        return true;
    }
    return false;
}

/* $player1 = 
$player2 = 

function decreaseSticks(){

} */
?>
<html>
<head>
<script>
 const updateSliderValue = (sticks) => {
     document.getElementById("numChosenSticks").innerHTML= sticks;
 }

</script>
</head>
<body>
    <h1>
    <?php echo $title ?>
    </h1>
<hr />

    <form method="GET" action="index3.php">
    <input type="hidden" name="current_sticks" value="<?php echo $currentSticks; ?>" />
    <input type="hidden" name="player_one_turn" value="<?php echo $playerOneTurn; ?>" />
    Player one:<br />
    <?php 
    if(empty($playerOneName)) {
        echo '<input type="text" name="player_one" />';
    } else {
        echo $playerOneName;
        echo '<input type="hidden" name="player_one" value=" '. $playerOneName .' " />';
    }
    ?>
   <br />
    Player two:<br />
   <?php
   if(empty($playerTwoName)) {
    echo '<input type="text" name="player_two" />';
} else {
    echo $playerTwoName;
    echo '<input type="hidden" name="player_two" value=" '. $playerTwoName .' " />';
}
?>
   <br />
    <hr />
    
    <?php
    if(empty($playerOneName) || empty($playerTwoName)){

        echo "Please enter ypur names!";

      }else {
        echo "It is";
    if($playerOneTurn ===true){
        echo $playerOneName;
    } else {
        echo $playerTwoName;
    }
    echo "'s turn! <br />";

}
    ?> <br />

    <input  type="range" onChange="updateSliderValue(this.value);" name="sticks_to_draw" min="1" max="3" /><br />
    Choose: <span id="numChosenSticks"></span><br />
    <input type="submit" value="Draw!" /> <br />
    </form>
    <hr />
Sticks left:<br />
<?php
echo $currentSticks. '<br />';
drawSticks($currentSticks);
?>
<p>
<a href="index3.php">Reset</a>
</p>
</body>
</html>