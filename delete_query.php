<?php
require_once 'conn.php';

$task_id = filter_input(INPUT_GET, 'task_id', FILTER_SANITIZE_NUMBER_INT);

if ($task_id) {
    $stmt = $conn->prepare("DELETE FROM `task` WHERE `task_id` = ?");
    $stmt->bind_param("i", $task_id);

    if ($stmt->execute()) {
        header("Location: index.php");
        exit;
    } else {
        echo "Erro ao excluir a tarefa.";
    }
}
?>
