<?php 
require_once "classes/filme.php";
$filme = new Filme();
$lista = $filme->listar();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Filmes</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="styles/list-styles.css">
</head>
<body>

<div class="container">
    <h1>Lista de Filmes</h1>

    <table class="table">
        <thead>
            <tr>
                <th>Cartaz</th>
                <th>Código do filme</th>
                <th>Título</th>
                <th>Sinopse</th>
                <th>Ano de lançamento</th>
                <th>Duração</th>
                <th>Nota IMDb</th>
                <th>Diretor</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($lista as $linha): ?>
                <tr>
                    <td><img src="<?php echo $linha['img_cartaz'] ?>" height="150"></td>
                    <td><?php echo $linha['id_filme'] ?></td>
                    <td><?php echo $linha['titulo'] ?></td>
                    <td><?php echo $linha['sinopse'] ?></td>
                    <td><?php echo $linha['ano_lancamento'] ?></td>
                    <td><?php echo $linha['duracao'] ?> minutos</td>
                    <td><?php echo $linha['nota_imdb'] ?></td>
                    <td><a href="diretor-listar.php?id_diretor=<?php echo $linha['id_diretor']; ?>"><?php echo $linha['nome'] ?></td>
                    <td>
                        <a href="filme-editar.php?id_filme=<?= $linha['id_filme'] ?>" class="btn btn-info mb-3">Atualizar</a>
                        <a href="filme-excluir.php?id_filme=<?= $linha ['id_filme'] ?>" class="btn btn-danger">Excluir</a>
                    </td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>

    <a href="index.php" class="btn btn-primary mb-3">Voltar para a Página Inicial</a>
    <a href="filme-inserir.php" class="btn btn-primary mb-3">Cadastrar filme</a>
    
</div>

</body>
</html>
