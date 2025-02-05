<?php
require_once 'conn.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $task = filter_input(INPUT_POST, 'task', FILTER_SANITIZE_STRING);

    if (!empty($task)) {
        $stmt = $conn->prepare("INSERT INTO `task` (`task`, `status`) VALUES (?, 'Pending')");
        $stmt->bind_param("s", $task);

        if ($stmt->execute()) {
            header("Location: index.php");
            exit;
        } else {
            echo "Erro ao adicionar tarefa.";
        }
    }
}
?>
