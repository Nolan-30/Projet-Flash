---------------------------------------------------------------------------------------------------
--                       CREATION DE LA BASE DE DONNEE SCORE--
---------------------------------------------------------------------------------------------------
DROP DATABASE IF EXISTS Flash;
CREATE DATABASE Flash CHARACTER SET 'utf8mb4';
USE Flash ---------------------------------------------------------------------------------------------------
---                                   RAFIL                                   ---
---------------------------------------------------------------------------------------------------
CREATE TABLE 'utilisateur' (
    id INT AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(255) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    pseudo VARCHAR(100) NOT NULL,
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
    updated_at DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) CHARACTER SET 'utf8mb4' ENGINE = InnoDB;
---------------------------------------------------------------------------------------------------
--                   NOLAN --
--                  La difficulté ne pourra être que 1, 2 ou 3 --
---------------------------------------------------------------------------------------------------
CREATE TABLE score (
    id INT UNSIGNED NOT NULL AUTO_INCREMENT,
    user_id VARCHAR(40) NOT NULL,
    game_id INT UNSIGNED NOT NULL,
    difficulty ENUM('1', '2', '3') NOT NULL,
    score INT NOT NULL,
    created_at DATE NOT NULL,
    PRIMARY KEY(id)
) CHARACTER SET 'utf8mb4' ENGINE = InnoDB;
---------------------------------------------------------------------------------------------------
--                                Pour changer "userr_id" en "user_id"--
---------------------------------------------------------------------------------------------------
ALTER TABLE score CHANGE COLUMN userr_id user_id INT;
INSERT INTO score (user_id, game_id, difficulty, score, created_at)
VALUES (1, 1, 1, 10, '2025-04-11');
---------------------------------------------------------------------------------------------------
--                                    ETHAN                                    --
---------------------------------------------------------------------------------------------------
CREATE TABLE jeu (
    id INT UNSIGNED NOT NULL AUTO_INCREMENT,
    name VARCHAR(40) NOT NULL,
    PRIMARY KEY (id)
) CHARACTER SET 'utf8mb4' ENGINE = INNODB;
INSERT INTO jeu (name)
VALUES ('Power of Memory');
---------------------------------------------------------------------------------------------------
--                                      NOA                                                --
---------------------------------------------------------------------------------------------------
CREATE TABLE messages (
    id INT UNSIGNED NOT NULL AUTO_INCREMENT,
    game_id INT UNSIGNED NOT NULL,
    user_id INT UNSIGNED NOT NULL,
    message TEXT,
    created_at DATETIME NOT NULL,
    PRIMARY KEY (id)
) ---------------------------------------------------------------------------------------------------
--                                      NOA                                                --
---------------------------------------------------------------------------------------------------
INSERT INTO messages(game_id, user_id, message, created_at)
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