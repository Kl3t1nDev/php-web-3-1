<!DOCTYPE html>
<html>
<head>
    <title>Editar Cliente</title>
</head>
<body>
    <h1>Editar Cliente</h1>
    <form action="index.php?action=edit&id=<?php echo $cliente->id; ?>" method="post">
        Nome: <input type="text" name="nome" value="<?php echo $cliente->nome; ?>" required><br>
        CPF: <input type="text" name="cpf" value="<?php echo $cliente->cpf; ?>" required><br>
        Data de Nascimento: <input type="date" name="dataNascimento" value="<?php echo $cliente->dataNascimento; ?>" required><br>
        <input type="submit" value="Atualizar">
    </form>
    <a href="index.php">Voltar</a>
</body>
</html>
