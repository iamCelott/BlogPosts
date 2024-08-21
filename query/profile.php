<?php
session_start();
include "index.php";
$conn = mysqli_connect("localhost", "root", "", "db_blogposts");

try {
    $user_id = $_SESSION['login'];
    $posts = sqlFetchAll("SELECT posts.*, users.name  FROM posts JOIN users ON posts.user_id = users.id WHERE posts.user_id = '$user_id'");
    $user = sqlFetchAssoc("SELECT * FROM users WHERE id = '$user_id'");
} catch (Exception $e) {
    echo $e->getMessage();
}

if (isset($_POST['submit'])) {
    $title = $_POST['title'];
    $description = $_POST['description'];
    $content = $_POST['content'];
    $user_id = $_SESSION['login'];
    $category = $_POST['category'];
    $tags = $_POST['tags'];
    $tagsArray = array_map('trim', explode(',', $tags));

    $stmt = $conn->prepare("INSERT INTO `posts`(`title`, `description`, `content`, `category`, `user_id`) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param('ssssi', $title, $description, $content, $category, $user_id);
    try {
      $stmt->execute(); 

        $post_id = mysqli_insert_id($conn);

        foreach($tagsArray as $tag) {
          sqlExecute("INSERT INTO `tags`(`post_id`, `user_id`, `tags`) VALUES ('$post_id','$user_id','$tag')");
        }

        header("Location: ./profile.php");
        exit();
        } catch (Exception $e) {
          echo $e->getMessage();
        }
    }

    if (isset($_POST['deleteBtn'])) {
      $post_id = $_POST["post_id"];
      try {
          sqlExecute("DELETE FROM posts WHERE `id` = '$post_id'");
            header("Location: ./profile.php");
            exit();
          } catch (Exception $e) {
            echo $e->getMessage();
          }
      }

?>