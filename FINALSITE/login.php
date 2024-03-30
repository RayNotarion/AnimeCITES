<?php
 include ("connectdb.php");

 if(isset($_POST['submit'])){

$username = $_POST ['username'];
$password = $_POST ['password'];


$sql = "select * from login where username = '$username' and password = '$password' ";
$result = mysqli_query ($conn, $sql);
$row = mysqli_fetch_array ($result, MYSQLI_ASSOC);
$count = mysqli_num_rows($result);


if ($username == "alfie123" && $password == "alfie123") {
    header("Location: alfieprofile.php");
    exit();
}

$sql = "SELECT * FROM login WHERE username = '$username' AND password = '$password'";
$result = mysqli_query($conn, $sql);

if ($result && mysqli_num_rows($result) == 1) {
    header("Location: Raymundprofile.php");
    exit();
}



else{
    echo '<script>
    window.location.href = "index.php";
    alert ("Login failed. Invalid username or password")
    </script>';
}


}



 ?>