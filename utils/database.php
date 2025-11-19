<?php
function connectToBandGetPDO()
{
    $username = 'root';
    $password = '';
    $dsn = 'mysql:host=localhost;dbname=flash';

    return new PDO(
        $dsn,
        $username,
        $password
    );
}
$pdo = connectToBandGetPDO();
