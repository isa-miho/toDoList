<?php
require_once 'conn.php';

$task_id = filter_input(INPUT_GET, 'task_id', FILTER_SANITIZE_NUMBER_INT);
$status_update = filter_input(INPUT_GET, 'status', FILTER_SANITIZE_STRING);

if ($task_id && $status_update) {
    $stmt = $conn->prepare("UPDATE `task` SET `status` = ? WHERE `task_id` = ?");
    $stmt->bind_param("si", $status_update, $task_id);

    if ($stmt->execute()) {
        header("Location: index.php");
        exit;
    } else {
        echo "Erro ao atualizar a tarefa.";
    }
}
?>
