CREATE DATABASE site_adm;

use site_adm;

create table categorias (
	id int primary key auto_increment,
    nome varchar(255) not null,
    descricao varchar(255)
);

create table produtos (
	id int primary key auto_increment,
    nome varchar(255) not null ,
    descricao varchar(255),
    categoria varchar(255),
    preco float
);

create table usuarios (
	id int primary key auto_increment,
    nome varchar(255) not null,
    email varchar(255) not null,
    data_nascimento date,
    telefone varchar(30),
    cpf varchar(11),
    genero varchar(255),
    foto_perfil varchar(255)
    
);