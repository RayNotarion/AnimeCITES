<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>AnimeCITES</title>
  <link rel="stylesheet" href="style.css" />
  <style>
    body {
      margin: 0;
      padding: 0;
      height: 100vh;
    }

    .container {
      margin-top: 50px;
      font-family: Arial, sans-serif;
      align-items: center;
      color: #31363F;
      width: 35%;
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

    .diary-entries {
      display: flex;
      flex-wrap: wrap;
      justify-content: center;
    }

    .diary-entry-card {
      flex: 1 1 calc(40% - 20px);
      max-width: 400px;
      background-color: #fff;
      border-radius: 10px;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
      padding: 20px;
      margin: 10px;
    }

    @media screen and (max-width: 1200px) {
      .diary-entry-card {
        flex: 1 1 calc(50% - 20px);
      }
    }

    @media screen and (max-width: 768px) {
      .diary-entry-card {
        flex: 1 1 calc(100% - 20px);
      }
    }

    .entry-date {
      font-weight: bold;
    }

    .entry-topic,
    .entry-category,
    .entry-content {
      margin-top: 10px;
    }

    .submitBTN {
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
      <source src="images/bgVid.mp4" type="video/mp4" />
    </video>
    <nav>
      <img src="images/logojjk.png" class="logo" />
      <ul>
        <li><a href="Raymundprofile.php">PROFILE</a></li>
        <li><a href="Raymundgallery.php">GALLERY</a></li>
        <li><a href="Raymunddiary_entry.php">DIARY ENTRY</a></li>
        <li><a href="Raymunddiary_listing.php">DIARY LISTING</a></li>
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
            window.location.href = "Raymunddiary_entry.php";
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
        echo '<div class="diary-entries">';
        while ($row = $result->fetch_assoc()) {
          echo '<div class="diary-entry-card">';
          echo "<p class='entry-date'>Date: " . $row['date'] . "</p>";
          echo "<p class='entry-topic'>Topic: " . "<br>" . $row['topic'] . "</p>";
          echo "<p class='entry-category'>Category: " . "<br>" . $row['category'] . "</p>";
          echo "<p class='entry-content'>Content: " . "<br>" . $row['content'] . "</p>";
          echo "<form method='POST' action='Raymunddelete_entry.php'>";
          echo "<input type='hidden' name='id' value='" . $row['id'] . "' />";
          echo "<button class='submitBTN' type='submit'>Delete</button>";
          echo "</form>";
          echo "</div>";
        }
        echo '</div>'; // Close the diary-entries container
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