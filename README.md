# 🧠 Power of Memory & ⚡ Base de Données Flash
Bienvenue sur Power of Memory, une plateforme web interactive Full Stack dédiée aux passionnés de jeux de mémoire et de défis entre amis. Ce projet inclut un frontend dynamique, un backend robuste en PHP, et repose sur la base de données relationnelle Flash pour gérer les utilisateurs, les scores et les messageries. 🚀

## ✨ Fonctionnalités Principales
🎮 Jeu de Mémoire Dynamique : Choisissez votre thème (Jeux Vidéo, Animaux, Cuisine) et votre niveau de difficulté (Facile 4x4, Normal 6x4, Difficile 6x6).

👤 Espace Membre Sécurisé : Inscription, connexion, et gestion de session avec hachage des mots de passe (SHA2).

🖼️ Profil Personnalisé : Modification des informations (email, mot de passe) et upload de photo de profil avec redimensionnement automatique.

💬 Messagerie Intégrée : Chat communautaire (messages publics) accessible pendant les parties et gestion de messages privés entre utilisateurs.

🏆 Classements & Statistiques : Affichage en temps réel des meilleurs scores, du nombre total de parties jouées et du nombre de joueurs inscrits.

✉️ Support : Page de contact avec formulaire et carte interactive.

## 🛠️ Technologies Utilisées
Frontend : HTML5, CSS3, JavaScript (Vanilla).

Backend : PHP 8.x (Gestion des sessions, PDO pour la connexion SQL).

Base de données : MySQL / MariaDB.

Serveur local recommandé : WAMP, XAMPP, ou MAMP.

## 🗃️ Architecture de la Base de Données (Flash)
La base de données est construite avec le moteur InnoDB (pour garantir l'intégrité des clés étrangères) et utilise l'encodage utf8mb4 pour supporter tous les caractères (y compris les emojis).

🧩 Schéma des tables :
👤 utilisateur : Gestion des joueurs (id, email UNIQUE, pass_word, pseudo UNIQUE, created_at, updated_at).

🎮 jeu : Catalogue des jeux (id, name).

🏆 score : Historique des parties (id, user_id 🔗, game_id 🔗, difficulty, score, created_at).

💬 messages : Chat global (id, user_id 🔗, game_id 🔗, message, created_at).

📩 messages_prives : Messagerie entre joueurs (id, user_sender_id 🔗, user_receiver_id 🔗, message, is_read, created_at, read_at).

💡 Bonnes Pratiques & Convention : Le nommage des tables et attributs est 100% en minuscules avec des underscores (_). Les mots de passe sont hachés via SHA2(..., 256).

###  🚀 Comment lancer le projet ?
1️⃣ Prérequis
Avoir installé un environnement serveur local (WAMP, XAMPP, etc.).

Avoir un navigateur web moderne.

Avoir un client SQL (PhpMyAdmin, DBeaver, VS Code + SQLTools).

2️⃣ Installation de la Base de Données
Lancez votre serveur MySQL et ouvrez votre client SQL.

Chargez et exécutez le script SQL fourni (flash.sql).

⚠️ Attention : Le script contient DROP DATABASE IF EXISTS Flash;. Cela supprimera et recréera la base de données avec un jeu de données de test complet.

3️⃣ Configuration du Code
Placez le dossier complet du projet dans le répertoire racine de votre serveur web (ex: www pour WAMP, ou htdocs pour XAMPP).

Ouvrez le fichier utils/database.php.

Vérifiez et adaptez vos identifiants de connexion si nécessaire (par défaut sous XAMPP/WAMP : utilisateur root, pas de mot de passe).

4️⃣ Lancement
Démarrez les modules Apache et MySQL de votre serveur local.

Ouvrez votre navigateur et accédez à l'adresse suivante :
👉 http://localhost/nom_de_votre_dossier/accueil.php

👥 Équipe & Crédits
Ce projet collaboratif a été réalisé en groupe avec un objectif pédagogique clair : maîtriser les concepts fondamentaux du développement web Full Stack (de la création de l'interface graphique à la conception de la base de données, en passant par la logique serveur).
