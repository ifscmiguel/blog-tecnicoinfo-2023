CREATE DATABASE blog;

USE blog;

-- tabela de usuários
CREATE TABLE usuario(
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    nome CHAR(200) NOT NULL,
    email CHAR(200) NOT NULL,
    senha CHAR(200) NOT NULL
);
-- tabela de texto
CREATE TABLE texto(
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    titulo VARCHAR(255) NOT NULL,
    texto TEXT NOT NULL,
    usuario_id INT NOT NULL,
    FOREIGN KEY(usuario_id) REFERENCES usuario(id)
);
