<?php
 echo "<h1> Klasser yo!</h1>";



class Fruit {
    private $name;
    private $color;
    private $type;


    function __construct($name, $color, $type)
    {
        $this->name = $name;
        $this->color = $color;
        $this->type = $type;

    }

    public function setType($type){
            $this->type = $type;
    }

    public function getType(){
        return $this->type; 
    }

    public function setName($name){
            $this->name = $name;
    }

    public function getName(){
           return $this->name;
    }

    public function setColor($color){
        $this->color = $color;
    }

    public function getColor() {
        return $this->color;
    }
}

$apple = new Fruit("Royal Gala", "Gred", "Apple");

/* $apple = new Fruit();
$apple->SetName("Royal gala");
$apple->SetColor
echo $apple->name . "<br />"; */

echo $apple->getName() . "<br />";
echo $apple->getColor() . "<br />";
echo $apple->getType() . "<br />";


$banana = new Fruit( "Math banana", "Yellow", "Banana");

echo $banana->getName() . "<br />";
echo $banana->getColor() . "<br />";
echo $banana->getType() . "<br />";

/* $apple->setColor("Green");
echo $apple->getColor();
 */
?>