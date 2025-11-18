<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Jeu</title>
  <link rel="stylesheet" href="assets/css/jeu.css">
  <link rel="stylesheet" href="assets/css/header.css" />
  <link rel="stylesheet" href="assets/css/footer.css" />

</head>

<body>
  <!-- Début : Header -->
  <div id="main">
    <?php
    $page = "jeu";
    include './partials/header.php';
    ?>
    <!-- Fin : Header -->
    <!-- Début de la page-->
    <div class="milieu1">
      <h1>La puissance de la mémoire</h1>
      <p>Teste ta mémoire en t'amusant ! !</p>
    </div>
    <!-- Fin du début de la page-->
    <!-- Paramètre de grille-->
    <div class="milieu2">
      <div>
        <p>Taille de la grille</p>
        <select>
          <option>4x4 </option>
          <option>6x6</option>
        </select>
      </div>
      <div>
        <p>Thème</p>
        <select>
          <option>JeuxVidéo</option>
        </select>

      </div>
      <button class="bouton1">Générer une grille</button>
    </div>
  </div>
  <!-- Fin de paramètre de grille-->
  <!-- Grille-->
  <div class="game-grid">
    <div class="cell">
      <img src="assets/images/images.jpeg" alt="images" />
    </div>

    <div class="cell">
      <img src="assets/images/images.jpeg" alt="images" />
    </div>

    <div class="cell">
      <img src="assets/images/images.jpeg" alt="images" />
    </div>

    <div class="cell">
      <img src="assets/images/images.jpeg" alt="images" />
    </div>

    <div class="cell">
      <img src="assets/images/images.jpeg" alt="images" />
    </div>

    <div class="cell">
      <img src="assets/images/images.jpeg" alt="images" />
    </div>

    <div class="cell">
      <img src="assets/images/images.jpeg" alt="images" />
    </div>

    <div class="cell">
      <img src="assets/images/images.jpeg" alt="images" />
    </div>

    <div class="cell">
      <img src="assets/images/images.jpeg" alt="images" />
    </div>

    <div class="cell">
      <img src="assets/images/images.jpeg" alt="images" />
    </div>

    <div class="cell">
      <img src="assets/images/images.jpeg" alt="images" />
    </div>

    <div class="cell">
      <img src="assets/images/images.jpeg" alt="images" />
    </div>

    <div class="cell">
      <img src="assets/images/images.jpeg" alt="images" />
    </div>

    <div class="cell">
      <img src="assets/images/images.jpeg" alt="images" />
    </div>

    <div class="cell">
      <img src="assets/images/images.jpeg" alt="images" />
    </div>

    <div class="cell">
      <img src="assets/images/images.jpeg" alt="images" />
    </div>
  </div>
  <!-- Fin de grille-->
  <!-- Début de la fin de page-->
  <div class="groupe-fin">
    <div>
      <h1> Bienvenue dans Power of Memory, le défi ultime pour tester ta concentration ! </h1>
      <p>Retrouve les paires de manettes cachées dans la grille en un temps record. </p>
      <p>Améliore ton score, défie tes amis et deviens le maître de la mémoire !
        Prêt à relever le challenge ? Clique sur "Jouer" et que le jeu commence !
      </p>
      <button class="bouton2">Jouer</button>
    </div>

    <div>
      <figure class="photo-manette">
        <img src="assets/images/Design_sans_titre_2.png" alt="image">
      </figure>
    </div>
  </div>


  <!-- Fin de page-->
</body>
<!-- Début du footer -->
<?php
  include './partials/footer.php';
?>
<!-- fin du footer-->
</body>

</html>