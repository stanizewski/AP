<?php

echo "<h1>klasser och räkna ut moms!</h1> <br />";

Class product{
    private $name;
    private $price;
    private $category;
    private $SKU;
    private $describe;


    

function __construct($name, $price, $category, $SKU, $describe)
    {
        $this->name = $name;
        $this->price = $price;
        $this->category = $category;
        $this->SKU = $SKU;
        $this->describe = $describe;
        $this->price = $this->vat();


    }

function vat(){
    return $this->price * 1.25;
}

public function setName($name){
    $this->name = $name;
}

public function getName(){
   return $this->name;
}

public function setPrice($price){
    $this->price = $price;
}

public function getPrice(){
   return $this->price;
}


public function setCategory($category){
    $this->category = $category;
}

public function getCategory(){
   return $this->category;
}


public function setSku($SKU){
    $this->SKU = $SKU;
}

public function getSku(){
   return $this->SKU;
}


public function setDescribe($describe){
    $this->describe = $describe;
}

public function getDescribe(){
   return $this->describe;

    }

}

$product = new Product ("knyttet", "1000", "Jumper", "10056", "cutton");

echo $product->getName() . "<br />";
echo $product->getPrice() . "<br />";
echo $product->getCategory() . "<br />";
echo $product->getSku() . "<br />";
echo $product->getDescribe() . "<br />";




?>