CREATE TABLE formulario(
    id int not null AUTO_INCREMENT PRIMARY key,
    data_envio varchar(40),
    nome varchar(40) not null,
    email varchar(40) not null,
    cpf_cnpj int(12) not null,
    tema_comentario varchar(30) not null,
    tipo_comentario varchar(30) not null,
    anexo varchar(40) NOT NULL,
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
