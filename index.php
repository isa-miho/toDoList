<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="css/index.css">

    <title>Lista de Tarefas</title>
</head>
<body>
    <nav class="navbar navbar-default">
        <div class="container-fluid">
            <p>Lista de tarefas</p>
        </div>
    </nav>

    <div class="col-md-3"></div>
    <div class="col-md-6 well">
        <h3 class="text-primary">Controle de tarefas</h3>
        <hr style="border-top:1px dotted #ccc;"/>

        <div class="col-md-2"></div>
        <div class="col-md-8">
            <div class="d-flex justify-content-center">
                <form method="POST" class="form-inline" action="add_query.php">
                    <input type="text" class="form-control me-2" name="task" required />
                    <button class="btn btn-primary" name="add">Add Task</button>
                </form>
            </div>
        </div>

        <br /><br /><br />

        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Task</th>
                    <th>Status</th>
                    <th>Ação</th>
                </tr>
            </thead>
            <tbody>
                <?php
                require_once 'conn.php';
                $stmt = $conn->prepare("SELECT * FROM `task` ORDER BY `task_id` ASC");
                $stmt->execute();
                $result = $stmt->get_result();
                $count = 1;

                while ($fetch = $result->fetch_array()) {
                    ?>
                    <tr>
                        <td><?php echo $count++; ?></td>
                        <td><?php echo htmlspecialchars($fetch['task']); ?></td>
                        <td><?php echo htmlspecialchars($fetch['status']); ?></td>
                        <td colspan="2" class="text-center">
                            <a href="update_task.php?task_id=<?php echo $fetch['task_id']; ?>" class="btn btn-warning">
                                <i class="fas fa-edit"></i> Editar
                            </a>
                            <a href="delete_query.php?task_id=<?php echo $fetch['task_id']; ?>" class="btn btn-danger">
                                <i class="fas fa-trash"></i> Excluir
                            </a>
                            <a href="update_task.php?task_id=<?php echo $fetch['task_id']; ?>&status=Done" class="btn btn-success">
                                <i class="fas fa-check"></i> Done
                            </a>


                        </td>
                    </tr>
                    <?php
                }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>
