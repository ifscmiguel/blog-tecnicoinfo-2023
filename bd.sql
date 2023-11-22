CREATE DATABASE blog;

USE blog;

-- tabela de usuários
CREATE TABLE usuario(
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    nome CHAR(200) NOT NULL,
    email CHAR(200) NOT NULL,
    senha CHAR(200) NOT NULL
);