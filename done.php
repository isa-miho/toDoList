<?php
include 'conn.php';

if (isset($_GET['task_id'])) {
    $id = $_GET['task_id'];
    var_dump($id);
    // Atualizar status da tarefa para "concluída"
    $sql = "UPDATE task SET status_tarefa = 'concluída' WHERE task_id = $id";
    if (mysqli_query($conn, $sql)) {
        echo '<script>alert("Tarefa marcada como concluída!"); window.location.href = "index.php";</script>';
    } else {
        echo '<script>alert("Erro ao marcar tarefa como concluída!"); window.location.href = "index.php";</script>';
    }
}
?>

