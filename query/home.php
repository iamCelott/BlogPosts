<?php
session_start();
include "index.php";
$conn = mysqli_connect("localhost", "root", "", "db_blogposts");

try {
    $posts = sqlFetchAll("SELECT posts.*, users.name  FROM posts JOIN users ON posts.user_id = users.id");
} catch (Exception $e) {
    echo $e->getMessage();
}

?>