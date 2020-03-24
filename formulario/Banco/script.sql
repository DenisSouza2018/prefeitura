CREATE TABLE formulario(
    id int not null AUTO_INCREMENT PRIMARY key,
    data_envio DATETIME  DEFAULT CURRENT_TIMESTAMP,
    nome varchar(40) not null,
    email varchar(40) not null,
    cpf_cnpj int(12) not null,
    tema_comentario varchar(30) not null,
    tipo_comentario varchar(30) not null,
    texto_comentario varchar(255) not null,
    anexo varchar(255) NOT NULL,
    protocolo int(10) not null 
)