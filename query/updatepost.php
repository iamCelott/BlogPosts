<?php 
session_start();
include "index.php";

if (isset($_GET['id'])) {
    $post_id = $_GET['id'];
}

$user_id = $_SESSION['login'];

$conn = mysqli_connect("localhost", "root", "", "db_blogposts");

$stmt = $conn->prepare("SELECT * FROM posts WHERE `id` = ?");
$stmt->bind_param("s", $post_id);

try {
    $stmt->execute();
    $result = $stmt->get_result();
    if($result->num_rows > 0) {
        $data = $result->fetch_assoc();
        if($data["user_id"] != $user_id) {
            header("Location: ./home.php");
        }
    }
} catch (Exception $e) {
    echo $e->getMessage();
}

if (isset($_POST['submit'])) {
    $title = $_POST['title'];
    $description = $_POST['description'];
    $content = $_POST['content'];
    $category = $_POST['category'];
    $tags = $_POST["tags"];
    $tagsArray = array_map('trim', explode(',', $tags));

    $stmt = $conn->prepare("UPDATE `posts` SET `title`=?,`description`=?,`content`=?,`category`=?,`user_id`=? WHERE `title` = ?");;
    $stmt->bind_param("ssssis",  $title, $description, $content, $category, $user_id, $post_title);
    try {
        $stmt->execute();
        header("Location: ./profile.php");
        exit();
        } catch (Exception $e) {
          echo $e->getMessage();
        }
    }
    $stmt->close();
    $conn->close();
?>