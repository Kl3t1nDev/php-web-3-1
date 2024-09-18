<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Clientes</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>
    <div class="container mt-4">
        <h1>Lista de Clientes</h1>
        <div class="mb-3">
            <a href="index.php?entity=cliente&action=create" class="btn btn-primary">Adicionar Cliente</a>
        </div>
        <form method="get" action="index.php" class="form-inline mb-3">
            <input type="hidden" name="entity" value="cliente">
            <input type="text" name="search" class="form-control mr-2" placeholder="Pesquisar por nome">
            <input type="submit" class="btn btn-secondary" value="Buscar">
        </form>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>CPF</th>
                    <th>Data de Nascimento</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($clientes)) { ?>
                    <?php foreach ($clientes as $cliente) { ?>
                        <tr>
                            <td><?php echo htmlspecialchars($cliente['id']); ?></td>
                            <td><?php echo htmlspecialchars($cliente['Nome']); ?></td>
                            <td><?php echo htmlspecialchars($cliente['CPF']); ?></td>
                            <td><?php echo htmlspecialchars($cliente['DataNascimento']); ?></td>
                            <td>
                                <a href="index.php?entity=cliente&action=edit&id=<?php echo urlencode($cliente['id']); ?>" class="btn btn-warning btn-sm">Editar</a>
                                <a href="index.php?entity=cliente&action=delete&id=<?php echo urlencode($cliente['id']); ?>" class="btn btn-danger btn-sm" onclick="return confirm('Tem certeza que deseja excluir?')">Excluir</a>
                                <a href="index.php?entity=orcamento&cliente_id=<?php echo urlencode($cliente['id']); ?>" class="btn btn-info btn-sm">Ver Orçamentos</a>
                            </td>
                        </tr>
                    <?php } ?>
                <?php } else { ?>
                    <tr>
                        <td colspan="5" class="text-center">Nenhum cliente encontrado.</td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</body>
</html>
