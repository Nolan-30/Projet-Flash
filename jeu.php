<?php
session_start();
$host = 'localhost';
$db   = 'flash';
$user = 'root';
$pass = '';
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$options = [
  PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
  PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
  PDO::ATTR_EMULATE_PREPARES   => false,
];

try {
  $pdo = new PDO($dsn, $user, $pass, $options);
} catch (\PDOException $e) {
  die('Erreur de connexion à la base de données: ' . $e->getMessage());
}

$connected_user_id = $_SESSION['userId'] ?? null;
$game_id = 1;
$submission_error = null;


if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['message_content_form'])) {

  if ($connected_user_id === null) {
    $submission_error = "Vous devez être connecté pour envoyer un message.";
  } else {
    $message_content = trim($_POST['message_content_form']);

    if (!empty($message_content)) {
      $sql = "INSERT INTO messages (user_id, game_id, message, created_at) VALUES (?, ?, ?, NOW())";

      try {
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$connected_user_id, $game_id, $message_content]);

        header('Location: ' . $_SERVER['PHP_SELF']);
        exit;
      } catch (\PDOException $e) {
        $submission_error = "Erreur lors de l'enregistrement du message: " . $e->getMessage();
      }
    } else {
      $submission_error = "Le message ne peut être vide.";
    }
  }
}


$messages_data = [];

try {
  $time_limit = date('Y-m-d H:i:s', strtotime('-24 hours'));

  $sql = "
        SELECT 
            m.id, 
            m.user_id, 
            m.message, 
            m.created_at,
            u.pseudo
        FROM 
            messages m
        JOIN 
            utilisateur u ON m.user_id = u.id
        WHERE 
            m.game_id = ? AND m.created_at >= ?
        ORDER BY 
            m.created_at ASC
    ";

  $stmt = $pdo->prepare($sql);
  $stmt->execute([$game_id, $time_limit]);
  $messages_data = $stmt->fetchAll();
} catch (\PDOException $e) {
  $messages_data = null;
}



?>
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
  <div id="main">
    <?php
    $page = "jeu";
    include './partials/header.php';
    ?>
    <div class="milieu1">
      <h1>La puissance de la mémoire</h1>
      <p>Teste ta mémoire en t'amusant ! !</p>
    </div>
    <div class="milieu2">
      <div class="options-jeu">
        <div>
          <label for="select-theme"> Thème</label>
          <select id="select-theme" name="theme">
            <option value="jeuxvideo"> Jeux Vidéo</option>
            <option value="animaux"> Animaux</option>
            <option value="cuisine"> Cuisine</option>
          </select>
        </div>

        <div>
          <label for="select-difficulte">📏 Difficulté</label>
          <select id="select-difficulte" name="difficulte">
            <option value="facile">Facile (4x4)</option>
            <option value="moyen">Moyen (6x4)</option>
            <option value="difficile">Difficile (6x6)</option>
          </select>
        </div>

        <button id="lancer-partie" class="bouton-lancement">Lancer la partie</button>
      </div>

      <div id="chronometre" style="font-size: 2em; display: none;">
        00:00
      </div>
    </div>
    <div class="game-grid">
      <?php for ($i = 0; $i < 16; $i++) : ?>
        <div class="cell">
          <img src="assets/images/images.jpeg" alt="images" />
        </div>
      <?php endfor; ?>
    </div>
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
        <?php if ($messages_data === null) : ?>
          <div class="message-error">Erreur lors du chargement des messages.</div>
        <?php elseif (empty($messages_data)) : ?>
          <div class="message-info">Aucun message récent (moins de 24h).</div>
        <?php else : ?>
          <?php foreach ($messages_data as $message) :
          ?>

            <?php

            $is_sent = ($message['user_id'] == $connected_user_id);
            $message_class = $is_sent ? 'message sent' : 'message';
            $avatar_text = htmlspecialchars(substr($message['pseudo'] ?? '?', 0, 2));
            $time_formatted = (new DateTime($message['created_at']))->format('H:i');
            ?>

            <div class="<?= $message_class ?>">
              <div class="message-avatar"><?= $avatar_text ?></div>
              <div class="message-content">
                <div class="message-bubble"><?= htmlspecialchars($message['message']) ?></div>
                <div class="message-time"><?= $time_formatted ?></div>
              </div>
            </div>
          <?php endforeach;
          ?>
        <?php endif; ?>
      </div>

      <form method="POST" action="<?= htmlspecialchars($_SERVER['PHP_SELF']) ?>" class="chatbot-input-container">
        <?php if ($submission_error) : ?>
          <p style="color: red; text-align: center; margin: 5px 0;"><?= $submission_error ?></p>
        <?php endif; ?>

        <?php if ($connected_user_id !== null) :
        ?>
          <div class="chatbot-input-wrapper">
            <input
              type="text"
              name="message_content_form"
              class="chatbot-input"
              placeholder="Votre message..."
              required />
            <button type="submit" class="send-button">➤</button>
          </div>
        <?php else :
        ?>
          <p style="text-align: center; padding: 10px;">
            <a href="connexion.php" style="color: #007bff; text-decoration: none;">Connectez-vous</a> pour participer au chat.
          </p>
        <?php endif; ?>

      </form>
    </div>
    <?php
    include './partials/footer.php';
    ?>
    <script src="assets/js/jeu.js"></script>
</body>

</html>