<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>AnimeCITES</title>
  <link rel="stylesheet" href="style.css" />
  <style>
    .container {
      font-family: Arial, sans-serif;
      ;
      align-items: center;
      color: #fff;
      width: 500px;
      padding: 20px;
      background: transparent;
      border: 2px solid rgba(255, 255, 255, 0.5);
      border-radius: 20px;
      backdrop-filter: blur(15px);
    }

    h2,
    p {
      text-align: center;
      padding: 10px;

    }

    .diary-entry {
      border: 1px solid #ccc;
      padding: 10px;
      margin-bottom: 10px;
    }

    .entry-date {
      font-weight: bold;
    }

    .entry-topic {
      font-size: 1.2em;
    }

    .entry-category {
      font-size: 1.2em;
    }

    .entry-content {
      margin-top: 5px;
    }

    .submitBTN{
    
      display: inline-block;
      width: 100%;
      padding: 10px;
      border: 1px solid #fff;
      background-color: #31363F;
      color: #fff;
      text-align: center;
      border-radius: 3px;
      cursor: pointer;
    }
    .submitBTN:hover {
      width: 100%;
      border: none;
      background-color: #4f5053;
    }
  </style>
</head>

<body>
  <div class="hero">
    <video autoplay loop muted plays-inline class="back-video">
      <source src="images/lelouch twixtor.mp4" type="video/mp4" />
    </video>
    <nav>
      <img src="images/lelouchbg.png" class="logo" />
      <ul>
        <li><a href="alfieprofile.php">PROFILE</a></li>
        <li><a href="alfieGallery.php">GALLERY</a></li>
        <li><a href="alfieDiaryEntry.php">DIARY ENTRY</a></li>
        <li><a href="#">DIARY LISTING</a></li>
        <li><a href="#" onclick="logout()">LOGOUT</a></li>

      </ul>
    </nav>
    <div class="container">
      <h2>DIARY LIST</h2>
      <?php
      // ADD ENTRY TO LIST
      $con = new mysqli('localhost', 'root', '', 'login');

      if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $topic = $_POST['topic'];
        $category = $_POST['category'];
        $content = $_POST['content'];
        $date = $_POST['date'];
        if ($con) {
          $sql = "INSERT INTO `diary` (topic,category, content,date) VALUES ('$topic', '$category', '$content','$date')";
          $result = mysqli_query($con, $sql);
          if ($result) {
            echo '<script>
            window.location.href = "alfieDiaryEntry.php";
            alert ("added successfully!!!")
            </script>';
          } else {
            die(mysqli_error($con));
          }
        } else {
          die(mysqli_error($con));
        }
      }


      // SHOW THE LIST FROM DIARYENTRY
      $servername = "localhost";
      $username = "root";
      $password = "";
      $dbname = "login";

      $conn = new mysqli($servername, $username, $password, $dbname);
      if ($conn->connect_error) {
        die("CONNECTION FAILED: " . $conn->connect_error);
      }

      $sql = "SELECT * FROM diary";
      $result = $conn->query($sql);


      if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
          echo '<div class="diary-entry">';
          echo "<p class='entry-date'>Date: " . $row['date'] . "</p>";
          echo "<p class='entry-topic'>Topic: "."<br>" . $row['topic'] . "</p>";
          echo "<p class='entry-category'>Category: "."<br>" . $row['category'] . "</p>";
          echo "<p class='entry-content'>Content: "."<br>". $row['content'] . "</p>";
          echo "<form method='POST' action='alfieDeleteEntry.php'>";
          echo "<input type='hidden' name='id' value='" . $row['id'] . "' />";
          echo "<button class='submitBTN' type='submit'>Delete</button>";
          echo "</form>";
          echo "</div>";
        }
      } else {
        echo "<p style='color: red;'> Your Diary List is Empty! </p>";
      }

      $conn->close();




      if (isset($_GET['success']) && $_GET['success'] == 1) {
        echo "<p style='color: green;'>Entry deleted successfully.</p>";
      }

      ?>

    </div>
  </div>


  <script>
    function logout() {
      // Redirect to the login page
      window.location.href = "index.php";
      
      // Modify the browser history to prevent going back to this page
      history.pushState(null, "", "index.php");
    }
  </script>
</body>

</html>