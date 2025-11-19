<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Votre Compte</title>
  <link rel="stylesheet" href="assets/css/gerer_compte.css" />
  <link rel="stylesheet" href="assets/css/header.css" />
  <link rel="stylesheet" href="assets/css/footer.css" />
</head>

<body>
  <?php
  include './partials/header.php';

  ?>

  <div class="container">

    <a href="creer-votre-compte.php" class=""></a>
    <h1>Votre Compte</h1>

    <main class="main-content">
      <section class="info-section">
        <h2>Vos informations</h2>

        <div class="form-group">
          <label for="email">Modifier votre email :</label>
          <div class="input-wrapper">
            <input type="email" id="email" placeholder="Votre email actuel" />
            <button class="edit-btn">✏️</button>
            <!-- Icône crayon -->
          </div>
          <button class="save-btn">Modifier</button>
        </div>
      </section>

      <!-- Nouvelle section pour le Meilleur Score -->
      <section class="score-section">
        <h2>Votre Meilleur Score</h2>
        <div class="score-card">
          <div class="score-icon">🏆</div>
          <div class="score-content">
            <p class="score-label">Score absolu atteint</p>
            <div class="score-value">95/100</div>
            <p class="score-date">Obtenu le 15/09/2025</p>
          </div>
        </div>
        <button class="save-btn score-btn">
          Voir l‘historique des scores
        </button>
      </section>

      <section class="password-section">
        <h2>Modifier votre mot de passe :</h2>
        <div class="form-group">
          <label for="current-password">Mot de passe actuel :</label>
          <input
            type="password"
            id="current-password"
            placeholder="Entrez votre mot de passe actuel" />
        </div>
        <div class="form-group">
          <label for="new-password">Nouveau mot de passe :</label>
          <input
            type="password"
            id="new-password"
            placeholder="Nouveau mot de passe" />
        </div>
        <div class="form-group">
          <label for="confirm-password">Confirmer le nouveau mot de passe :</label>
          <input
            type="password"
            id="confirm-password"
            placeholder="Confirmez le nouveau mot de passe" />
        </div>
        <button class="save-btn full-width">Modifier le mot de passe</button>
      </section>
    </main>


    <?php include './partials/footer.php'; ?>

</body>

</html>