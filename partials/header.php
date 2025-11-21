<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
$page_actuelle = basename($_SERVER['PHP_SELF']);
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

            <a href="gerer_compte.php" class="<?= ($page_actuelle == 'gerer_compte.php') ? 'active' : '' ?>" style="color: #ffcc00; font-weight: bold;">
                <?= htmlspecialchars($_SESSION['pseudo']) ?>
            </a>

            <a href="logout.php">Déconnexion</a>

        <?php else: ?>

            <a href="inscription.php" class="<?= ($page_actuelle == 'inscription.php') ? 'active' : '' ?>">
                Inscription
            </a>
            <a href="connexion.php" class="<?= ($page_actuelle == 'connexion.php') ? 'active' : '' ?>">
                Connexion
            </a>

        <?php endif; ?>
    </nav>
</header>