CREATE DATABASE Topfilmes;
USE Topfilmes;

CREATE TABLE diretor (
    id_diretor INT AUTO_INCREMENT NOT NULL PRIMARY KEY,
    nome VARCHAR(255),
    minibio LONGTEXT,
    ano_nascimento YEAR
);

CREATE TABLE filme (
    id_filme INT AUTO_INCREMENT NOT NULL PRIMARY KEY,
    titulo VARCHAR(255),
    sinopse TEXT,
    ano_lancamento YEAR,
    duracao INT,
    nota_imdb FLOAT,
    img_cartaz VARCHAR(255),
    fk_diretor_id_diretor INT REFERENCES diretor(id_diretor)
);


INSERT INTO diretor (nome, minibio, ano_nascimento) VALUES ('Steven Spielberg', 'Um dos cineastas mais influentes da história do cinema, conhecido por filmes como E.T., Jurassic Park e A Lista de Schindler', 1946), ('Quentin Tarantino', 'Um dos diretores mais aclamados e controversos da atualidade, famoso por seu estilo de violência estilizada e diálogos marcantes', 1963), ('Martin Scorsese', 'Um dos maiores nomes do cinema americano, responsável por obras-primas como Taxi Driver, Touro Indomável e Os Bons Companheiros', 1942),('Christopher Nolan', 'Conhecido por seus filmes de alta complexidade narrativa, como A Origem e Interestelar', 1970),('Greta Gerwig', 'Diretora e atriz conhecida por filmes como Lady Bird e Adoráveis Mulheres', 1983),('Hayao Miyazaki', 'Mestre da animação japonesa, fundador do Studio Ghibli e diretor de A Viagem de Chihiro', 1941);

INSERT INTO filme (titulo, sinopse, ano_lancamento, duracao, nota_imdb, img_cartaz, fk_diretor_id_diretor) VALUES ('Tubarão', 'Um enorme tubarão branco aterroriza uma pequena cidade litorânea, e cabe a um chefe de polícia, um biólogo marinho e um caçador de tubarões detê-lo', 1975, 124, 8.0, 'img/099f06af32ee3790b4e2ababaaea33dc.jpg
', 1), ('Pulp Fiction', 'Quatro histórias interligadas envolvendo dois assassinos profissionais, um gângster, um boxeador e uma mala misteriosa', 1994, 154, 8.9, 'img/d1efa463279d520a2a4292aa2cc0e5cc.jpg
', 2), ('O Lobo de Wall Street', 'A ascensão e a queda de um corretor da bolsa de valores, que vive uma vida de excessos e corrupção', 2013, 180, 8.2, 'img/3e2f1479c29e09de2fcda743c6e85584.jpg
', 3);
