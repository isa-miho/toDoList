<?php
require_once 'conn.php';

$task_id = filter_input(INPUT_GET, 'task_id', FILTER_SANITIZE_NUMBER_INT);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $task = trim(filter_input(INPUT_POST, 'task', FILTER_SANITIZE_STRING));
    $status = filter_input(INPUT_POST, 'status', FILTER_SANITIZE_STRING);

    if (!empty($task) && !empty($status)) {
        $stmt = $conn->prepare("UPDATE `task` SET `task` = ?, `status` = ? WHERE `task_id` = ?");
        $stmt->bind_param("ssi", $task, $status, $task_id);

        if ($stmt->execute()) {
            header("Location: index.php");
            exit;
        } else {
            echo "Erro ao atualizar a tarefa.";
        }
    } else {
        echo "O campo não pode estar vazio.";
    }
}

$stmt = $conn->prepare("SELECT `task`, `status` FROM `task` WHERE `task_id` = ?");
$stmt->bind_param("i", $task_id);
$stmt->execute();
$task_data = $stmt->get_result()->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Editar Tarefa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h3>Editar Tarefa</h3>
    <form method="POST">
        <div class="mb-3">
            <label for="task" class="form-label">Nome da Tarefa:</label>
            <input type="text" id="task" name="task" class="form-control" value="<?php echo htmlspecialchars($task_data['task']); ?>" required>
        </div>
        <div class="mb-3">
            <label for="status" class="form-label">Status:</label>
            <select id="status" name="status" class="form-control">
                <option value="Pending" <?php echo $task_data['status'] === 'Pending' ? 'selected' : ''; ?>>Pending</option>
                <option value="In Progress" <?php echo $task_data['status'] === 'In Progress' ? 'selected' : ''; ?>>In Progress</option>
                <option value="Done" <?php echo $task_data['status'] === 'Done' ? 'selected' : ''; ?>>Done</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Salvar</button>
        <a href="index.php" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
</body>
</html>
