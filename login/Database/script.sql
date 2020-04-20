CREATE TABLE `usuario` (
  id int(11) PRIMARY KEY AUTO_INCREMENT,
  login varchar (255),
  senha varchar(255) NOT NULL,
  email varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
INSERT INTO usuario VALUES(null,'denis',123,'denis.traco@gmail.com');