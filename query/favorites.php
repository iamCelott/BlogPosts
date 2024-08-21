<?php 
session_start();
include "index.php";
$conn = mysqli_connect("localhost", "root", "", "db_blogposts");

try {
    $user_id = $_SESSION['login'];
    $favorites = sqlFetchAll("SELECT favorites.*, users.name, posts.title, posts.description FROM favorites JOIN users ON favorites.user_id = users.id JOIN posts ON favorites.post_id = posts.id WHERE favorites.user_id = '$user_id'");
} catch (Exception $e) {
    echo $e->getMessage();
}

if (isset($_POST['deleteBtn'])) {
    $favorite_id = $_POST["favorite_id"];
    try {
        sqlExecute("DELETE FROM favorites WHERE `id` = '$favorite_id'");
            header("Location: ./favorites.php");
            exit();
        } catch (Exception $e) {
          echo $e->getMessage();
        }
    }
?>