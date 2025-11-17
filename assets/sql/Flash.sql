-- CREATION DE LA BASE DE DONNEE SCORE
DROP DATABASE IF EXISTS Flash;
CREATE DATABASE Flash CHARACTER SET 'utf8mb4';
USE Flash;
-- TABLE UTILISATEUR
CREATE TABLE utilisateur (
    id INT AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(255) NOT NULL UNIQUE,
    pass_word VARCHAR(255) NOT NULL,
    pseudo VARCHAR(100) NOT NULL UNIQUE,
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
    updated_at DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) CHARACTER SET 'utf8mb4' ENGINE = InnoDB;
-- Insertion des utilisateurs
INSERT INTO utilisateur (email, pass_word, pseudo)
VALUES ('alice@gmail.com', 'Alice123', 'Alice'),
    ('bob@gmail.com', 'Bob123', 'Bob'),
    ('charlie@gmail.com', 'Charlie123', 'Charlie'),
    ('david@gmail.com', 'David123', 'David'),
    ('eva@gmail.com', 'Eva123', 'Eva');
-- Hashage mdp--
INSERT INTO utilisateur(email, pass_word, pseudo)
VALUES (
        "ethan@gmail.com",
        SHA2("Ethan123", 256),
        "Ethan"
    );
-- Mise à jour de l'adresse mail --
UPDATE utilisateur
SET email = "ethannn@gmail.com"
WHERE id = 6;
-- hashage mdp --
UPDATE utilisateur
SET pass_word = SHA2("Eva123", 256)
WHERE id = 5;
SELECT email,
    pass_word
FROM utilisateur
WHERE email = "eva@gmail.com"
    AND pass_word = SHA2("Eva123", 256);
-- Renvoyer l'ID d'un utilisateur en fonct° de son mdp et mail --
SELECT id,
    email,
    pass_word
FROM utilisateur
WHERE email = "eva@gmail.com"
    AND pass_word = SHA2("Eva123", 256);
-- TABLE JEU
CREATE TABLE jeu (
    id INT UNSIGNED NOT NULL AUTO_INCREMENT,
    name VARCHAR(40) NOT NULL,
    PRIMARY KEY (id)
) CHARACTER SET 'utf8mb4' ENGINE = InnoDB;
INSERT INTO jeu (name)
VALUES ('Power of Memory');
-- TABLE SCORE
CREATE TABLE score (
    id INT UNSIGNED NOT NULL AUTO_INCREMENT,
    user_id INT NOT NULL,
    game_id INT UNSIGNED NOT NULL,
    difficulty ENUM('1', '2', '3') NOT NULL,
    score INT NOT NULL,
    created_at DATETIME NOT NULL,
    PRIMARY KEY(id),
    FOREIGN KEY (user_id) REFERENCES utilisateur(id),
    FOREIGN KEY (game_id) REFERENCES jeu(id)
) CHARACTER SET 'utf8mb4' ENGINE = InnoDB;
-- Insertion des scores
INSERT INTO score (user_id, game_id, difficulty, score, created_at)
VALUES (1, 1, '1', 10, '2025-04-11 09:00:00'),
    (2, 1, '1', 15, '2025-04-11 09:30:00'),
    (3, 1, '2', 45, '2025-04-11 10:00:00'),
    (1, 1, '3', 120, '2025-04-11 11:15:00'),
    (4, 1, '2', 30, '2025-04-11 14:00:00'),
    (2, 1, '3', 200, '2025-04-12 08:00:00'),
    (3, 1, '2', 55, '2025-04-12 15:30:00'),
    (4, 1, '1', 5, '2025-04-13 18:00:00'),
    (1, 1, '1', 25, '2025-04-13 20:00:00'),
    (5, 1, '3', 90, '2025-04-14 12:00:00'),
    (5, 1, '2', 65, '2025-04-15 09:45:00'),
    (2, 1, '3', 150, '2025-04-15 16:20:00'),
    (3, 1, '1', 12, '2025-04-16 11:00:00'),
    (4, 1, '2', 75, '2025-04-16 13:00:00'),
    (5, 1, '3', 180, '2025-04-17 07:30:00'),
    (1, 1, '2', 40, '2025-04-17 19:00:00'),
    (2, 1, '3', 110, '2025-04-18 10:40:00'),
    (3, 1, '1', 8, '2025-04-18 21:00:00'),
    (4, 1, '3', 135, '2025-04-19 14:15:00');
-- Story 8 --
INSERT INTO score (user_id, game_id, difficulty, score, created_at)
VALUES (2, 1, '3', 250, NOW());
-- TABLE MESSAGES
CREATE TABLE messages (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    game_id INT UNSIGNED NOT NULL,
    message TEXT NOT NULL,
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
    -- Story 9 --
    FOREIGN KEY (user_id) REFERENCES utilisateur(id),
    FOREIGN KEY (game_id) REFERENCES jeu(id)
) CHARACTER SET 'utf8mb4' ENGINE = InnoDB;
-- Insertion des messages
INSERT INTO messages (game_id, user_id, message, created_at)
VALUES (
        1,
        3,
        'Mission accomplie !',
        '2025-02-14 09:32:17'
    ),
    (
        1,
        1,
        'C’était chaud, mais j’ai réussi !',
        '2025-01-22 18:47:05'
    ),
    (
        1,
        4,
        'Encore un sans faute !',
        '2025-03-02 11:04:53'
    ),
    (
        1,
        2,
        'Je deviens trop fort !',
        '2025-05-11 20:16:41'
    ),
    (
        1,
        5,
        'Facile comme bonjour.',
        '2025-02-07 14:28:09'
    ),
    (
        1,
        3,
        'Un vrai pro du clavier.',
        '2025-04-19 22:51:36'
    ),
    (1, 2, 'Ça, c’est fait.', '2025-06-03 10:07:12'),
    (
        1,
        1,
        'Je gère ça comme un chef.',
        '2025-01-09 16:43:58'
    ),
    (
        1,
        5,
        'Même pas transpiré.',
        '2025-07-24 13:12:46'
    ),
    (
        1,
        4,
        'Trop simple pour moi.',
        '2025-03-29 08:19:22'
    ),
    (1, 1, 'Un jeu d’enfant.', '2025-08-02 19:03:17'),
    (
        1,
        2,
        'Prochain défi, s’il vous plaît !',
        '2025-04-27 23:45:39'
    ),
    (1, 3, 'Toujours au top !', '2025-05-05 07:57:51'),
    (
        1,
        4,
        'Aucune difficulté.',
        '2025-06-18 12:24:33'
    ),
    (
        1,
        5,
        'Je mérite une médaille.',
        '2025-09-01 15:11:42'
    ),
    (
        1,
        2,
        'Même pas besoin d’aide.',
        '2025-02-03 17:39:05'
    ),
    (
        1,
        1,
        'Je progresse à vue d’œil.',
        '2025-07-08 10:56:48'
    ),
    (
        1,
        5,
        'C’est dans la poche !',
        '2025-03-21 21:08:15'
    ),
    (
        1,
        3,
        'Trop rapide pour le système.',
        '2025-10-11 18:25:29'
    ),
    (
        1,
        4,
        'Un de plus à mon actif.',
        '2025-05-30 09:02:44'
    ),
    (
        1,
        2,
        'Je suis imbattable.',
        '2025-06-13 22:34:18'
    ),
    (
        1,
        5,
        'Encore une victoire !',
        '2025-01-18 11:41:37'
    ),
    (
        1,
        1,
        'Je pourrais faire ça les yeux fermés.',
        '2025-08-29 16:52:26'
    ),
    (
        1,
        3,
        'Objectif atteint !',
        '2025-09-17 20:05:11'
    ),
    (
        1,
        1,
        'Trop simple pour moi.',
        '2025-03-10 11:01:22'
    );
-- Story 10
SELECT m.message AS Contenu_du_message,
    u.pseudo AS Nom_du_joueur,
    m.created_at AS Date_et_heure_du_message,
    (
        CASE
            WHEN m.user_id = 1 THEN TRUE
            ELSE FALSE
        END
    ) AS isSender
FROM messages m
    JOIN utilisateur u ON m.user_id = u.id
WHERE m.created_at >= DATE_SUB(NOW(), INTERVAL 24 HOUR)
ORDER BY m.created_at ASC;
-- Story 11 --
CREATE TABLE messages_prives (
    id INT NOT NULL AUTO_INCREMENT,
    user_sender_id INT NOT NULL,
    user_receiver_id INT NOT NULL,
    message TEXT NOT NULL,
    is_read TINYINT(1) DEFAULT 0,
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
    read_at DATETIME DEFAULT NULL,
    PRIMARY KEY (id),
    FOREIGN KEY (user_sender_id) REFERENCES utilisateur(id),
    FOREIGN KEY (user_receiver_id) REFERENCES utilisateur(id)
) CHARACTER SET 'utf8mb4' ENGINE = InnoDB;
-- Story 12 --
INSERT INTO messages_prives (
        user_sender_id,
        user_receiver_id,
        message,
        is_read,
        created_at
    )
VALUES (
        1,
        2,
        'Ce jeu est trop facile !',
        0,
        '2025-11-01 18:23:00'
    ),
    (
        2,
        1,
        'J’ai amélioré mon score hier !',
        1,
        '2025-11-01 18:25:00'
    ),
    (
        3,
        1,
        'Tu ne va jamais battre mon score',
        0,
        '2025-11-02 14:42:00'
    ),
    (
        1,
        3,
        'Pourquoi pas, on joue à quelle heure ?',
        0,
        '2025-11-02 14:45:00'
    ),
    (4, 2, 'Enfin !!!', 1, '2025-11-03 19:00:00'),
    (
        2,
        4,
        'GG ! Tu as utilisé quelle stratégie ?',
        0,
        '2025-11-03 19:03:00'
    ),
    (
        1,
        4,
        'On se refait une partie demain ?',
        0,
        '2025-11-03 21:10:00'
    ),
    (
        4,
        1,
        'Avec plaisir ! Je serai dispo vers 20h.',
        0,
        '2025-11-03 21:12:00'
    ),
    (
        3,
        2,
        'T’as vu la nouvelle mise à jour du jeu ?',
        1,
        '2025-11-04 10:30:00'
    ),
    (
        2,
        3,
        'Oui, les cartes sont beaucoup mieux !',
        0,
        '2025-11-04 10:35:00'
    ),
    (
        4,
        3,
        'Je trouve que le nouveau design est pas mal',
        0,
        '2025-11-04 17:40:00'
    ),
    (
        3,
        4,
        'C est trop dur ',
        0,
        '2025-11-04 17:45:00'
    ),
    (
        1,
        2,
        'J’ai battu mon record 3 parties d’affilée !',
        1,
        '2025-11-05 11:00:00'
    ),
    (
        2,
        1,
        'Incroyable, t’es imbattable !',
        0,
        '2025-11-05 11:05:00'
    ),
    (
        4,
        1,
        'Tu joues encore ce soir ?',
        0,
        '2025-11-05 13:30:00'
    ),
    (1, 4, 'Oui.', 0, '2025-11-05 13:35:00'),
    (
        2,
        3,
        'On essaye de battre le record ?',
        0,
        '2025-11-05 15:20:00'
    ),
    (3, 2, 'Carrément !', 0, '2025-11-05 15:22:00'),
    (1, 3, 'Trop bien !', 0, '2025-11-05 16:00:00'),
    (3, 1, 'Merci !', 0, '2025-11-05 16:05:00');
INSERT INTO messages_prives (
        user_sender_id,
        user_receiver_id,
        message,
        is_read,
        created_at
    )
VALUES (1, 2, 'J ai le record !', 0, NOW());
SELECT sender.pseudo,
    receiver.pseudo,
    messages_prives.message,
    messages_prives.created_at,
    messages_prives.is_read
FROM messages_prives
    INNER JOIN utilisateur sender ON messages_prives.user_sender_id = sender.id
    INNER JOIN utilisateur receiver ON messages_prives.user_receiver_id = receiver.id
    INNER JOIN (
        SELECT user_2_id,
            MAX(created_at) AS max_created_at
        FROM (
                SELECT user_receiver_id AS user_2_id,
                    created_at
                FROM messages_prives
                WHERE user_sender_id = 1
                UNION ALL
                SELECT user_sender_id AS user_2_id,
                    created_at
                FROM messages_prives
                WHERE user_receiver_id = 1
            ) AS toutes_les_conversations
        GROUP BY user_2_id
    ) AS last_msg ON messages_prives.created_at = last_msg.max_created_at
    AND (
        (
            messages_prives.user_sender_id = 1
            AND messages_prives.user_receiver_id = last_msg.user_2_id
        )
        OR (
            messages_prives.user_receiver_id = 1
            AND messages_prives.user_sender_id = last_msg.user_2_id
        )
    )
ORDER BY messages_prives.created_at DESC;
-- Story 6 --
SELECT jeu.name,
    utilisateur.pseudo,
    score.difficulty,
    score.score,
    score.created_at
FROM score
    INNER JOIN jeu ON score.game_id = jeu.id
    INNER JOIN utilisateur ON score.user_id = utilisateur.id
ORDER BY jeu.name,
    score.difficulty DESC,
    score.score DESC;
-- Story 7 --
SELECT jeu.name,
    utilisateur.pseudo,
    score.difficulty,
    score.score,
    score.created_at
FROM score
    INNER JOIN jeu ON score.game_id = jeu.id
    INNER JOIN utilisateur ON score.user_id = utilisateur.id
WHERE utilisateur.pseudo LIKE "%A%"
ORDER BY jeu.name,
    score.difficulty DESC,
    score.score;