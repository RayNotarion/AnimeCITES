<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>AnimeCITES</title>
  <link rel="stylesheet" href="style.css">
  <style>
    .gallery {
      text-align: center;
      margin: 10px 50px;
      justify-content: center;
      position: relative;
    }

    .gallery h1 {
      color: white;
      font-size: 40px;
      text-align: center;
      margin-bottom: 40px;
    }

    .gallery img {
      width: 250px;
      height: 250px;
      padding: 5px;
      filter: grayscale(100%);
      transition: 1s;
      margin-bottom: 30px;
      cursor: pointer;
    }

    .gallery img:hover {
      filter: grayscale(0);
      transform: scale(1.1);
    }

    .lightbox {
      display: none;
      position: fixed;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      background-color: rgba(0, 0, 0, 0.8);
      z-index: 9999;
      overflow: auto;
      max-width: 80%;
      max-height: 80%;
      text-align: center;
    }

    .lightbox img {
      display: block;
      margin: auto;
      width: 900px;
      /* Set the desired width */
      height: 600px;
      /* Set the desired height */
      max-width: 100%;
      max-height: 100%;
    }

    .lightbox-description {
      color: white;
      font-size: 16px;
      margin-top: 10px;
    }

    .close {
      color: #fff;
      position: absolute;
      top: 10px;
      right: 25px;
      font-size: 35px;
      cursor: pointer;
      z-index: 10000;
      /* Ensure the close button is above other elements */
    }

    .close:hover {
      color: #ccc;
    }

    .lightbox-btn {
      background-color: transparent;
      color: white;
      border: none;
      font-size: 24px;
      cursor: pointer;
      outline: none;
      position: absolute;
      top: 50%;
      transform: translateY(-50%);
      z-index: 10000;
      /* Ensure the buttons are above other elements */
    }

    .lightbox-btn.left {
      left: 10px;
    }

    .lightbox-btn.right {
      right: 10px;
    }

    /* Music Dropdown and Player */
    .music-player {
  position: relative;
  left: 50%;
  transform: translateX(-50%);
  bottom: 0;
  color: #fff;
  width: 300px;
  padding: 20px;
  background: transparent;
  border: 2px solid rgba(255, 255, 255, 0.5);
  border-radius: 20px;
  backdrop-filter: blur(15px);
}

    .music-player select {
      width: 100%;
      padding: 8px;
      font-size: 16px;
      border: none;
      border-radius: 5px;
      background-color: #fff;
      color: #000;
      appearance: none;
    }

    .music-player select:focus {
      outline: none;
    }

    .music-player audio {
      margin-top: 10px;
      width: 100%;
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

    <div class="gallery">
      <a href="images/TOKYO GHOUL.jpg" class="lightbox-link" data-description="Tokyo Ghoul - A dark fantasy manga/anime about ghouls living among humans."><img src="images/TOKYO GHOUL.jpg"></a>
      <a href="images/ONE PUNCH MAN.jpg" class="lightbox-link" data-description="One Punch Man - A comedic superhero manga/anime about a hero who can defeat anyone with one punch."><img src="images/ONE PUNCH MAN.jpg"></a>
      <a href="images/JUJUTSU.jpg" class="lightbox-link" data-description="Jujutsu Kaisen - A supernatural manga/anime about a high school student fighting curses."><img src="images/JUJUTSU.jpg"></a>
      <a href="images/THE TUNNEL TO SUMMER.jpg" class="lightbox-link" data-description="The Tunnel to Summer, The Exit of Goodbyes - A novel exploring themes of summer and farewells."><img src="images/THE TUNNEL TO SUMMER.jpg"></a>
      <a href="images/SUZUME.jpg" class="lightbox-link" data-description="Suzume - A mysterious and captivating character or story."><img src="images/SUZUME.jpg"></a>
      <a href="images/YOUR NAME.jpg" class="lightbox-link" data-description="Your Name - A beautiful anime film about two people swapping bodies."><img src="images/YOUR NAME.jpg"></a>
      <a href="images/WEATHERING WITH U.jpg" class="lightbox-link" data-description=" Weathering With You - An enchanting anime film about weather manipulation and love."><img src="images/WEATHERING WITH U.jpg"></a>
      <a href="images/A WHISKERY A WAY.jpg" class="lightbox-link" data-description="A Whisker Away - An anime film about a girl who turns into a cat."><img src="images/A WHISKERY A WAY.jpg"></a>
      <a href="images/DRIFTING HOME.jpg" class="lightbox-link" data-description="Drifting Home - A story about finding one's way back home, physically or emotionally."><img src="images/DRIFTING HOME.jpg"></a>
      <a href="images/MY NEIGHBOR TOTORO.jpg" class="lightbox-link" data-description="My Neighbor Totoro - A heartwarming anime film about two sisters and their friendly forest spirit neighbor."><img src="images/MY NEIGHBOR TOTORO.jpg"></a>
      <!-- Add more images with descriptions as needed -->


      <!-- Music Dropdown and Player -->
      <div class="music-player">
        <label for="music-select">Select Music:</label>
        <select id="music-select" onchange="playSelectedMusic()">
          <option value="">Select music...</option>
          <option value="music/first music.mp3">Music 1</option>
          <option value="music/second music.mp3">Music 2</option>
          <option value="music/3rd music.mp3">Music 3</option>
        </select>
        <audio id="music-player" controls style="display: none;"></audio>
      </div>
    </div>

    <div id="lightbox" class="lightbox">
      <span class="close" onclick="closeLightbox()">&times;</span>
      <img class="lightbox-content" id="lightbox-img">
      <div class="lightbox-description" id="lightbox-description"></div>
      <button class="lightbox-btn left" onclick="prevSlide()">&#10094;</button>
      <button class="lightbox-btn right" onclick="nextSlide()">&#10095;</button>
    </div>



  </div>

  <script>
    var slideIndex = 0;
    var lightboxImages = document.querySelectorAll('.lightbox-link');

    function openLightbox(index) {
      slideIndex = index;
      document.getElementById('lightbox-img').setAttribute('src', lightboxImages[index].getAttribute('href'));
      document.getElementById('lightbox-description').innerText = lightboxImages[index].getAttribute('data-description');
      document.getElementById('lightbox').style.display = 'block';
    }


    function closeLightbox() {
      document.getElementById('lightbox').style.display = 'none';
    }

    function nextSlide() {
      slideIndex = (slideIndex + 1) % lightboxImages.length;
      document.getElementById('lightbox-img').setAttribute('src', lightboxImages[slideIndex].getAttribute('href'));
      document.getElementById('lightbox-description').innerText = lightboxImages[slideIndex].getAttribute('data-description');
    }

    function prevSlide() {
      slideIndex = (slideIndex - 1 + lightboxImages.length) % lightboxImages.length;
      document.getElementById('lightbox-img').setAttribute('src', lightboxImages[slideIndex].getAttribute('href'));
      document.getElementById('lightbox-description').innerText = lightboxImages[slideIndex].getAttribute('data-description');
    }

    lightboxImages.forEach(function(link, index) {
      link.addEventListener('click', function(event) {
        event.preventDefault();
        openLightbox(index);
      });
    });


    //for music drop down
    function playSelectedMusic() {
      var selectElement = document.getElementById("music-select");
      var audioPlayer = document.getElementById("music-player");
      var selectedMusic = selectElement.value;

      if (selectedMusic) {
        audioPlayer.src = selectedMusic;
        audioPlayer.style.display = "block";
        audioPlayer.play();
      } else {
        audioPlayer.pause();
        audioPlayer.style.display = "none";
      }
    }





    function logout() {
      // Redirect to the login page
      window.location.href = "index.php";

      // Modify the browser history to prevent going back to this page
      history.pushState(null, "", "index.php");
    }
  </script>
</body>

</html>