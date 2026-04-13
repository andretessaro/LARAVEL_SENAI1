create database bibliotecaLaravel;
use bibliotecaLaravel;

create table biblioteca(
	id int auto_increment primary key,
    nome varchar(100),
    autor varchar(100),
    descricao varchar(100),
    numeropáginas varchar(100),
    datapublicação date,
    editora_id varchar(100),
    custo varchar(100),
    preco varchar(100),
    imposto varchar(100),
    created_at timestamp null,
    updated_at timestamp null
);

ALTER TABLE bibliotecas
ADD COLUMN setor_id INT,
ADD CONSTRAINT fk_bibliotecas_editoras
FOREIGN KEY (editora_id) REFERENCES Editoras(id);

ALTER TABLE bibliotecas
ADD COLUMN detalhes_id INT,
ADD CONSTRAINT fk_bibliotecas_detalhes
FOREIGN KEY (detalhes_id) REFERENCES detalhesBiblioteca(id);

create table Editoras(
	id int auto_increment primary key,
    nome varchar(100),
    autor varchar(100),
    nCorredor int
);

ALTER TABLE Editoras
ADD COLUMN created_at TIMESTAMP NULL,
ADD COLUMN updated_at TIMESTAMP NULL;

create table detalhesBiblioteca(
	id int auto_increment primary key,
    custo varchar(100),
    preco varchar(100),
    imposto varchar(100),
    created_at timestamp null,
    updated_at timestamp null
    
);

select * from bibliotecas;
select * from Editoras;
select * from detalhesBiblioteca;