<?php

class BlogPost {
    private $databaseHandler;
    private $order = "desc";
    private $posts; 

    public function __construct($dbh) {
        $this->databaseHandler = $dbh;

    }
 /* hämtar alla poster och returnerar dem en array*/
    public function fetchAll() {
        $query = "SELECT id, titel, description, image, date_posted, category, id FROM posts ORDER BY date_posted $this->order";
        $return_array = $this->databaseHandler->query($query);
        $return_array = $return_array->fetchAll(PDO::FETCH_ASSOC);

        $this->posts = $return_array;
    }

    public function getPosts() {
        return $this->posts;
    }

 }


?>