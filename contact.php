<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Carte Monde</title>
  <link rel="stylesheet" href="assets/css/contact.css" />
  <link rel="stylesheet" href="assets/css/header.css" />
  <link rel="stylesheet" href="assets/css/footer.css" />


</head>

<body>
  <?php
  $page = "contacte";
  include './partials/header.php';
  ?>

  <div class="carte">
    <h1>Lorem Ipsum is simply dummy text of the printing and.</h1>
    <p>
      Lorem Ipsum is simply dummy text of the printing and typesetting
      industry.
    </p>

    <div class="image-carte">
      <img src="assets/images/Map.png" alt="point" />
    </div>
  </div>

  <section class="contact-info">
    <div class="socials">
      <p>Suivez-nous</p>
      <div class="icons">
        <a href="https://www.facebook.com/?locale=fr_FR" target="_blank"><img src="assets/images/facebook.jpg" alt="Facebook" /></a>
        <a href="https://www.instagram.com/" target="_blank"><img src="assets/images/insta.png" alt="Instagram" /></a>
        <a href="https://x.com/" target="_blank"><img src="assets/images/twitter.jpg" alt="Twitter" /></a>
        <a href="https://fr.linkedin.com/" target="_blank"><img src="assets/images/Linkedin.jpg" alt="LinkedIn" /></a>
      </div>
    </div>

    <div class="divider"></div>
    <div class="phone"><span>📞</span> +33 6 01 02 03 04</div>
    <div class="divider"></div>
    <div class="address">
      <span>📍</span> 23 rue de Paris<br />75002 Paris
    </div>
  </section>

  <hr class="top-line" />

  <div class="contact-container">
    <h1>Contactez-nous !</h1>
    <p>
      Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse
      scelerisque in tortor vitae sollicitudin.
    </p>
    <form>
      <div class="form-group">
        <input type="text" placeholder="First Name" required />
        <input type="text" placeholder="Last Name" required />
      </div>
      <div class="form-group">
        <input type="email" placeholder="Email Address" required />
      </div>
      <div class="form-group">
        <textarea placeholder="Message" required></textarea>
      </div>
      <button type="submit">Envoyer</button>
    </form>
  </div>

  <?php
  include './partials/footer.php';
  ?>
</body>

</html>