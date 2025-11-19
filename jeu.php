<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Jeu</title>
  <link rel="stylesheet" href="assets/css/jeu.css">
  <link rel="stylesheet" href="assets/css/header.css" />
  <link rel="stylesheet" href="assets/css/footer.css" />
  <link rel="stylesheet" href="assets/css/chatbot.css" />


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

  <div class="chatbot-container">

    <div class="chatbot-header">
      <span class="back-arrow">‹</span>
      <span>Power Of Memory</span>
    </div>

    <div class="chatbot-messages">
      <div class="message">
        <div class="message-avatar">TM</div>
        <div class="message-content">
          <div class="message-bubble">
            <span class="emoji-icon">👋</span> Hey ! Bien joué Clément !
          </div>
          <div class="message-time">Il y a 2 minutes</div>
        </div>
      </div>

      <div class="message sent">
        <div class="message-avatar">CP</div>
        <div class="message-content">
          <div class="message-bubble">Yes ! Bien joué Clément !</div>
          <div class="message-time">Il y a 2 minutes</div>
        </div>
      </div>

      <div class="message">
        <div class="message-avatar">TM</div>
        <div class="message-content">
          <div class="message-bubble">Merci beaucoup !!</div>
          <div class="message-time">À l'instant</div>
        </div>
      </div>
    </div>
    <div class="chatbot-input-container">
      <div class="chatbot-input-wrapper">
        <input
          type="text"
          class="chatbot-input"
          placeholder="Votre message..." />
        <button class="send-button">➤</button>
      </div>
    </div>
  </div>
  <!-- Début du footer -->
  <?php
  include './partials/footer.php';
  ?>
  <!-- fin du footer-->
</body>

</html>