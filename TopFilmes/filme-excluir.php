<?php 
require_once 'classes/filme.php';

$id_filme = $_GET['id_filme'];

$filme= new Filme($id_filme);

$filme->excluir();

header('Location: filme-listar.php');

?>