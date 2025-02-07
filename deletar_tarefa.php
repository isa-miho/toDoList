<?php
include 'conn.php';

if (isset($_GET['task_id'])) {
    $id = $_GET['task_id'];

    // Excluir tarefa do banco de dados
    $sql = "DELETE FROM task WHERE task_id = $id";
    if (mysqli_query($conn, $sql)) {
        echo '<script>alert("Tarefa excluída com sucesso!"); window.location.href = "index.php";</script>';
    } else {
        echo '<script>alert("Erro ao excluir a tarefa!"); window.location.href = "index.php";</script>';
    }
}
?>