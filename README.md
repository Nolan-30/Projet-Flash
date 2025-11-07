⚡ Base de Données – Flash (Score)

🗃️ Projet SQL complet pour la gestion des utilisateurs, jeux, scores, et messageries (publiques & privées).

🎯 1. Objectif du projet

Ce projet contient le script SQL complet permettant de créer et de remplir une base de données nommée Flash.
Elle permet de gérer :
🎮 des jeux,
👤 des utilisateurs,
🏆 leurs scores,
💬 des messages publics,
📩 ainsi que des messages privés.

📦 2. Contenu principal

Le script SQL exécute automatiquement :

🔹 Création de la base Flash

🔹 Création des tables :

👤 Utilisateur

🎮 Jeu

🏆 Score

💬 Messages

📩 Messages_prives

🔹 Insertion d’un jeu de données complet (exemples d’utilisateurs, scores, messages, etc.)

🧩 3. Prérequis

Avant d’exécuter le script, assurez-vous d’avoir :

✅ MySQL ou MariaDB installé

✅ Un client SQL (ex. : MySQL Workbench ou VS Code + SQLTools)

✅ Les permissions nécessaires pour créer / supprimer une base de données

⚙️ 4. Exécution du script

1️⃣ Ouvrez votre client SQL et connectez-vous à votre serveur local
(ex : root@localhost)

2️⃣ Chargez le fichier SQL du projet (flash.sql)

3️⃣ Exécutez tout le script

⚠️ Le script contient :

```SQL
DROP DATABASE IF EXISTS Flash;
Cela supprime toute base Flash déjà existante avant de la recréer.

🧱 5. Schéma des tables
👤 Table utilisateur

id	INT AUTO_INCREMENT PRIMARY KEY
email	VARCHAR(255) UNIQUE	--Adresse e-mail
pass_word	VARCHAR(255)	--Mot de passe (haché ou non)
pseudo	VARCHAR(100) UNIQUE	--Nom d’utilisateur
created_at	DATETIME	--Date de création
updated_at	DATETIME	--Mise à jour automatique

🎮 Table jeu

id	INT UNSIGNED AUTO_INCREMENT PRIMARY KEY	-- Identifiant du jeu
name	VARCHAR(40) NOT NULL	-- Nom du jeu

🏆 Table score

id	INT UNSIGNED AUTO_INCREMENT PRIMARY KEY	-- Identifiant du score
user_id	INT NOT NULL	-- 🔗 Référence à utilisateur(id)
game_id	INT UNSIGNED NOT NULL	-- 🔗 Référence à jeu(id)
difficulty	ENUM('1','2','3')	-- Niveau de difficulté
score	INT	-- Score obtenu
created_at	DATETIME	-- Date de la partie

💬 Table messages


id	INT AUTO_INCREMENT PRIMARY KEY	-- Identifiant du message
user_id	INT NOT NULL	-- 🔗 Référence à utilisateur(id)
game_id	INT UNSIGNED NOT NULL	-- 🔗 Référence à jeu(id)
message	TEXT	-- Contenu du message
created_at	DATETIME	-- Date d’envoi

📩 Table messages_prives

id	INT AUTO_INCREMENT PRIMARY KEY	-- Identifiant du message privé
user_sender_id	INT NOT NULL	-- 🔗 Expéditeur (utilisateur.id)
user_receiver_id	INT NOT NULL	-- 🔗 Destinataire (utilisateur.id)
message	TEXT NOT NULL	-- Contenu du message
is_read	TINYINT(1) DEFAULT 0	-- Message lu (1) ou non lu (0)
created_at	DATETIME	-- Date d’envoi
read_at	DATETIME DEFAULT NULL	-- Date de lecture

🧠 Toutes les tables utilisent :
Toutes les tables utilisent le moteur InnoDB afin de respecter les contraintes de clés étrangères.
On utiise l'encodage "utf8mb4" pour pouvoir mettre tous les caractères possible dans notre base de donnés.

🧠 6. Bonnes pratiques et remarques
Convention de nommage des tables et des attributs : toute en minuscule et avec un underscore

🧱 Contraintes d’unicité :
Les champs email et pseudo sont UNIQUE.
➤ Évitez les doublons ou utilisez INSERT IGNORE / ON DUPLICATE KEY UPDATE.

🧮 7. Exemples de requêtes utiles
➕ Insertion avec mot de passe haché
INSERT INTO utilisateur (email, pass_word, pseudo)
VALUES ('eva@gmail.com', SHA2('Eva123', 256), 'Eva');


```
