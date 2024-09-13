<!DOCTYPE html>
<html>
<head>
    <title>Editar Orçamento</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h1>Editar Orçamento</h1>
        <form action="edit.php?id=<?= $orcamento['id'] ?>" method="POST">
            <input type="hidden" name="cliente_id" value="<?= $_GET['cliente_id'] ?>">
            <div class="form-group">
                <label for="kwp">Kwp</label>
                <input type="text" class="form-control" id="kwp" name="kwp" value="<?= $orcamento['kwp'] ?>" required>
            </div>
            <div class="form-group">
                <label for="orientacao">Orientação</label>
                <input type="text" class="form-control" id="orientacao" name="orientacao" value="<?= $orcamento['orientacao'] ?>" required>
            </div>
            <div class="form-group">
                <label for="instalacao">Instalação</label>
                <input type="text" class="form-control" id="instalacao" name="instalacao" value="<?= $orcamento['instalacao'] ?>" required>
            </div>
            <div class="form-group">
                <label for="preco">Preço</label>
                <input type="number" step="0.01" class="form-control" id="preco" name="preco" value="<?= $orcamento['preco'] ?>" required>
            </div>
            <button type="submit" class="btn btn-primary">Atualizar Orçamento</button>
        </form>
    </div>
</body>
</html>
