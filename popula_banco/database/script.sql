CREATE TABLE hemeroteca (
id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
nome VARCHAR(255) NOT NULL,
periodo_inicial VARCHAR(10),
periodo_final VARCHAR(10),
texto_imagem LONGTEXT,
nacionalidade_recorte ENUM('brasileiro','estrangeiro')
);