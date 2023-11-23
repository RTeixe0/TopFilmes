<?php 
require_once "classes/filme.php";

$id_filme = $_POST['id_filme'];
$filme = new Filme($id_filme);


$filme->titulo= $_POST['titulo'];
$filme->sinopse = $_POST['sinopse'];
$filme->ano_lancamento = $_POST['ano_lancamento'];
$filme->duracao = $_POST['duracao'];
$filme->nota_imdb = $_POST['nota_imdb'];
$filme->img_cartaz = $_FILES["imgcartaz"];
$filme->id_diretor = $_POST['seldiretor'];

$filme->Atualizar();

header('Location: filme-listar.php');


?>