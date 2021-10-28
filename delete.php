<?php
require_once './vendor/autoload.php';

use ExemploPDOMySQL\MySQLConnection;

$bd = new MySQLConnection();

$genero = null;

if($_SERVER['REQUEST METHOD'] == 'GET') {
    $comando = $bd->prepare('SELECT * FROM generos  WHERE id = :id');
    $comando->execute([':id' => $_GET[id]]);

    $genero = $comando->fetch(PDO::FETCH_ASSOC);
}else{
    $comando = $bd->prepare('DELETE FROM generos WHERE id = :id');
    $comando->execute([':id' => $_POST['id']]);

    header('Location:/index.php');
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
        <meta charset="UTF-8">
        <title>Remover Gênero</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" 
        integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    </head>
    <body>
        <main class="container">
        <h1>Remover Gênero</h1>
        <p>Tem certeza que deseja remover o gênero"<?=$genero['nome'] ?>"</p>

        <form action="delete.php" method="post">
            <input type="hidden" name="id" value="<?= $genero['id']?>"/>
            <a class="btn btn-secondary" href="index.php">Voltar</a>
            <button class="btn btn-danger" type="submit">Excluir</button>
        </form>
</main>
    </body>
</html>