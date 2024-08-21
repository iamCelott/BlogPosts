<?php 
session_start();
include "index.php";

if (isset($_GET['id'])) {
    $post_id = $_GET['id'];
}

$conn = mysqli_connect("localhost", "root", "", "db_blogposts");

try {
    $post = sqlFetchAssoc("SELECT posts.*, users.name  FROM posts JOIN users ON posts.user_id = users.id WHERE posts.id = '$post_id'");
    $stmt = $conn->prepare("SELECT comments.*, users.username  FROM comments JOIN users ON comments.user_id = users.id WHERE post_id = ?");
    $stmt->bind_param("i", $post_id);
    $stmt->execute();
    $result = $stmt->get_result();
    if($result->num_rows > 0) {
        $comments = $result->fetch_all(MYSQLI_ASSOC);
    } else {
        $comments = [];
    }
    $tags = sqlFetchAll("SELECT * FROM `tags` WHERE post_id = '$post_id'");
} catch (Exception $e) {
    echo $e->getMessage();
}

if(isset($_POST["addToFavoritesBtn"])) {
    $user_id = $_SESSION['login'];
    try {
        $result = sqlFetchAssoc("SELECT * FROM `favorites` WHERE post_id = '$post_id' AND user_id = '$user_id'");

        if($result) {
            echo "This post has already in favorites!"; 
        } else {
            sqlExecute("INSERT INTO `favorites`(`post_id`, `user_id`) VALUES ('$post_id','$user_id')");
            header("Location: ./singlepost.php?id=" . urlencode($post_id) . "&title=" .  urlencode($post["title"]));
        }

    } catch(Exception $e) {
        echo $e->getMessage();
    }
}

if(isset($_POST["sendBtn"])) {
    $user_id = $_SESSION['login'];
    $comment = $_POST["comment"];

    $stmt = $conn->prepare("INSERT INTO `comments`(`post_id`, `user_id`, `comment`) VALUES (?, ?, ?)");
    $stmt->bind_param("iis", $post_id, $user_id, $comment);

    try {
        $stmt->execute();
        header("Location: ./singlepost.php?id=" . urlencode($post_id) . "&title=" .  urlencode($post["title"]));
    } catch(Exception $e) {
        echo $e->getMessage();
    }
}


?>