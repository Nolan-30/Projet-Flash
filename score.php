<!DOCTYPE html>
<?php

$search = isset($_GET['search-user']) ? $_GET['search-user'] : '';

?>
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
  <?php
  include './partials/header.php';

  ?>

  <?php

  require "./utils/database.php";
  function score_by_pseudo($search)
  {
    global $pdo;
    $request = $pdo->prepare('SELECT score.id,
    jeu.name,
    jeu.images,
    utilisateur.pseudo,
    score.difficulty,
    score.score,
    score.created_at
FROM score
    INNER JOIN jeu ON score.game_id = jeu.id
    INNER JOIN utilisateur ON score.user_id = utilisateur.id
    WHERE utilisateur.pseudo = ?
ORDER BY score.id,
jeu.name ASC,
    score.difficulty ASC,
    score.score ASC');

    $request->execute([$search]);
    return $request->fetchAll();
  }

  function all_scores()
  {
    global $pdo;
    $request = $pdo->prepare('SELECT score.id,
    jeu.name,
    jeu.images,
    utilisateur.pseudo,
    score.difficulty,
    score.score,
    score.created_at
FROM score
    INNER JOIN jeu ON score.game_id = jeu.id
    INNER JOIN utilisateur ON score.user_id = utilisateur.id
ORDER BY score.id,
jeu.name ASC,
    score.difficulty ASC,
    score.score ASC');

    $request->execute();
    return $request->fetchAll();
  }
  $scores = [];
  if ($search != '') {
    $scores = score_by_pseudo($search);
  } else {
    $scores = all_scores();
  }
  ?>




  <section id="entete">
    <h1>Scores</h1>
    <p>
      Découvrez le classement des meilleurs joueurs sur nos différents jeux !
      Comparez vos performances et tentez de battre les records établis.
    </p>
  </section>

  <div class="filter-section">
    <form action="" method="GET" class="input-filters-container">

      <div class="input-group">
        <label for="search-user">RECHERCHER</label>
        <input
          type="text"
          id="search-user"
          name="search-user"
          placeholder=""
          value="<?= $search ?>">
      </div>

      <div class="input-group">
        <label for="difficulty">DIFFICULTÉ</label>
        <select id="difficulty" name="difficulty">
          <option value="facile">Facile</option>
          <option value="moyen" selected>Normal</option>
          <option value="difficile">Difficile</option>
        </select>
      </div>

      <button type="submit" style="display:none;"></button>
    </form>
  </div>
  </div>

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

      <?php foreach ($scores as $score) : ?>
        <tr>
          <td> <?= htmlspecialchars($score['id']) ?> </td>
          <td>
            <?php
            $image_path = $score['images'];
            if (empty($image_path)) {

              $image_path = 'assets/images/BO6.jpg';
            }
            ?>
            <img src="<?= htmlspecialchars($image_path) ?>" height="50" alt="<?= htmlspecialchars($score['name']) ?>" />
            <p><?= htmlspecialchars($score['name']) ?></p>
          </td>
          <td> <?= htmlspecialchars($score['pseudo']) ?> </td>
          <td> <?= htmlspecialchars($score['difficulty']) ?> </td>
          <td> <?= htmlspecialchars($score['score']) ?> </td>
          <td> <?= htmlspecialchars($score['created_at']) ?> </td>
        </tr>
      <?php endforeach; ?>

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