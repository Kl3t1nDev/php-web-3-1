<!DOCTYPE html>
<html>
<head>
    <title>Criar Cliente</title>
</head>
<body>
    <h1>Criar Cliente</h1>
    <form action="index.php?action=create" method="post">
        Nome: <input type="text" name="nome" required><br>
        CPF: <input type="text" name="cpf" required><br>
        Data de Nascimento: <input type="date" name="dataNascimento" required><br>
        <input type="submit" value="Criar">
    </form>
    <a href="index.php">Voltar</a>
</body>
</html>
