<?php
$page_actuelle = basename($_SERVER['PHP_SELF']);
?>

<header>
    <div class="logo">
        <img src="assets/images/manette.png" alt="Logo">
    </div>
    <nav>
        <a href="accueil.php" class="<?= ($page_actuelle == 'accueil.php') ? 'active' : '' ?>">
            Accueil
        </a>

        <a href="score.php" class="<?= ($page_actuelle == 'score.php') ? 'active' : '' ?>">
            Scores
        </a>

        <a href="contacte.php" class="<?= ($page_actuelle == 'contacte.php') ? 'active' : '' ?>">
            Nous contacter
        </a>
    </nav>
</header>