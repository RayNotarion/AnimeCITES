<?php
$con = new mysqli('localhost', 'root', '', 'login');

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['id'])) {
  $id = $_POST['id'];
  
  $stmt = $con->prepare("DELETE FROM diary WHERE id = ?");
  $stmt->bind_param("i", $id);
  
  if ($stmt->execute()) {
    header("Location: Raymunddiary_listing.php");
    exit();
  } else {
    echo "Error deleting entry: " . $con->error;
  }
  
  $stmt->close();
}

$con->close();
?>
