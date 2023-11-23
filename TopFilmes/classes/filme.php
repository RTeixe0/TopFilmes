<?php

class Filme {
    public $id_filme;
    public $titulo;
    public $sinopse;
    public $ano_lancamento;
    public $duracao;
    public $img_cartaz;
    public $nota_imdb;
    public $id_diretor;
    public $nome;

    public $nome_img;    
    public $caminhoFoto;

    public $listaDiretores;

    public function __construct($id_filme = false)
    {
        if($id_filme){
            $this->id_filme = $id_filme;
            $this->carregar();
        }
    }

    public function carregar()
    {
        $sql = "SELECT * FROM filme WHERE id_filme=".$this->id_filme;
        include "classes/conexao.php";

        $resultado = $conexao->query($sql);
        $linha = $resultado->fetch();

        $this->id_filme = $linha['id_filme'];
        $this->titulo = $linha['titulo'];
        $this->sinopse = $linha['sinopse'];
        $this->ano_lancamento = $linha['ano_lancamento'];
        $this->duracao = $linha['duracao'];
        $this->nota_imdb = $linha['nota_imdb'];
        $this->img_cartaz = $linha['img_cartaz'];
        $this->id_diretor = $linha['fk_diretor_id_diretor'];
    }

    public function listar ()
    {
        $sql ="SELECT f.id_filme,f.titulo,f.sinopse	,f.ano_lancamento,f.duracao,f.nota_imdb,f.img_cartaz, d.id_diretor,d.nome
        FROM filme f JOIN diretor d
        ON f.fk_diretor_id_diretor = d.id_diretor
        ORDER BY f.id_filme";
        include "classes/conexao.php";
        $resultado = $conexao->query($sql);
        $lista = $resultado->fetchAll();
        return $lista;
    }

    public function listarDiretor()
{
    $sql = "SELECT  * FROM diretor ORDER BY id_diretor";
    include "classes/conexao.php";
    $resultado = $conexao->query($sql);
    $listaDiretores = $resultado->fetchAll();
    return $listaDiretores;
}

public function EditarDiretor()
{
    $sql = "SELECT  id_diretor,nome FROM diretor ORDER BY id_diretor";
    include "classes/conexao.php";
    $resultado = $conexao->query($sql);
    $listaDiretores = $resultado->fetchAll();
    return $listaDiretores;
}


public function obterDiretorPorID($id_diretor)
{
    $sql = "SELECT * FROM diretor WHERE id_diretor = $id_diretor";
    include "classes/conexao.php";

    $resultado = $conexao->query($sql);
    $diretor = $resultado->fetch();

    return $diretor;
}


    public function inserir ()
    {

        preg_match("/.(gif|bmp|png|jpg|jpeg){1}$/i", $this->img_cartaz["name"], $ext);

        $this->nome_img = md5(uniqid(time())) . "." . $ext[1];

        $this->caminhoFoto = 'img/' . $this->nome_img;

        move_uploaded_file($this->img_cartaz["tmp_name"], $this->caminhoFoto);

        $sql = "INSERT INTO  filme(titulo,sinopse,ano_lancamento,duracao,img_cartaz,nota_imdb,fk_diretor_id_diretor) VALUES (
            '{$this->titulo}',
            '{$this->sinopse}',
            '{$this->ano_lancamento}',
            '{$this->duracao}',
            '{$this->caminhoFoto}',
            '{$this->nota_imdb}',
            '{$this->id_diretor}'
            )";
        include "classes/conexao.php";
        $conexao->exec ($sql);
        echo "Filme Inserido";
    }

    public function Atualizar()
{    
                preg_match("/.(gif|bmp|png|jpg|jpeg){1}$/i", $this->img_cartaz["name"], $ext);

                $this->nome_img = md5(uniqid(time())) . "." . $ext[1];
        
                $this->caminhoFoto = 'img/' . $this->nome_img;
        
                move_uploaded_file($this->img_cartaz["tmp_name"], $this->caminhoFoto);
        
                
                include "classes/conexao.php";
        
                $sql = "UPDATE filme 
                        SET titulo = '$this->titulo',
                            sinopse = '$this->sinopse',
                            ano_lancamento = '$this->ano_lancamento',
                            duracao = '$this->duracao',
                            nota_imdb = '$this->nota_imdb',
                            fk_diretor_id_diretor = '$this->id_diretor',
                            img_cartaz = '$this->caminhoFoto'
                        WHERE id_filme = $this->id_filme";
        
                $conexao->exec($sql);
        
                echo "Filme Atualizado";
    }  

    public function Excluir()
    {
        $sql = "DELETE FROM filme WHERE id_filme=".$this->id_filme;
        
        include "classes/conexao.php";
        $conexao-> exec($sql); 
    }
}