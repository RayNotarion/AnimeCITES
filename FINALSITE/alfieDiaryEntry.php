
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>AnimeCITES</title>
  <link rel="stylesheet" href="style.css" />
  <style>
    .container {
      color: #fff;
      width: 500px;
      /* Increase the width */
      padding: 20px;
      background: transparent;
      border: 2px solid rgba(255, 255, 255, 0.5);
      border-radius: 20px;
      backdrop-filter: blur(15px);
    }

    input[type="text"],
    select,
    textarea,
    input[type="date"] {
      width: calc(100% - 16px);
      /* Adjust width to leave space for padding */
      padding: 12px;
      /* Increase padding */
      margin-top: 6px;
      /* Adjust margin */
      margin-bottom: 15px;
      /* Adjust margin */
      box-sizing: border-box;
      border: 1px solid #ccc;
      border-radius: 5px;
      /* Increase border-radius */
    }

    input[type="submit"] {
      width: 100%;
      padding: 12px;
      background-color: #31363F;
      color: #fff;
      border: none;
      border-radius: 5px;
      cursor: pointer;
      font-size: 18px;
      /* Increase font-size */
    }

    input[type="submit"]:hover {
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
        <li><a href="#">DIARY ENTRY</a></li>
        <li><a href="alfieDiaryList.php">DIARY LISTING</a></li>
        <li><a href="#" onclick="logout()">LOGOUT</a></li>

      </ul>
    </nav>
    <div class="container">
      <h2>Share your Story</h2>
      <form class="form-box" method="post" action="alfieDiarylist.php">
        <label for="topic">Topic:</label>
        <input type="text" id="topic" name="topic" required>

        <label for="category">Category:</label>
        <select id="category" name="category" required>
          <option value="Home">Home</option>
          <option value="Personal">Personal</option>
          <option value="School">School</option>
          <option value="Peers">Peers</option>
          <option value="Others">Others</option>
        </select>

        <label for="content">Content:</label>
        <textarea id="content" name="content" rows="5" required></textarea>

        <label for="date">Date:</label>
        <input type="date" id="date" name="date" required>

        <input type="submit" value="Submit" name="submit">
      </form>
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