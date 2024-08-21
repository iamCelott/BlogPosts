<?php 
session_start();

$conn = mysqli_connect("localhost", "root", "", "db_blogposts");

if(isset($_SESSION["login"])) {
  header("Location: ./home.php");
}


if(isset($_POST['submit'])){
  $email = $_POST['email'];
  $password = md5($_POST['password']);

  $stmt = $conn->prepare("SELECT * FROM `users` WHERE `email` = ?");
  $stmt->bind_param("s", $email);

  try{
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        $hashPassword = $user["password"];

        if($password == $hashPassword){
            $_SESSION['login'] = $user['id'];
            header("Location: ./home.php");
            exit();
        } else { 
            echo "Email atau password salah.";
          }
    }

  } catch (Exception $e) {
    echo $e->getMessage();
  }
  $conn->close();
}
?>  