<?php
$conn = new mysqli("localhost", "root", "", "db_task");

// Verifica se houve erro na conexão
if ($conn->connect_error) {
    die("Error: " . $conn->connect_error);
}
?>
