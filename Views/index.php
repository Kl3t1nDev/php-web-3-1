<!DOCTYPE html>
<html>
<head>
    <title>Lista de Clientes</title>
</head>
<body>
    <h1>Lista de Clientes</h1>
    <a href="index.php?action=create">Adicionar Cliente</a>
    <form method="get" action="index.php">
        <input type="text" name="search" placeholder="Pesquisar por nome">
        <input type="submit" value="Buscar">
    </form>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>CPF</th>
            <th>Data de Nascimento</th>
            <th>Ações</th>
        </tr>
        <?php foreach ($clientes as $cliente) { ?>
        <tr>
            <td><?php echo $cliente['ID']; ?></td>
            <td><?php echo $cliente['Nome']; ?></td>
            <td><?php echo $cliente['CPF']; ?></td>
            <td><?php echo $cliente['DataNascimento']; ?></td>
            <td>
                <a href="index.php?action=edit&id=<?php echo $cliente['ID']; ?>">Editar</a>
                <a href="index.php?action=delete&id=<?php echo $cliente['ID']; ?>" onclick="return confirm('Tem certeza que deseja excluir?')">Excluir</a>
            </td>
        </tr>
        <?php } ?>
    </table>
</body>
</html>
