<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Accueil</title>
  <link rel="stylesheet" href="assets/css/accueil.css" />
  <link rel="stylesheet" href="assets/css/header.css" />
  <link rel="stylesheet" href="assets/css/footer.css" />

</head>


<body>


  <?php
  $page = "accueil";
  include './partials/header.php';

  require './utils/database.php';
  $pdo = connectToBandGetPDO();
  function getPlayed()
  {
    global $pdo;
    $requete = $pdo->prepare('SELECT COUNT(*) AS Total FROM score');
    $requete->execute();
    $resultat = $requete->fetch();
    return $resultat['Total'];
  }

  function getRegisterPlayer()
  {
    global $pdo;
    $requete = $pdo->prepare('SELECT COUNT(*) AS Total FROM utilisateur');
    $requete->execute();
    $resultat = $requete->fetch();
    return $resultat['Total'];
  }

  function getBestScorePlayer()
  {
    global $pdo;
    $requete = $pdo->prepare('SELECT MIN(score) AS Meilleur_Score FROM SCORE');
    $requete->execute();
    $resultat = $requete->fetch();
    return $resultat['Meilleur_Score'];
  }


  ?>


  <div id="main">

    <section id="section-banner">
      <p class="orange">Nouveautés</p>
      <div class="main">
        <h1>Retrouvez vos jeux préférés et défiez vos amis</h1>
        <img src="assets/images/manette.png" height="400" />
        <p>
          Découvrez une plateforme dédiée aux joueurs : tournois rapides,
          classements en direct et défis quotidiens pour pimenter vos parties.
          Rejoignez-nous et améliorez votre niveau à chaque session.
        </p>
        <div class="orange-boite">
          <a href="jeu.php" id="orange">Commencer !</a>
        </div>
      </div>
    </section>


    <section id="jeux">
      <h2>Nos jeux</h2>
      <div class="jeux-container">
        <div class="jeu-item">
          <img src="assets/images/fc25.jpg" height="250" width="400" />
          <p>FC 25</p>
        </div>
        <div class="jeu-item">
          <img src="assets/images/gta6.png" height="250" width="400" />
          <p>GTA VI</p>
        </div>
        <div class="jeu-item">
          <img src="assets/images/BO6.jpg" height="250" width="400" />
          <p>BLACK OPS 6</p>
        </div>
      </div>
    </section>

    <section>
      <div class="play">
        <h2>Plongez dans l'action</h2>
        <h3>Jouez avec passion</h3>
        <p>
          Nos jeux et événements sont conçus pour tous les niveaux : que vous
          soyez débutant ou compétiteur, trouvez des parties adaptées,
          améliorez vos skills et rencontrez d'autres passionnés.
        </p>
      </div>

      <div class="play-img">
        <img src="assets/images/play.jpg" />
      </div>
    </section>

    <div class="fond">
      <h2>Rejoignez la communauté de joueurs la plus active</h2>

      <p>
        Notre plateforme rassemble des milliers de joueurs, organise des
        compétitions régulières et propose des défis quotidiens pour tester
        vos compétences. Inscrivez-vous pour ne rien manquer.
      </p>

      <div class="numero_contenu">
        <div class="numero_encadre">
          <div class="chiffre"><?php echo getPlayed() ?></div>
          <div class="texte">Parties jouées</div>
        </div>
        <div class="numero_encadre1">
          <div class="chiffre">1000</div>
          <div class="texte">Joueurs connectés</div>
        </div>
        <div class="numero_encadre2">
          <div class="chiffre"><?php echo getBestScorePlayer() ?>s</div>
          <div class="texte">Meilleur temps</div>
        </div>
      </div>
      <div class="numero_contenu1">
        <div class="numero_encadre3">
          <div class="chiffre"><?php echo getRegisterPlayer() ?></div>
          <div class="texte">Joueurs inscrits</div>
        </div>
        <div class="numero_encadre4">
          <div class="chiffre">2</div>
          <div class="texte">Records battus aujourd'hui</div>
        </div>
      </div>
    </div>
  </div>

  <section id="equipe">
    <h2>Notre équipe</h2>
    <p>
      Une petite équipe de passionnés dédiée à créer des expériences de jeu
      engageantes et accessibles. Nous travaillons chaque jour pour améliorer
      la plateforme et organiser des événements mémorables.
    </p>

    <div class="membres">
      <div class="membres1">
        <img src="assets/images/kameto.jpg" height="250" />
        <h2>Kameto</h2>
      </div>

      <div class="membres2">
        <img src="assets/images/brawks.jpeg" height="250" />
        <h2>Brawks</h2>
      </div>
      <div class="membres3">
        <img src="assets/images/gotaga.jpg" height="250" />
        <h2>Gotaga</h2>
      </div>
    </div>
  </section>

  <section id="alignement">
    <h2>À propos de notre mission</h2>
    <p>
      Offrir une expérience ludique, fiable et conviviale pour tous les
      joueurs. Nous privilégions l'équité dans les compétitions, la qualité
      des services et le respect de notre communauté.
    </p>
  </section>

  <section id="derniere_boite">
    <h2>Restez informé</h2>
    <p>
      Inscrivez votre adresse e-mail pour recevoir les dernières actualités,
      invitations aux tournois et offres spéciales.
    </p>
    <div class="box-mail-valider">
      <div class="valider">
        <input type="text" id="mail" placeholder="Adresse Mail" />
        <button>Valider</button>
      </div>
    </div>
  </section>

  <?php
  include './partials/footer.php';
  ?>



</html>