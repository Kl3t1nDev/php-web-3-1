<!DOCTYPE html>
<html>
<head>
    <title>Criar Orçamento</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h1>Criar Orçamento</h1>
        <form action="index.php?entity=orcamento&action=create" method="POST">
            <input type="hidden" name="cliente_id" value="<?= htmlspecialchars($_GET['cliente_id']) ?>">
            <div class="form-group">
                <label for="kwp">Kwp</label>
                <input type="text" class="form-control" id="kwp" name="kwp" required>
            </div>
            <div class="form-group">
                <label for="orientacao">Orientação</label>
                <input type="text" class="form-control" id="orientacao" name="orientacao" required>
            </div>
            <div class="form-group">
                <label for="instalacao">Instalação</label>
                <input type="text" class="form-control" id="instalacao" name="instalacao" required>
            </div>
            <div class="form-group">
                <label for="preco">Preço</label>
                <input type="number" step="0.01" class="form-control" id="preco" name="preco" required>
            </div>
            <button type="submit" class="btn btn-primary">Criar Orçamento</button>
        </form>
    </div>
</body>
</html>
