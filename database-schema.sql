CREATE DATABASE sqlinjection;

USE sqlinjection; 

CREATE TABLE usuario ( 
	id int PRIMARY KEY NOT NULL AUTO_INCREMENT, 
	email varchar(100) NOT NULL, 
	password varchar(100) NOT NULL 
);

-- Cria usuário default.
INSERT INTO usuario (id, email, password) VALUES
(1, 'usuario@usuario.com', 'Usuario123');