Absolument ! J'ai analysé tes fichiers. L'objectif est d'afficher l'image de chaque jeu (comme FIFA ou GTA) dynamiquement depuis ta base de données, au lieu de l'image "BO6.jpg" qui est codée en dur.

Il y a deux choses principales à corriger : ta requête SQL est invalide et ne récupère pas l'image, et ta boucle HTML n'utilise pas la bonne variable.

Voici les corrections.

1. Corriger la requête SQL
Ta requête PHP actuelle contient une erreur de syntaxe dans le ORDER BY et, surtout, elle ne sélectionne pas la colonne images de ta table jeu.



/* 2. Mettre à jour la boucle HTML
Maintenant que $scores contient la colonne images, il faut l'utiliser dans ta boucle. On va aussi :

Remplacer l'image codée en dur.

Gérer le cas de "Power of Memory" qui a NULL (vide) dans la colonne images (en utilisant "BO6.jpg" comme image par défaut).

Corriger les petites erreurs de syntaxe HTML (un </td> en trop et un < en trop).

    Ajouter htmlspecialchars() par sécurité, pour éviter les failles XSS.

    Remplace ton <tbody> actuel :

    HTML

    <tbody>


        <?php foreach ($scores as $score) : ?>
            <tr>

                <td> <?= $score['id'] ?> </td>
                <img src="assets/images/BO6.jpg" height="50" />

                <p><?= $score['name'] ?></p>
                </td>
                </td>

                <td> <?= $score['pseudo'] ?> </td>
                <td> <?= $score['difficulty'] ?> </td>

                <td> <?= $score['score'] ?> </td>
                <<td> <?= $score['created_at'] ?> </td>
            </tr>
        <?php endforeach; ?>


    </tbody>
    ... par celui-ci :

    HTML
    <tbody>

        <?php foreach ($scores as $score) : ?>
            <tr>
                <td> <?= htmlspecialchars($score['id']) ?> </td>
                <td>
                    <?php
                    $image_path = $score['images'];
                    if (empty($image_path)) {

                        $image_path = 'assets/images/BO6.jpg';
                    }
                    ?>
                    <img src="<?= htmlspecialchars($image_path) ?>" height="50" alt="<?= htmlspecialchars($score['name']) ?>" />
                    <p><?= htmlspecialchars($score['name']) ?></p>
                </td>
                <td> <?= htmlspecialchars($score['pseudo']) ?> </td>
                <td> <?= htmlspecialchars($score['difficulty']) ?> </td>
                <td> <?= htmlspecialchars($score['score']) ?> </td>
                <td> <?= htmlspecialchars($score['created_at']) ?> </td>
            </tr>
        <?php endforeach; ?>

    </tbody>
    Résumé des changements
    Requête SQL : Sélectionne maintenant jeu.images et a un ORDER BY corrigé pour trier les scores logiquement.

    HTML : La balise <img> utilise le chemin <?= htmlspecialchars($image_path) ?> qui vient de la base de données.

    Logique PHP : Une petite condition a été ajoutée pour afficher BO6.jpg si le chemin de l'image est vide dans la base de données (ce qui est le cas pour "Power of Memory").

    Nettoyage : Les petites erreurs de syntaxe HTML ( </td> et <) ont été retirées.

        Avec ces modifications, ta page devrait afficher la bonne image pour chaque jeu, tout en gardant l'image par défaut pour "Power of Memory" .