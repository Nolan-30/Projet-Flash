<?php

function uploadProfilePicture(int $userId, array $file): bool|string
{
    $targetDir = "userFiles/{$userId}/";
    $fileName = "profile.png";
    $targetFile = $targetDir . $fileName;

    $allowedMimeTypes = ['image/jpeg', 'image/png', 'image/gif'];
    $allowedExtensions = ['jpg', 'jpeg', 'png', 'gif'];

    $targetWidth = 200;
    $targetHeight = 200;

    $fileExtension = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));

    if (!in_array($fileExtension, $allowedExtensions)) {
        return "Extension de fichier non autorisée : ." . htmlspecialchars($fileExtension);
    }

    $fileMimeType = false;

    if (function_exists('mime_content_type')) {
        $fileMimeType = mime_content_type($file['tmp_name']);
    }

    if ($fileMimeType === false || !in_array($fileMimeType, $allowedMimeTypes)) {
        return "Seuls les fichiers JPG, JPEG, PNG, GIF sont autorisés (Type MIME: " . htmlspecialchars($fileMimeType) . ")";
    }

    if ($file['size'] > 5000000) {
        return "Le fichier est trop volumineux (max 5 Mo).";
    }

    if (!is_dir($targetDir)) {
        if (!mkdir($targetDir, 0777, true)) {
            return "Erreur lors de la création du répertoire utilisateur.";
        }
    }


    $image = false;
    switch ($fileMimeType) {
        case 'image/jpeg':
        case 'image/jpg':
            $image = imagecreatefromjpeg($file['tmp_name']);
            break;
        case 'image/png':
            $image = imagecreatefrompng($file['tmp_name']);
            break;
        case 'image/gif':
            $image = imagecreatefromgif($file['tmp_name']);
            break;
    }

    if ($image === false) {
        return "Erreur GD: Impossible de charger l'image. Vérifiez que l'extension 'gd' est activée.";
    }

    $originalWidth = imagesx($image);
    $originalHeight = imagesy($image);

    $minSide = min($originalWidth, $originalHeight);

    $cropX = ($originalWidth - $minSide) / 2;
    $cropY = ($originalHeight - $minSide) / 2;

    $thumb = imagecreatetruecolor($targetWidth, $targetHeight);

    imagealphablending($thumb, false);
    imagesavealpha($thumb, true);

    if (!imagecopyresampled(
        $thumb,
        $image,
        0,
        0,
        $cropX,
        $cropY,
        $targetWidth,
        $targetHeight,
        $minSide,
        $minSide
    )) {
        imagedestroy($image);
        imagedestroy($thumb);
        return "Erreur lors du redimensionnement de l'image.";
    }

    $saveSuccess = imagepng($thumb, $targetFile, 9);

    imagedestroy($image);
    imagedestroy($thumb);

    if ($saveSuccess) {
        return true;
    } else {
        return "Échec de l'enregistrement de l'image redimensionnée. Vérifiez les permissions d'écriture.";
    }
}
