<?php
include 'conn.php';

if (isset($_GET['task_id'])) {
    $id = $_GET['task_id'];

    // Buscar a tarefa no banco de dados
    $sql = "SELECT * FROM task WHERE task_id = $id";
    $result = mysqli_query($conn, $sql);
    $tarefa = mysqli_fetch_assoc($result);

    var_dump($tarefa);

    if (isset($_POST['editar'])) {
        $nome = $_POST['nome'];
        $status = $_POST['status'];

        // Atualizar a tarefa no banco de dados
        $sql_update = "UPDATE task SET task_name = '$nome', status_tarefa = '$status' WHERE task_id = $id";
        if (mysqli_query($conn, $sql_update)) {
            echo '<script>alert("Tarefa atualizada com sucesso!"); window.location.href = "index.php";</script>';
        } else {
            echo '<script>alert("Erro ao atualizar a tarefa!"); window.location.href = "index.php";</script>';
        }
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Tarefa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2>Editar Tarefa</h2>
        <form method="POST">
            <div class="mb-3">
                <label for="nome" class="form-label">Nome da Tarefa</label>
                <input type="text" class="form-control" id="nome" name="nome" value="<?php echo htmlspecialchars($tarefa['task_name']); ?>" required>
            </div>
            <div class="mb-3">
                <label for="status" class="form-label">Status</label>
                <select name="status" id="status" class="form-control" required>
                    <option value="pendente" <?php echo $tarefa['status_tarefa'] == 'pendente' ? 'selected' : ''; ?>>Pendente</option>
                    <option value="concluída" <?php echo $tarefa['status_tarefa'] == 'concluída' ? 'selected' : ''; ?>>Concluída</option>
                </select>
            </div>
            <button type="submit" name="editar" class="btn btn-primary">Salvar Alterações</button>
            <a href="index.php" class="btn btn-secondary">Voltar</a>
        </form>
    </div>
</body>
</html>