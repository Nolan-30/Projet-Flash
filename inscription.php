<!DOCTYPE html>
<html lang="fr">
  <head>
    <!-- tête de la page login -->
    <meta charset="utf-8" />
    <link rel="stylesheet" href="assets/css/inscription.css" />
    <title>Inscription</title>
  </head>
  <body>
    <div id="main">
      <div class="column wrapper">
        <form action="">
          <div class="conteneur">
            <h1>Bienvenue chez nous 👋</h1>
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
                placeholder="8 carectères minimum"
                required
                minlength="8"
              />
            </div>
            <div class="confirmer">
              <div class="password-box">
                <label for="password">Confirmer le mot de passe</label>
                <input
                  type="password"
                  placeholder="8 carectères minimum"
                  required
                  minlength="8"
                />
              </div>
            </div>
            <button type="submit" class="btn">Inscription</button>
          </div>
          <div class="separateur">Ou</div>
          <div class="google-btn">
            <img
              src="https://www.svgrepo.com/show/355037/google.svg"
              alt="Google logo"
              class="google-icon"
            />
            <span>Se connecter avec Google</span>
          </div>
          <div class="register-link">
            <p>Dèjà inscrit ? <a href="#">Je me connecte</a></p>
          </div>
        </form>
      </div>
      <figure class="column-fig1">
        <img
          src="C:\Users\adewa\Downloads\vscode101 copie\vscode101 copie\asset\login.jpg"
          alt="Login image"
        />
      </figure>
    </div>
  </body>
</html>
