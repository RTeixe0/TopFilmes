<?php
require_once "classes/filme.php";
$filme = new Filme();

if (isset($_GET['id_diretor'])) {
    $id_diretor = $_GET['id_diretor'];
    $diretor = $filme->obterDiretorPorID($id_diretor);
    $listaDiretores = [$diretor];
} else {

    $listaDiretores = $filme->listarDiretor();
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Informações do Diretor</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="styles/diretor-styles.css">
</head>
<body>

<div class="container">
    <h1>Informações do Diretor</h1>

    <table class="table vertical-table">
        <thead>
            <tr>
                <th>Nome</th>
                <th>Mini Bio</th>
                <th>Ano de Nascimento</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($listaDiretores as $diretor): ?>
                <tr>
                    <td><?php echo $diretor['nome'] ?></td>
                    <td><?php echo $diretor['minibio'] ?></td>
                    <td><?php echo $diretor['ano_nascimento'] ?></td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>

    <a href="filme-listar.php" class="btn btn-primary mb-3">Lista de filmes</a>
    
</div>

</body>
</html>
