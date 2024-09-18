<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Orçamento</title>
    <!-- Incluindo Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header text-center">
                        <h1>Editar Orçamento</h1>
                    </div>
                    <div class="card-body">
                        <!-- Verifique se o orçamento está definido -->
                        <?php if (isset($orcamento) && $orcamento): ?>
                            <form action="index.php?entity=orcamento&action=edit&id=<?php echo $orcamento->id; ?>" method="post">
                                <input type="hidden" name="cliente_id" value="<?php echo htmlspecialchars($orcamento->cliente_id); ?>">
                                <div class="mb-3">
                                    <label for="kwp" class="form-label">Kwp</label>
                                    <input type="text" class="form-control" id="kwp" name="kwp" value="<?php echo htmlspecialchars($orcamento->kwp); ?>" required>
                                </div>
                                <div class="mb-3">
                                    <label for="orientacao" class="form-label">Orientação</label>
                                    <input type="text" class="form-control" id="orientacao" name="orientacao" value="<?php echo htmlspecialchars($orcamento->orientacao); ?>" required>
                                </div>
                                <div class="mb-3">
                                    <label for="instalacao" class="form-label">Instalação</label>
                                    <input type="text" class="form-control" id="instalacao" name="instalacao" value="<?php echo htmlspecialchars($orcamento->instalacao); ?>" required>
                                </div>
                                <div class="mb-3">
                                    <label for="preco" class="form-label">Preço</label>
                                    <input type="number" step="0.01" class="form-control" id="preco" name="preco" value="<?php echo htmlspecialchars($orcamento->preco); ?>" required>
                                </div>
                                <div class="text-center">
                                    <button type="submit" class="btn btn-primary">Atualizar Orçamento</button>
                                    <a href="index.php?entity=orcamento&cliente_id=<?php echo htmlspecialchars($orcamento->cliente_id); ?>" class="btn btn-secondary">Voltar</a>
                                </div>
                            </form>
                        <?php else: ?>
                            <div class="alert alert-danger" role="alert">
                                O orçamento não foi encontrado ou houve um erro ao carregar os dados.
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Incluindo Bootstrap JS e dependências do Popper.js -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
