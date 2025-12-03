<?php
session_start();

try {
  $connexion = new PDO('mysql:host=localhost;dbname=Flash;charset=utf8mb4', 'root', '');
  $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
  die("Erreur de connexion à la base de données : " . $e->getMessage());
}

$errors = [];

if (isset($_POST['valider'])) {

  $email = isset($_POST['email']) ? $_POST['email'] : '';
  $password = isset($_POST['password']) ? $_POST['password'] : '';

  if (empty($email) || empty($password)) {
    $errors[] = "Veuillez remplir tous les champs.";
  } else {

    $reqUser = $connexion->prepare("SELECT id, pseudo, pass_word FROM utilisateur WHERE email = ?");
    $reqUser->execute([$email]);
    $user = $reqUser->fetch();

    if ($user && password_verify($password, $user['pass_word'])) {

      $_SESSION['userId'] = $user['id'];
      $_SESSION['pseudo'] = $user['pseudo'];
      $_SESSION['email'] = $user['email'];

      header('Location: accueil.php');
      exit();
    } else {
      $errors[] = "L'email ou le mot de passe est incorrect.";
    }
  }
}
?>

<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="utf-8" />
  <link rel="stylesheet" href="assets/css/connexion.css" />
  <title>Connexion</title>
</head>

<body>
  <figure class="fig1">
    <img src="assets/images/login.png" alt="Login image" />
  </figure>

  <div class="enveloppe">
    <form action="" method="POST">
      <div class="position-conteneur">
        <div class="conteneur">
          <h1>Heureux de vous revoir 👋</h1>

          <?php
          if (!empty($errors)) {
            echo '<div style="color: red; border: 1px solid red; padding: 10px; margin-bottom: 15px; border-radius: 8px;">';
            foreach ($errors as $error) {
              echo htmlspecialchars($error) . "<br>";
            }
            echo '</div>';
          }
          ?>

          <p>Connectez-vous pour reprendre votre partie.</p>

          <div class="email-box">
            <label for="email">Email</label>
            <input type="email" placeholder="Example@gmail.com" required name="email"
              value="<?php echo isset($_POST['email']) ? htmlspecialchars($_POST['email']) : ''; ?>" />
          </div>

          <div class="password-box">
            <label for="password">Mot de passe</label>
            <input type="password" placeholder="Votre mot de passe" required name="password" />

            <div class="remember-forgot">
              <a href="#" class="forgot">Mot de passe oublié ?</a>
            </div>

            <button type="submit" class="btn" name="valider">Connexion</button>
          </div>

          <div class="separateur">Ou</div>

          <div class="google-btn">
            <img src="https://www.svgrepo.com/show/355037/google.svg" alt="Google logo" class="google-icon" />
            <span>Se connecter avec Google</span>
          </div>

          <div class="register-link">
            <p>Pas de compte ? <a href="inscription.php">Je m'inscris</a></p>
          </div>
        </div>
      </div>
    </form>
  </div>
</body>

</html>