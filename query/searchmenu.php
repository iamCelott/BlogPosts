<?php 
session_start();
$conn = mysqli_connect("localhost", "root", "", "db_blogposts");
if (isset($_POST['searchbar'])) {
    $searchData = '%' . $_POST['searchbar'] . '%';
} else {
    header("Location: ./home.php");
    exit();
}

$stmt = $conn->prepare("SELECT posts.*, users.name, users.username FROM posts JOIN users ON posts.user_id = users.id WHERE title LIKE ? OR username LIKE ? OR name LIKE ?");
$stmt->bind_param("sss", $searchData, $searchData, $searchData);
try {
$stmt->execute();
$result = $stmt->get_result();
if($result->num_rows > 0) {
    $posts = $result->fetch_all(MYSQLI_ASSOC);
}

} catch (Exception $e) {
    echo $e->getMessage();
}
?>