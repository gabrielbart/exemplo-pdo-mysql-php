<?php
require_once './vendor/autoload.php';

    use ExemploPDOMySQL\MySQLConnection; //PDO

    $bd = new MySQLConnection(); //PDO('mysql:host=localhost;dname=biblioteca', 'root', '')
    
    $comando = $bd->prepare('SELECT * FROM generos')
    $comando->execute();
    
    $generos = $comando->fetchAll(PDO::FETCH_ASSOC);

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
                    <td>
                        <a href="update.php?id=<?= $g['id'] ?>">Editar</a>
                    </td>
                </tr>
            <?php endforeach ?>
        </table>
    </body>
</html>