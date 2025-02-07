<?php
$hostname = 'localhost';
$username = 'root';
$password = '';
$db = 'db_task'; // Nome do seu banco de dados

$conn = new mysqli($hostname, $username, $password, $db);

if ($conn->connect_error) {
    die("Erro ao conectar: " . $conn->connect_error);
}
?>
