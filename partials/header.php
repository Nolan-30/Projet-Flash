<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
$page_actuelle = basename($_SERVER['PHP_SELF']);

function getProfilePicturePath($userId, $default = 'assets/img/default-profile.png')
{
    $filePath = "userFiles/{$userId}/profile.png";

    return file_exists($filePath) ? "{$filePath}?v=" . time() : $default;
}
?>

<header>
    <div class="logo">
        <a href="accueil.php">
            <img src="assets/images/manette.png" alt="Logo">
        </a>
    </div>
    <nav>
        <a href="accueil.php" class="<?= ($page_actuelle == 'accueil.php') ? 'active' : '' ?>">
            Accueil
        </a>

        <a href="score.php" class="<?= ($page_actuelle == 'score.php') ? 'active' : '' ?>">
            Scores
        </a>

        <a href="contact.php" class="<?= ($page_actuelle == 'contact.php') ? 'active' : '' ?>">
            Nous contacter
        </a>

        <?php if (isset($_SESSION['userId'])): ?>
            <?php
            $userId = $_SESSION['userId'];
            $profilePicPath = getProfilePicturePath($userId);
            ?>

            <a href="gerer_compte.php" class="<?= ($page_actuelle == 'gerer_compte.php') ? 'active' : '' ?> profile-link">
                <img src="<?= htmlspecialchars($profilePicPath) ?>" alt="Photo de profil" class="profile-pic-nav">
                <span class="pseudo-text"><?= htmlspecialchars($_SESSION['pseudo']) ?></span>
            </a>

            <a href="logout.php">Déconnexion</a>

        <?php else: ?>

            <a href="inscription.php" class="<?= ($page_actuelle == 'inscription.php') ? 'active' : '' ?>">
                Inscription
            </a>

            <a href="connexion.php" class="<?= ($page_actuelle == 'connexion.php') ? 'active' : '' ?>" style="background-color: #d80027; font-weight: bold;">
                Connexion
            </a>
        <?php endif; ?>
    </nav>
</header>