<?php
session_start();

require_once "utils/database.php";
require_once "utils/file_management.php";
$pdo = connectToBandGetPDO();

if (!isset($_SESSION['userId'])) {
  header('Location: connexion.php');
  exit();
}

$userId = $_SESSION['userId'];
$msg_email = "";
$msg_mdp = "";
$msg_photo = "";



if (isset($_POST['submit_email'])) {
  $newEmail = trim($_POST['new_email']);

  if (filter_var($newEmail, FILTER_VALIDATE_EMAIL)) {
    $stmt = $pdo->prepare("UPDATE utilisateur SET email = ? WHERE id = ?");
    $stmt->execute([$newEmail, $userId]);

    $_SESSION['email'] = $newEmail;

    $msg_email = "<p style='color: green; margin-top: 5px;'>✅ Email modifié avec succès !</p>";
  } else {
    $msg_email = "<p style='color: red; margin-top: 5px;'>❌ Format d'email invalide.</p>";
  }
}

if (isset($_POST['submit_password'])) {
  $oldPwd = $_POST['old_password'];
  $newPwd = $_POST['new_password'];
  $confPwd = $_POST['confirm_password'];

  $stmt = $pdo->prepare("SELECT pass_word FROM utilisateur WHERE id = ?");
  $stmt->execute([$userId]);
  $user = $stmt->fetch();

  if (password_verify($oldPwd, $user['pass_word'])) {

    if ($newPwd === $confPwd) {

      if (strlen($newPwd) >= 8) {
        $newHash = password_hash($newPwd, PASSWORD_DEFAULT);

        $update = $pdo->prepare("UPDATE utilisateur SET pass_word = ? WHERE id = ?");
        $update->execute([$newHash, $userId]);

        $msg_mdp = "<p style='color: green; margin-top: 5px;'>✅ Mot de passe modifié !</p>";
      } else {
        $msg_mdp = "<p style='color: red; margin-top: 5px;'>❌ Le mot de passe doit faire au moins 8 caractères.</p>";
      }
    } else {
      $msg_mdp = "<p style='color: red; margin-top: 5px;'>❌ Les nouveaux mots de passe ne correspondent pas.</p>";
    }
  } else {
    $msg_mdp = "<p style='color: red; margin-top: 5px;'>❌ L'ancien mot de passe est incorrect.</p>";
  }
}

if (isset($_POST['submit_photo'])) {
  if (isset($_FILES['profile_picture']) && $_FILES['profile_picture']['error'] === UPLOAD_ERR_OK) {
    $file = $_FILES['profile_picture'];

    $uploadResult = uploadProfilePicture($userId, $file);

    if ($uploadResult === true) {
      $msg_photo = "<p style='color: green; margin-top: 5px;'>✅ Photo de profil modifiée avec succès !</p>";
    } else {
      $msg_photo = "<p style='color: red; margin-top: 5px;'>❌ Erreur : " . htmlspecialchars($uploadResult) . "</p>";
    }
  } else if (isset($_FILES['profile_picture']) && $_FILES['profile_picture']['error'] !== UPLOAD_ERR_NO_FILE) {
    $msg_photo = "<p style='color: red; margin-top: 5px;'>❌ Erreur d'upload du fichier (Code: " . $_FILES['profile_picture']['error'] . ").</p>";
  } else {
    $msg_photo = "<p style='color: red; margin-top: 5px;'>❌ Veuillez sélectionner un fichier.</p>";
  }
}
?>




<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Gérer mon compte</title>
  <link rel="stylesheet" href="assets/css/gerer_compte.css" />
  <link rel="stylesheet" href="assets/css/header.css" />
  <link rel="stylesheet" href="assets/css/footer.css" />
</head>

<body>
  <?php
  if (file_exists('partials/header.php')) include 'partials/header.php';
  ?>

  <div class="account-container">
    <h1>Mon Profil</h1>

    <main class="main-content">

      <section class="photo-section">
        <h2>Photo de profil</h2>
        <?= $msg_photo ?>

        <img src="<?= getProfilePicturePath($userId) ?>" alt="Photo de profil" class="profile-pic-display">

        <form action="" method="POST" enctype="multipart/form-data" class="profile-pic-form">
          <div class="form-group file-upload-group">
            <label for="profile_picture" class="file-label">Choisir une image :</label>
            <input type="file" name="profile_picture" id="profile_picture" accept="image/png, image/jpeg" required />
          </div>

          <button type="submit" name="submit_photo" class="save-btn full-width">Téléverser la photo</button>
        </form>
      </section>
      <section class="info-section">
        <h2>Mes informations personnelles</h2>

        <div class="form-group">
          <label>Modifier votre email :</label>
          <?= $msg_email ?>

          <div class="input-wrapper">
            <form action="" method="POST" style="display: flex; width: 100%; align-items: center;">
              <input type="email" name="new_email" value="<?= htmlspecialchars(isset($_SESSION['email']) ? $_SESSION['email'] : '') ?>" required />

              <button type="submit" name="submit_email" class="edit-btn" title="Enregistrer le nouvel email">✏️</button>
            </form>
          </div>
        </div>
      </section>

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
        <button class="save-btn score-btn">Voir l'historique des scores</button>
      </section>

      <section class="password-section">
        <h2>Sécurité</h2>

        <?= $msg_mdp ?>

        <form action="" method="POST">
          <div class="form-group">
            <label for="old_password">Mot de passe actuel :</label>
            <input type="password" name="old_password" id="old_password" placeholder="Votre mot de passe actuel" required />
          </div>

          <div class="form-group">
            <label for="new_password">Nouveau mot de passe :</label>
            <input type="password" name="new_password" id="new_password" placeholder="8 caractères minimum" required />
          </div>

          <div class="form-group">
            <label for="confirm_password">Confirmer le nouveau mot de passe :</label>
            <input type="password" name="confirm_password" id="confirm_password" placeholder="Répétez le nouveau mot de passe" required />
          </div>

          <button type="submit" name="submit_password" class="save-btn full-width">Changer le mot de passe</button>
        </form>
      </section>

    </main>
  </div>

  <?php
  if (file_exists('partials/footer.php')) include 'partials/footer.php';
  ?>
</body>

</html>