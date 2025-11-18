<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Grille Score</title>
  <link rel="stylesheet" href="assets/css/score.css" />
  <link rel="stylesheet" href="assets/css/header.css" />
  <link rel="stylesheet" href="assets/css/footer.css" />

</head>

<body>
  <div id="main">
    <?php
    include './partials/header.php';
    ?>
  </div>

  <section id="entete">
    <h1>Scores</h1>
    <p>
      Découvrez le classement des meilleurs joueurs sur nos différents jeux !
      Comparez vos performances et tentez de battre les records établis.
    </p>
  </section>

  <!-- On crée un grand tableau dans lequel il y aura plusieurs encadrés -->

  <table class="tableau">
    <!-- En-tête du tableau -->
    <thead>
      <tr>
        <th>#</th>
        <th>Jeu</th>
        <th>Joueurs</th>
        <th>Difficulté</th>
        <th>Score</th>
        <th>Date</th>
      </tr>
    </thead>

    <!-- Corps du tableau -->

    <tbody>
      <tr>
        <td>1</td>
        <td>
          <img src="assets/images/fc25.jpg" height="50" />
          <p>Fifa 25</p>
        </td>

        <td>Kameto</td>
        <td>Difficile</td>
        <td>1m75</td>
        <td>29/09/25</td>
      </tr>

      <tr>
        <td>2</td>

        <td>
          <img src="assets/images/BO6.jpg" height="50" />

          <!-- Utilisation de la balise "p" pour chaque Jeu afin de mieux gérer leur placement en CSS-->
          <p>Black OPS 6</p>
        </td>

        <td>Gotaga</td>
        <td>Facile</td>
        <td>1m85</td>
        <td>29/09/25</td>
      </tr>

      <tr>
        <td>3</td>

        <td>
          <img src="assets/images/gta6.png" height="50" width="90" />
          <p>GTA VI</p>
        </td>

        <td>Brawks</td>
        <td>Moyen</td>
        <td>1m95</td>
        <td>29/09/25</td>
      </tr>

      <tr>
        <td>4</td>

        <td>
          <img src="assets/images/fc25.jpg" height="50" />
          <p>Fifa 25</p>
        </td>

        <td>Kameto</td>
        <td>Dur</td>
        <td>1m75</td>
        <td>29/09/25</td>
      </tr>

      <tr>
        <td class="ops">5</td>

        <td>
          <img src="assets/images/BO6.jpg" height="50" />
          <p>Black OPS 6</p>
        </td>

        <td>Gotaga</td>
        <td>Impossible</td>
        <td>1m85</td>
        <td>29/09/25</td>
      </tr>

      <tr>
        <td>6</td>
        <td>
          <img src="assets/images/gta6.png" height="50" width="90" />
          <p>GTA VI</p>
        </td>
        <td>Brawks</td>
        <td>Hardcore</td>
        <td>1m95</td>
        <td>29/09/25</td>
      </tr>
    </tbody>
  </table>

  <div class="txt-manette">
    <h1>Rejoignez le classement et montrez votre talent !</h1>

    <p>
      Enchaînez les victoires, améliorez vos temps et grimpez dans le
      classement général. Chaque partie compte : plus vous jouez, plus vous
      progressez ! Défiez vos amis et prouvez que vous êtes le meilleur joueur
      de la communauté.
    </p>

    <p>
      Les scores sont mis à jour régulièrement, alors restez connectés pour ne
      rien manquer des dernières performances.
    </p>

    <button><a href="jeu.html">Jouer</a></button>

    <img src="assets/images/manette.png" height="150" />
  </div>
  <?php
  include './partials/footer.php';
  ?>


</body>

</html>