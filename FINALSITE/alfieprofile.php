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
        content: "Alfie Reniedo";
        color: #da392d;
        animation: words 20s infinite;
      }

      .animated-text span::after {
        content: "";
        position: absolute;
        width: calc(100% +8px);
        height: 100%;
        background-color: #2f3542;
        border-left: 2px solid #da392d;
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
          content: "Alfie Reniedo";
        }
        21%,
        40% {
          content: "Alfie Reniedo";
        }
        41%,
        60% {
          content: "Alfie Reniedo";
        }
        61%,
        80% {
          content: "Alfie Reniedo";
        }
        81%,
        100% {
          content: "Alfie Reniedo";
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
        <source src="images/lelouch twixtor.mp4" type="video/mp4" />
      </video>
      <nav>
        <img src="images/lelouchbg.png" class="logo" />
        <ul>
          <li><a href="alfieprofile.php">PROFILE</a></li>
          <li><a href="alfieGallery.php">GALLERY</a></li>
          <li><a href="alfieDiaryEntry.php">DIARY ENTRY</a></li>
          <li><a href="alfieDiaryList.php">DIARY LISTING</a></li>
          <li><a href="#" onclick="logout()">LOGOUT</a></li>
        </ul>
      </nav>

      <div class="content">


      <iframe width="560" 
      height="315" 
      src="https://www.youtube.com/embed/ZPlPsfv8JwU?si=5jOtkTHgJ9WMV2Gr&amp;start=5" 
      title="YouTube video player" 
      frameborder="0" 
      allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" 
      referrerpolicy="strict-origin-when-cross-origin" 
      allowfullscreen>
    </iframe>

     

        <div class="container">
          <h1 class="animated-text">I'm <span></span></h1>
          <p><b>Address: </b>Lagasit, San Quintin, Pangasinan</p>
          <p><b>Course: </b>Bachelor of Science in Computer Science</p>
          <p>
          As a computer science student at PHINMA UPang College of Urdaneta,
          I'm fully committed to diving into the depths of technology. 
          Even though my knowledge about computers and technology is still growing,
          my aspiration is to become a seasoned IT professional. At the moment, 
          I am channeling my energy towards expanding my expertise in various aspects
          of computer science, with a special focus on web development and mobile application development.
          </p>
          <p>
          My goal is to continually improve myself in app and website development. 
          I firmly believe in my ability to achieve this, thanks to the unwavering 
          support from many people who have been instrumental in my journey. My family, 
          who constantly inspire me, and my friends who guide me, play a significant role   
          in my developmen and also my one and only bebekes my love so sweet in the heaven
          and in the sky Gwyneth Heart, who has always their to support me and believe that 
          I can achieve my dreams. Her love and encouragement fuel my determination to achieve my dreams. 
          </p>
          <div class="audio-container">
            <audio autoplay loop>
              <source src="images/bgsound.mp3" />
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
