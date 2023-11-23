<?php 
require_once "classes/filme.php";
$filme = new Filme();
$lista = $filme->listar();
$listaDiretores = $filme->listarDiretor();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Filme</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="styles/form-styles.css">
</head>
<body>

<div class="container">
    <h1>Cadastrar Filme</h1>

    <form enctype="multipart/form-data" action="filme-gravar.php" method="POST">
        <label for="titulo"> Título do Filme: </label>
        <input type="text" name="titulo" id="titulo">

        <label for="sinopse">Sinopse: </label>
        <textarea type="text" name="sinopse" rows="4" cols="50" id="sinopse"></textarea>

        <label for="ano_lancamento">Ano de Lançamento: </label>
        <input type="number" name="ano_lancamento" id="ano_lancamento">

        <label for="duracao">Duração: </label>
        <input type="number" name="duracao" id="duracao">

        <label for="nota_imdb">Nota IMDb: </label>
        <input type="text" name="nota_imdb" id="nota_imdb">

        <label for="imgcartaz">Imagem do Cartaz: </label>
        <input type="file" name="imgcartaz" id="imgcartaz" accept="image/*">

        <label for="seldiretor">Diretor: </label>
        <select name="seldiretor" id="seldiretor"> 
            <option value=''>Selecione... </option>
            <?php 
                foreach($listaDiretores as $linha):
                    echo "<option value='{$linha['id_diretor']}'>
                    {$linha['nome']}
                    </option>";
                endforeach
            ?>
        </select>

        <input type="submit" value="Gravar">
    </form>

    <a href="index.php" class="btn btn-primary mb-3">Página Inicial</a>
</div>

</body>
</html>
