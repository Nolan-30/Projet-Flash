<?php
try {
  $bdd = new PDO('mysql:host=localhost;dbname=Flash;', 'root', '');
} catch (PDOException $e) {
  die("Erreur de connexion à la base de données : " . $e->getMessage());
}

$errors = [];
$success_message = null;

if (isset($_POST['valider'])) {

  $email = isset($_POST['email']) ? $_POST['email'] : '';
  $password = isset($_POST['password']) ? $_POST['password'] : '';
  $password_confirm = isset($_POST['password_confirm']) ? $_POST['password_confirm'] : '';
  $pseudo = isset($_POST['pseudo']) ? htmlspecialchars($_POST['pseudo']) : '';


  if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errors[] = "Le format de l'email est invalide.";
  }

  if (empty($pseudo) || strlen($pseudo) < 4) {
    $errors[] = "Le pseudo doit faire au minimum 4 caractères.";
  } else {
    $reqPseudo = $bdd->prepare("SELECT id FROM utilisateur WHERE pseudo = ?");
    $reqPseudo->execute([$pseudo]);
    if ($reqPseudo->fetch()) {
      $errors[] = "Ce pseudo est déjà utilisé.";
    }
  }

  if (empty($password) || strlen($password) < 8) {
    $errors[] = "Le mot de passe doit faire au minimum 8 caractères.";
  } elseif (!preg_match('/[A-Z]/', $password)) {
    $errors[] = "Le mot de passe doit contenir au moins une majuscule.";
  } elseif (!preg_match('/[0-9]/', $password)) {
    $errors[] = "Le mot de passe doit contenir au moins un chiffre.";
  } elseif (!preg_match('/[\'^£$%&*()}{@#~!?><>,|=_+¬-]/', $password)) {
    $errors[] = "Le mot de passe doit contenir au moins un caractère spécial.";
  } elseif ($password !== $password_confirm) {
    $errors[] = "Les mots de passe ne correspondent pas.";
  }


  if (empty($errors)) {
    $hashed_password = password_hash($password, PASSWORD_BCRYPT);

    try {
      $insererUser = $bdd->prepare('INSERT INTO utilisateur(email, pseudo, pass_word, created_at, updated_at) VALUES(?, ?, ?, NOW(), 0)');
      $insererUser->execute(array($email, $pseudo, $hashed_password));

      $success_message = "Inscription réussie ! Vous pouvez maintenant vous connecter.";
    } catch (PDOException $e) {
      if ($e->getCode() == 23000) {
        $errors[] = "Cet email est déjà utilisé.";
      } else {
        $errors[] = "Erreur lors de l'inscription : " . $e->getMessage();
      }
    }
  }
}
?>


<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="utf-8" />
  <link rel="stylesheet" href="assets/css/inscription.css" />
  <title>Inscription</title>
</head>

<body>
  <figure class="fig1">
    <img src="assets/images/login.png" alt="Login image" />
  </figure>

  <div class="enveloppe">
    <form action="" method="POST">
      <div class="position-conteneur">
        <div class="conteneur">
          <h1>Bienvenue chez nous 👋</h1>

          <?php
          if (!empty($errors)) {
            echo '<div style="color: red; padding: 10px; border: 1px solid red; margin-bottom: 15px;">';
            echo "L'inscription a échoué : <br>";
            foreach ($errors as $error) {
              echo "- " . htmlspecialchars($error) . "<br>";
            }
            echo '</div>';
          }

          if (isset($success_message)) {
            echo '<div style="color: green; padding: 10px; border: 1px solid green; margin-bottom: 15px;">';
            echo htmlspecialchars($success_message);
            echo '</div>';
          }
          ?>

          <p>
            Lorem ipsum dolor sit amet, consectetur adipiscing elit.<br />Suspendisse
            scelerisque in tortor vitae sollicitudin.
          </p>

          <div class="pseudo-box">
            <label for="pseudo">Pseudo</label>
            <input type="text" placeholder="4 caractères minimum" required name="pseudo" />
          </div>

          <div class="email-box">
            <label for="email">Email</label>
            <input type="email" placeholder="Example@gmail.com" required name="email" />
          </div>

          <div class="password-box">
            <label for="password">Mot de passe</label>
            <input
              type="password"
              placeholder="8 caractères minimum"
              required
              minlength="8"
              name="password" />
          </div>

          <div class="password-box">
            <label for="confirm-password">Confirmer le mot de passe</label>
            <input
              type="password"
              id="confirm-password"
              placeholder="8 caractères minimum"
              required
              minlength="8"
              name="password_confirm" />
          </div>

          <button type="submit" class="btn" name="valider">Inscription</button>

          <div class="separateur">Ou</div>

          <div class="google-btn">
            <img
              src="https://www.svgrepo.com/show/355037/google.svg"
              alt="Google logo"
              class="google-icon" />
            <span>Se connecter avec Google</span>
          </div>

          <div class="register-link">
            <p>Déjà inscrit ? <a href="connexion.php">Je me connecte</a></p>
          </div>
        </div>
      </div>
    </form>
  </div>
  <script src="assets/js/register.js"></script>
</body>

</html>