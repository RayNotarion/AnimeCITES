<?php
include("connectdb.php");
?>



<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>AnimeCITES</title>
  <style>
    body {
      color: #fff;
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 0;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
    }

    .login-container {
      color: #fff;
      width: 300px;
      /* Increase the width */
      padding: 30px;
      background: transparent;
      border: 2px solid rgba(255, 255, 255, 0.5);
      border-radius: 20px;
      backdrop-filter: blur(15px);
    }

    .login-container h2 {
      margin-top: 0;
      margin-bottom: 20px;
      text-align: center;

    }

    .form-group {
      margin-bottom: 20px;
    }

    .form-group label {
      display: block;
      margin-bottom: 5px;
      font-weight: bold;
    }

    .form-group input {
      width: 94%;
      padding: 10px;
      border: 1px solid #ccc;
      border-radius: 3px;
    }

    .login-btn{
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

    .login-btn:hover {
      width: 100%;
      border: none;
      background-color: #4f5053;
    }

    .back-video {
      position: absolute;
      right: 0;
      bottom: 0;
      z-index: -1;
    }

    @media (min-aspect-ratio: 16/9) {
      .back-video {
        width: 100%;
        height: auto;
      }
    }

    @media (max-aspect-ratio: 16/9) {
      .back-video {
        width: auto;
        height: 100%;
      }
    }
  </style>
</head>

<body>
  <video autoplay loop muted plays-inline class="back-video">
    <source src="images/loginBG.mp4" type="video/mp4" />
  </video>
  <div class="login-container">
    <h2>Login</h2>
    <form name="form" id="login-form" action="login.php" method="POST" onsubmit="return validateForm()">
      <div class="form-group">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required />
      </div>
      <div class="form-group">
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required />
      </div>
      <input type="submit" id="btn" class="login-btn" value="Log in" name="submit" />
    </form>
  </div>

  <script>
    function isvalid() {
      var username = document.form.username.value;
      var password = document.form.password.value;

      if (username.length == "" && password.length == "") {
        alert("Username and password field is empty!!!");
        return false
      } 
      else {
        if (username.length == "") 
        {
          alert("Username is empty!!");
          return false}
        else 
        {
        if (password.length == "")
         {
          alert("password is empty!!");
          return false

        }
      }
    }

    }
  </script>
</body>

</html>