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
      <source src="images/lelouch twixtor.mp4" type="video/mp4" />
    </video>
    <nav>
      <img src="images/lelouchbg.png" class="logo" />
      <ul>
        <li><a href="alfieprofile.php">PROFILE</a></li>
        <li><a href="#">GALLERY</a></li>
        <li><a href="alfieDiaryEntry.php">DIARY ENTRY</a></li>
        <li><a href="alfieDiaryList.php">DIARY LISTING</a></li>
        <li><a href="#" onclick="logout()">LOGOUT</a></li>
      </ul>
    </nav>

    <div class="gallery">
      <a href="images/codegeass.jpg" class="lightbox-link" data-description="Code Geass"><img src="images/codegeass.jpg"></a>
      <a href="images/fairytail.jpg" class="lightbox-link" data-description="Fairy Tail"><img src="images/fairytail.jpg"></a>
      <a href="images/sevendeadly.jpg" class="lightbox-link" data-description="Seven Deadly Sins"><img src="images/sevendeadly.jpg"></a>
      <a href="images/onepiece.jpg" class="lightbox-link" data-description="One Piece"><img src="images/onepiece.jpg"></a>
      <a href="images/kuroko.jpg" class="lightbox-link" data-description="Kuroko Basketball"><img src="images/kuroko.jpg"></a>
      <a href="images/haikyuu.jpg" class="lightbox-link" data-description="Haikyuu"><img src="images/haikyuu.jpg"></a>
      <a href="images/slamdunk.jpg" class="lightbox-link" data-description="Slam Dunk"><img src="images/slamdunk.jpg"></a>
      <a href="images/tokyorevengers.jpg" class="lightbox-link" data-description="Tokyo Revengers"><img src="images/tokyorevengers.jpg"></a>
      <a href="images/mha.jpg" class="lightbox-link" data-description="My Hero Academia"><img src="images/mha.jpg"></a>
      <a href="images/naruto.jpg" class="lightbox-link" data-description="Naruto"><img src="images/naruto.jpg"></a>
      <!-- Add more images with descriptions as needed -->


      <!-- Music Dropdown and Player -->
      <div class="music-player">
        <label for="music-select">Select Music:</label>
        <select id="music-select" onchange="playSelectedMusic()">
          <option value="">Click to Select Music...</option>
          <option value="music/alfiemusic1.mp3">Music 1</option>
          <option value="music/alfiemusic2.mp3">Music 2</option>
          <option value="music/alfiemusic3.mp3">Music 3</option>
        </select>
        <audio id="music-player" controls style="display: none;"></audio>
      </div>
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