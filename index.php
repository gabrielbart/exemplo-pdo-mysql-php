<?php
require_once './vendor/autoload.php';

use ExemploPDOMySQL\MySQLConnection;

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $bd = new MySQLConnection();

    $comando = $bd->prepare('INSERT INTO generos(nome) VALUES(:nome)');
    $comando->execute([':nome'=> $_POST['nome']]);
    
    header('location:/index.php')
}

?>

<!Doctype html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <title>Biblioteca</title>
    </head>
    <body>
        <a href="insert.php">Novo Gênero</a>
        <table>
            <tr>
                <th>Id</th>
                <th>Nome</th>
            </tr>
            <?php foreach($generos as $g): ?>
                <tr>
                    <td><?=$g['id']?></td>
                    <td><?=$g['nome']?></td>
                </tr>
            <?php endforeach ?>
        </table>
    </body>
</html>