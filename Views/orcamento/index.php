<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Orçamentos do Cliente</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>
    <div class="container mt-4">
        <h1>Orçamentos do Cliente</h1>

        <?php if (isset($cliente_id)): ?>
            <a href="index.php?entity=orcamento&action=create&cliente_id=<?= htmlspecialchars($cliente_id) ?>" class="btn btn-primary mb-3">Adicionar Novo Orçamento</a>
        <?php endif; ?>

        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Kwp</th>
                    <th>Orientação</th>
                    <th>Instalação</th>
                    <th>Preço</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($orcamentos)): ?>
                    <?php foreach ($orcamentos as $orcamento): ?>
                        <tr>
                            <td><?= htmlspecialchars($orcamento['id']) ?></td>
                            <td><?= htmlspecialchars($orcamento['kwp']) ?></td>
                            <td><?= htmlspecialchars($orcamento['orientacao']) ?></td>
                            <td><?= htmlspecialchars($orcamento['instalacao']) ?></td>
                            <td><?= htmlspecialchars($orcamento['preco']) ?></td>
                            <td>
                                <a href="index.php?entity=orcamento&action=edit&id=<?= htmlspecialchars($orcamento['id']) ?>&cliente_id=<?= htmlspecialchars($cliente_id) ?>" class="btn btn-warning btn-sm">Editar</a>
                                <a href="index.php?entity=orcamento&action=delete&id=<?= htmlspecialchars($orcamento['id']) ?>&cliente_id=<?= htmlspecialchars($cliente_id) ?>" class="btn btn-danger btn-sm" onclick="return confirm('Tem certeza que deseja excluir este orçamento?')">Deletar</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="6" class="text-center">Nenhum orçamento encontrado para este cliente.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</body>
</html>
