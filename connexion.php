<!DOCTYPE html>
<html lang="fr">

<head>
  <!-- tête de la page login -->
  <meta charset="utf-8" />
  <link rel="stylesheet" href="assets/css/connexion.css" />
  <title>Connexion</title>
</head>

<body>
  <!-- page -->
  <figure class="fig1">
    <img src="assets/images/login.png" />
  </figure>
</body>

<body>
  <div class="enveloppe">
    <form action="">
      <div class="position-conteneur">
        <div class="conteneur">
          <h1>Heureux de vous revoir 👋</h1>
          <p>
            Lorem ipsum dolor sit amet, consectetur adipiscing elit.<br />Suspendisse
            scelerisque in tortor vitae sollicitudin.
          </p>

          <div class="email-box">
            <label for="email">Email</label>
            <input type="email" placeholder="Example@gmail.com" required />
          </div>

          <div class="password-box">
            <label for="password">Mot de passe</label>
            <input
              type="password"
              placeholder="8 caractères minimum"
              required
              minlength="8" />
            <div class="remember-forgot">
              <a href="#" class="forgot">Mot de passe oublié ?</a>
            </div>
            <button type="submit" class="btn">Connexion</button>
          </div>

          <div class="separateur">Ou</div>

          <div class="google-btn">
            <img
              src="https://www.svgrepo.com/show/355037/google.svg"
              alt="Google logo"
              class="google-icon" />
            <span>Se connecter avec Google</span>
          </div>

          <div class="register-link">
            <p>Pas de compte ? <a href="#">Je m'inscris</a></p>
          </div>
        </div>
      </div>
    </form>
  </div>
</body>

</html>