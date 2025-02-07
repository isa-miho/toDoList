<?php
include 'conn.php';

if (isset($_POST['adicionar'])) {
    $nome = $_POST['nome'];

    // Inserir nova tarefa no banco
    $sql = "INSERT INTO task (task_name) VALUES ('$nome')";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        echo '<script>alert("Tarefa adicionada com sucesso!"); window.location.href = "index.php";</script>';
    } else {
        echo '<script>alert("Erro ao adicionar tarefa!"); window.location.href = "index.php";</script>';
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adicionar Tarefa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2>Adicionar Nova Tarefa</h2>
        <form method="POST">
            <div class="mb-3">
                <label for="nome" class="form-label">Nome da Tarefa</label>
                <input type="text" class="form-control" id="nome" name="nome" required>
            </div>
            <button type="submit" name="adicionar" class="btn btn-success">Adicionar Tarefa</button>
            <a href="index.php" class="btn btn-secondary">Voltar</a>
        </form>
    </div>
</body>
</html>