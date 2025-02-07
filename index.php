<?php
include 'conn.php';

// Consultar todas as tarefas
$sql = "SELECT * FROM task";
$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Tarefas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2 class="text-center">Lista de Tarefas</h2>
        <a href="adicionar_tarefa.php" class="btn btn-primary mb-3">Adicionar Tarefa</a>

        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Status</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Exibe as tarefas
                    while ($row = mysqli_fetch_assoc($result)) {
                        $id = $row['task_id'];
                        $nome = $row['task_name'];
                        $status = $row['status_tarefa'];

                        echo '
                        <tr>
                            <td>' . $id . '</td>
                            <td>' . htmlspecialchars($nome) . '</td>
                            <td>' . ucfirst($status) . '</td>
                            <td>
                                <a href="editar_task.php?task_id=' . $id . '" class="btn btn-warning btn-sm">Editar</a>
                                <a href="deletar_tarefa.php?task_id=' . $id . '" class="btn btn-danger btn-sm" onclick="return confirm(\'Tem certeza que deseja excluir?\')">Excluir</a>
                                <a href="done.php?task_id=' . $id . '" class="btn btn-success btn-sm">Concluir</a>
                            </td>
                        </tr>
                        ';
                    }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>