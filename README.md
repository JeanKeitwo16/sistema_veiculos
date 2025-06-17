# sistema_veiculos
Código MySQL:
CREATE DATABASE sistema_veiculos;
USE sistema_veiculos;

CREATE TABLE usuario (
  id INT AUTO_INCREMENT PRIMARY KEY,
  nome VARCHAR(100) NOT NULL,
  email VARCHAR(100) NOT NULL UNIQUE,
  senha VARCHAR(255) NOT NULL
);

CREATE TABLE categoria (
  id INT AUTO_INCREMENT PRIMARY KEY,
  nome VARCHAR(100) NOT NULL
);

CREATE TABLE veiculo (
  id INT AUTO_INCREMENT PRIMARY KEY,
  placa CHAR(7) NOT NULL UNIQUE,
  cor VARCHAR(50),
  modelo VARCHAR(100) NOT NULL,
  marca VARCHAR(100) NOT NULL,
  ano SMALLINT,
  id_categoria INT NOT NULL,
  imagem VARCHAR(255),
  INDEX (id_categoria),
  FOREIGN KEY (id_categoria) REFERENCES categoria(id)
);
