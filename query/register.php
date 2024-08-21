<?php 
include "index.php";
$conn = mysqli_connect("localhost", "root", "", "db_blogposts");

if(isset($_POST['submit'])){
  $name = $_POST['name'];
  $email = $_POST['email'];
  $username = $_POST['username'];
  $password = $_POST['password'];
  $hashPassword = md5($password);

  $stmt = $conn->prepare("INSERT INTO `users`(`name`, `email`, `username`, `password`) VALUES (?, ?, ?, ?)");
  $stmt->bind_param("ssss", $name, $email, $username, $hashPassword );
  try{
      $stmt->execute();
      header("Location: ./login.php");
  } catch (Exception $e) {
      echo $e->getMessage();
  }
  $stmt->close();
  $conn->close();
}

?>