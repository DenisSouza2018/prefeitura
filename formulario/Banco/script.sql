---------------FISCALIZA-------------------------
CREATE TABLE formulario(
    id int not null AUTO_INCREMENT PRIMARY key,
    data_envio varchar(40),
    nome varchar(40) not null,
    email varchar(40) not null,
    cpf_cnpj int(12) not null,
    tema_comentario varchar(30) not null,
    tipo_comentario varchar(30) not null,
    anexo varchar(255) NOT NULL,
    protocolo int(10) not null,
    status varchar(30) DEFAULT 'ABERTO'
);

CREATE TABLE historico_resposta(
    id int not null AUTO_INCREMENT PRIMARY key,
    numero_ordem int not null,
    texto varchar(255) not null,
    data_envio varchar(40),
    protocolo_historico int not null,
    nome varchar(20),
)ENGINE=INNODB;



-------------BANCO DE IDEIAS-----------------------
CREATE TABLE ideias(
    id int not null AUTO_INCREMENT PRIMARY key,
    data_envio varchar(40),
    nome varchar(40) not null,
    email varchar(40) not null,
    cpf int(12) not null,
    tel varchar(40) not null,
    protocolo int(10) not null,
    status varchar(30) DEFAULT 'ABERTO'
);

CREATE TABLE historico_ideias(
    id int not null AUTO_INCREMENT PRIMARY key,
    numero_ordem int not null,
    texto varchar(255) not null,
    data_envio varchar(40),
    protocolo_historico int not null,
    nome varchar(40)
)ENGINE=INNODB;
