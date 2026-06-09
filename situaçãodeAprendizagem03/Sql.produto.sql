create database situaçãodeAprendizagem03;
use situaçãodeAprendizagem03;

create table produtos (
	 id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) null,
    tipodemateria VARCHAR(100) null,
    especificações VARCHAR(100) null,
    quantidade double null,
    datafabricação date,
    preçodevenda double null,
    created_at timestamp null,
    updated_at timestamp null
);
    
select * from Produtos;
select * from DetalheProdutos;