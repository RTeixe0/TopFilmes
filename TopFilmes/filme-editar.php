<?php 
require_once 'classes/filme.php';

$id_filme = $_GET['id_filme'];
$filme= new Filme($id_filme);
$listaDiretores = $filme->listarDiretor();

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="styles/form-styles.css">
    <title>Editar Filmes</title>
</head>
<body>

    <div class="container">

    <h1>Editar Filme</h1>

        <form enctype="multipart/form-data"  action="filme-editar-gravar.php" method="POST">
        <input type="hidden" name="id_filme" value="<?=$filme->id_filme ?>">

        <label for="titulo"> Título do Filme: </label>
        <input type="text" name="titulo" id="titulo" value="<?=$filme->titulo ?>">

        <label for="sinopse">Sinopse: </label>
        <textarea name="sinopse" rows="4" cols="50" id="sinopse"><?=$filme->sinopse ?></textarea>


        <label for="ano_lancamento">Ano de Lançamento: </label>
        <input type="number" name="ano_lancamento" id="ano_lancamento" value="<?=$filme->ano_lancamento ?>" >

        <label for="duracao">Duração: </label>
        <input type="number" name="duracao" id="duracao" value="<?=$filme->duracao ?>">

        <label for="nota_imdb">Nota IMDb: </label>
        <input type="text" name="nota_imdb" id="nota_imdb" value="<?=$filme->nota_imdb ?>">

        <label for="imgcartaz">Imagem do Cartaz: </label>
        <input type="file" name="imgcartaz" id="imgcartaz" accept="image/*">

        <label for="seldiretor">Diretor: </label>
        <select name="seldiretor" id="seldiretor"> 
            <option value=''>Selecione... </option>
            <?php 
                foreach($listaDiretores as $linha):
                    $selected = ($linha['id_diretor'] == $filme->id_diretor) ? 'selected' : '';
                    echo "<option value='{$linha['id_diretor']}' $selected>
                        {$linha['nome']}
                        </option>";
                endforeach
            ?>
        </select>


        <br><br>
        
        <input type="submit" value="Gravar">
        </form>
    
        <a href="index.php" class="btn btn-primary mb-3">Página Inicial</a>

    </div>

</body>
</html>
