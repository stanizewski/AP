<?php

class BlogComment {
    private $databaseHandler;
    private $order = "desc";
    private $posts; 

    public function __construct($dbh) {
        $this->databaseHandler = $dbh;


    }

    public function fetchAll($post_id) {
    $query = "SELECT comments.id, content, date_posted, postid, userid, users.username FROM comments JOIN users on users.id = comments.userId WHERE postid=$post_id";
        $return_array = $this->databaseHandler->query($query);
        $return_array = $return_array->fetchAll(PDO::FETCH_ASSOC);

        $this->posts = $return_array;
    }

    public function getPosts() {
        return $this->posts;
    }

 }

 /* ORDER BY date_posted $this->order */
?>