<?php
if (!isset($_SESSION['login'])) {
  header('Location: ./login.php');
}

$conn = mysqli_connect("localhost", "root", "", "db_blogposts");

try{
  $user_id = $_SESSION['login'];
  $query = "SELECT * FROM `users` WHERE `id` = '$user_id'";
  $result = mysqli_query($conn, $query);
  $row = mysqli_fetch_array($result);
} catch (Exception $e) {
  echo $e->getMessage();
}

if(isset($_POST["logoutBtn"])) {
  session_unset();
  session_destroy();
  header("Location: ./login.php");
  exit();
}

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>PostHir</title>
    <script src="https://cdn.tailwindcss.com"></script>
  </head>
  <body>
    <nav class="w-full py-3 text-white flex justify-between items-center sticky top-0 left-0">
      <h1 class="text-2xl hover:scale-105 ml-7">PostHir</h1>
      <ul class="flex mr-7 gap-5">
        <li>
          <a href="./home.php" class="text-sm sm:text-lg hover:text-yellow-500">Home</a>
        </li>
        <li>
          <a href="./favorites.php" class="text-sm sm:text-lg hover:text-yellow-500">Favorites</a>
        </li>
        <li>
          <a href="./profile.php" class="text-sm sm:text-lg hover:text-yellow-500 underline"><?php echo $row["username"] ; ?></a>
        </li>
        <form method="post">
          <button type="submit" name="logoutBtn" href="../client/register.php" class="text-sm sm:text-lg hover:text-yellow-500">Logout</button>
        </form>
      </ul>
    </nav>
  </body>
</html>
