# README — Base de données **Flash (Score)**

## 1. But du projet

Ce dépôt contient le script SQL de création et de peuplement d'une petite base de données nommée **Flash**. Cette base sert à gérer des utilisateurs, des jeux, des scores, des messages publics et des messages privés

---

## 2. Contenu principal

Le script SQL réalise :

- Création de la base `Flash`
- Création des tables : `utilisateur`, `jeu`, `score`, `messages`, `messages_prives`.
- Insertion d'un jeu de données d'exemple (utilisateurs, scores, messages, messages privés).

---

## 3. Prérequis

- MySQL (ou MariaDB) installé et accessible.
- Un client SQL (MySQL Workbench, ou VS Code + SQLTools).
- Permissions suffisantes pour créer/supprimer une base.

---

## 4. Comment exécuter le script

1. Ouvrir votre client SQL et vous connecter à votre serveur local (ex : `root@localhost`).
2. Ouvrir le fichier SQL (le script fourni).
3. Exécuter tout le script. Il contient `DROP DATABASE IF EXISTS Flash;` — attention, ça supprimera une base `Flash` existante.

---

## 5. Schéma des tables (récapitulatif)

### `utilisateur`

- `id` INT AUTO_INCREMENT PRIMARY KEY
- `email` VARCHAR(255) NOT NULL UNIQUE
- `pass_word` VARCHAR(255) NOT NULL
- `pseudo` VARCHAR(100) NOT NULL UNIQUE
- `created_at` DATETIME DEFAULT CURRENT_TIMESTAMP
- `updated_at` DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP

### `jeu`

- `id` INT UNSIGNED AUTO_INCREMENT PRIMARY KEY
- `name` VARCHAR(40) NOT NULL

### `score`

- `id` INT UNSIGNED AUTO_INCREMENT PRIMARY KEY
- `user_id` INT NOT NULL — référence `utilisateur(id)`
- `game_id` INT UNSIGNED NOT NULL — référence `jeu(id)`
- `difficulty` ENUM('1','2','3') NOT NULL
- `score` INT NOT NULL
- `created_at` DATETIME NOT NULL

### `messages`

- `id` INT AUTO_INCREMENT PRIMARY KEY
- `user_id` INT NOT NULL — référence `utilisateur(id)`
- `game_id` INT UNSIGNED NOT NULL — référence `jeu(id)`
- `message` TEXT NOT NULL
- `created_at` DATETIME DEFAULT CURRENT_TIMESTAMP

### `messages_prives`

- `id` INT AUTO_INCREMENT PRIMARY KEY
- `user_sender_id` INT NOT NULL — FK -> `utilisateur(id)`
- `user_receiver_id` INT NOT NULL — FK -> `utilisateur(id)`
- `message` TEXT NOT NULL
- `is_read` TINYINT(1) DEFAULT 0
- `created_at` DATETIME DEFAULT CURRENT_TIMESTAMP
- `read_at` DATETIME DEFAULT NULL

Tous les `ENGINE = InnoDB` et `CHARACTER SET = 'utf8mb4'`.

---

## 6. Points importants et bonnes pratiques

- **Hashage des mots de passe** : le script utilise `SHA2('password', 256)` pour insérer certains mots de passe. _Important_ : SHA-256 seul **n'est pas** la meilleure pratique pour stocker des mots de passe en production

- **Unique constraints** : `email` et `pseudo` sont `UNIQUE`. Évitez des `INSERT` qui dupliquent ces valeurs ou gérez-les via `INSERT IGNORE` / `ON DUPLICATE KEY UPDATE` si nécessaire.

---

## 7. Requêtes utiles incluses (exemples)

- **Hashage / insertion** :

```sql
INSERT INTO utilisateur (email, pass_word, pseudo)
VALUES ('eva@gmail.com', SHA2('Eva123',256), 'Eva');
```

- **Vérifier authentification** :

```SQL
SELECT id, email, pseudo
FROM utilisateur
WHERE email = ? AND pass_word = SHA2(?, 256)
LIMIT 1;
```

- **Lister scores avec jeux et utilisateurs** :

```SQL
SELECT jeu.name, utilisateur.pseudo, score.difficulty, score.score, score.created_at
FROM score
INNER JOIN jeu ON score.game_id = jeu.id
INNER JOIN utilisateur ON score.user_id = utilisateur.id
ORDER BY jeu.name, score.difficulty DESC, score.score;
```
