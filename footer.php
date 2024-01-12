<!DOCTYPE html>
<html lang="tr">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="footer.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
</head>

<body>
  <footer>
    <div class="footer" >
      <div class="ustRenkKatmanı">
      <ul>
        <li>
          <img src="images/social/icons8-facebook-48.png" alt="">
        </li>
        <li>
          <img src="images/social/icons8-instagram-48.png" alt="">
        </li>
        <li>
          <img src="images/social/icons8-linkedin-48.png" alt="">
        </li>
        <li>
          <img src="images/social/icons8-twitter-48.png" alt="">
        </li>
        <li>
          <img src="images/social/icons8-youtube-48.png" alt="">
        </li>
      </ul>
      </div>
      <div class="rektorluk">
        <img src="images/rektorluk.png" alt="">
      </div>
      <div class="altRenkKatmanı">
      <p>© 2024 Gazi proje. Tüm Hakları Saklıdır. NoCopyright. </p>
      </div>

    </div>
  </footer>
  <button id="scrollUpBtn" class="ok">↑</button>
</body>
<script>document.addEventListener("DOMContentLoaded", function () {
  var scrollUpBtn = document.getElementById("scrollUpBtn");

  window.onscroll = function () {
    scrollFunction();
  };

  function scrollFunction() {
    if (
      document.body.scrollTop > 20 ||
      document.documentElement.scrollTop > 20
    ) {
      scrollUpBtn.style.display = "block";
    } else {
      scrollUpBtn.style.display = "none";
    }
  }

  scrollUpBtn.addEventListener("click", function () {
    document.body.scrollTop = 0; // For Safari
    document.documentElement.scrollTop = 0; // For Chrome, Firefox, IE and Opera
  });
});</script>
</html>