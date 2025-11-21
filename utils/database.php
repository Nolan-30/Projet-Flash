<?php
function connectToBandGetPDO()
{
    $username = 'root';
    $password = 'root';
    $dsn = 'mysql:host=localhost;dbname=flash';

    return new PDO(
        $dsn,
        $username,
        $password
    );
}
$pdo = connectToBandGetPDO();
