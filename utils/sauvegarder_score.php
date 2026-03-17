<?php
session_start();
$_SESSION['user_id'] = 1; // 👈 AJOUTEZ CETTE LIGNE TEMPORAIREMENT
require_once 'database.php';

// On récupère les données envoyées par le JS (AJAX)
$data = json_decode(file_get_contents('php://input'), true);

if ($data && isset($_SESSION['user_id'])) {
    $score = $data['score']; // Le temps (ex: "01:23")
    $difficulty = $data['difficulty']; // La difficulté
    $game_id = 1; // ID du jeu "Power of Memory" (à adapter selon ta BDD)
    $user_id = $_SESSION['user_id']; // L'ID du joueur connecté

    // Requête SQL pour insérer le score
    $req = $pdo->prepare("INSERT INTO score (game_id, user_id, difficulty, score, created_at) VALUES (:game_id, :user_id, :difficulty, :score, NOW())");

    $req->execute([
        ':game_id' => $game_id,
        ':user_id' => $user_id,
        ':difficulty' => $difficulty,
        ':score' => $score
    ]);

    echo json_encode(["success" => true]);
} else {
    echo json_encode(["success" => false, "message" => "Utilisateur non connecté ou données invalides"]);
}
