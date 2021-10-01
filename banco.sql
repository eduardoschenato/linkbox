create table categorias ( 
    id INT NOT NULL AUTO_INCREMENT, 
    nome VARCHAR(255), 
    PRIMARY KEY (id)
);

create table links ( 
    id INT NOT NULL AUTO_INCREMENT, 
    id_categoria INT NOT NULL, 
    link VARCHAR(255), 
    titulo VARCHAR(255), 
    descricao VARCHAR(255), 
    palavras_chave VARCHAR(255), 
    imagem VARCHAR(255),
    PRIMARY KEY (id),
    FOREIGN KEY (id_categoria) REFERENCES categorias (id)
);