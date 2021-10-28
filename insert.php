<?php
require_once './vendor/autoload.php';

use ExemploPDOMySQL\MySQLConnection;

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $bd = new MySQLConnection();

    $comando = $bd->prepare('INSERT INTO generos(nome) VALUES(:nome)');
    $comando->execute([':nome'=> $_POST['nome']]);
    
    header('location:/index.php')
}

$_title = 'Gêneros';
?>

<?php include('./includes/header.php'); ?>

            <a class="btn btn-primary" href="insert.php">Novo Gênero</a>
            <table class="table">
                <tr>
                    <th>Id</th>
                    <th>Nome</th>
                    <th>&nbsp;</th>
                </tr>
                <?php foreach($generos as $g): ?>
                    <tr>
                        <td><?=$g['id'] ?></td>
                        <td><?=$g['nome'] ?></td>
                        <td>
                            <a class="btn btn-secondary" href="update.php?id=<?= $g['id'] ?>">Editar</a> | 
                            <a class="btn btn-danger" href="delete.php?id=<?= $g['id'] ?>">Excluir</a>
                        </td>
                    </tr>
                <?php endforeach ?>
            </table>
        
<?php include('./includes/footer.php'); ?>

<!DOCTYPE html>
    <html lang="pt-br">
    <head>
        <meta charset="utf-8"
        <title>Novo Gênero</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" 
        integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    </head>
<body>
    <main class="container">
        <h1>Novo Gênero</h1>
        <form action="inser.php" method="post">
            <div class="form-group">
            <label for="nome">Nome do Gênero</label>
            <input class="form-control" type="text" name="nome"
            </div>
            <br />
            <a class="btn btn-secondary" href="index.php">Voltar</a>
            <button class="btn btn-success" type="submit">Salvar</button>
        </form>
</main>
</body>
</html>