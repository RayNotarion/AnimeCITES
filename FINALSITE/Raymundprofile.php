<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>AnimeCITES</title>
    <link rel="stylesheet" href="style.css" />
    <style>
      .content {
        display: flex;
        flex-direction: row;
        align-items: flex-start;
        gap: 80px;
      }

      .container {
        border-radius: 8px;
        background: #2f3542;
        padding: 25px;
        flex: 1;
        border: 2px solid #fff;
      }

      h1 {
        color: #fff;
        font-size: 30px;
        margin-bottom: 20px;
        width: 100%;
        font-family: monospace;
      }

      .animated-text {
        font-size: 34px;
        font-weight: 600;
        min-width: 260px;
      }
      .animated-text span {
        position: relative;
      }
      .animated-text span::before {
        content: "Raymund Notarion";
        color: #ff7450;
        animation: words 20s infinite;
      }

      .animated-text span::after {
        content: "";
        position: absolute;
        width: calc(100% +8px);
        height: 100%;
        background-color: #2f3542;
        border-left: 2px solid #ff7450;
        right: -8px;
        animation: cursor 0.8s infinite, typing 20s steps(14);
      }

      @keyframes cursor {
        to {
          border-left: 2px solid #ff2f5000;
        }
      }

      @keyframes words {
        0%,
        20% {
          content: "Raymund Notarion";
        }
        21%,
        40% {
          content: "Raymund Notarion";
        }
        41%,
        60% {
          content: "Raymund Notarion";
        }
        61%,
        80% {
          content: "Raymund Notarion";
        }
        81%,
        100% {
          content: "Raymund Notarion";
        }
      }

      @keyframes typing {
        10%,
        15%,
        30%,
        35%,
        50%,
        55%,
        70%,
        75%,
        90%,
        95% {
          width: 0;
        }
        5%,
        20%,
        25%,
        40%,
        45%,
        60%,
        65%,
        80%,
        85% {
          width: calc(100% + 8px);
        }
      }

      p {
        text-align: justify;
        color: #fff;
        font-size: 20px;
        line-height: 1.5;
        margin-bottom: 10px;
      }

      iframe {
        margin-top: 40px;
        max-width: 560px;
        width: 100%;
        height: 315px;
        border: none;
      }

      @media (max-width: 768px) {
        .content {
          flex-direction: column;
        }
      }

      .audio-container {
        background: #2f3542;
      }
      audio {
        background: #2f3542;
        width: 30%;
        max-width: 400px;
        margin: 5px;
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

      <div class="content">
        <iframe
          width="500"
          height="250"
          src="https://www.youtube.com/embed/hjRxH0NQU0A?si=bVQFWBLD8ZOwdhFh&amp;start=22"
          title="YouTube video player"
          frameborder="0"
          allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
          allowfullscreen
        ></iframe>
        <div class="container">
          <h1 class="animated-text">I'm <span></span></h1>
          <p><b>Address: </b>Patalan, Panqiui, Tarlac</p>
          <p><b>Course: </b>Batchelor of Science in Computer Science</p>
          <p>
            I am a dedicated Computer Science student at PHINMA University of
            Pangasinan (UPANG) College of Urdaneta, with a strong passion for
            technology and software development. Currently, I am focusing on
            expanding my knowledge and skills in various areas of computer
            science, with a particular interest in backend development.
          </p>
          <p>
            I am enthusiastic about learning new technologies and applying them
            to real-world projects. I am eager to collaborate with like-minded
            individuals and contribute to innovative projects that push the
            boundaries of technology. With a strong academic background and a
            drive for excellence, I am confident in my ability to succeed in the
            field of computer science.
          </p>
          <div class="audio-container">
            <audio autoplay loop>
              <source src="images/bgProfille.mp3" />
            </audio>
          </div>
        </div>
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
