<?php 
$conn = mysqli_connect("localhost", "root", "", "db_blogposts");

function sqlFetchAll($query) {
  global $conn;
  $result = mysqli_query($conn, $query);

  if (!$result) {
      die("Query error: " . mysqli_error($conn));
  }
 
  return mysqli_fetch_all($result, MYSQLI_ASSOC);
}
function sqlFetchAssoc($query) {
  global $conn;
  $result = mysqli_query($conn, $query);

  if (!$result) {
      die("Query error: " . mysqli_error($conn));
  }
 
  return mysqli_fetch_assoc($result);
}

function sqlExecute($query) {
  global $conn;
  $result = mysqli_query($conn, $query);

  if (!$result) {
      die("Query error: " . mysqli_error($conn));
  }
 
  return $result;
}

?>