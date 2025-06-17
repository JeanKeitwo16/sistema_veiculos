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

INSERT INTO `usuario`(`nome`, `email`, `senha`) VALUES ('admin','admin@gmail.com','admin')
INSERT INTO `veiculo` (`placa`, `cor`, `modelo`, `marca`, `ano`, `id_categoria`, `imagem`) VALUES
('ABC1D23', 'Vermelho', 'Actros 2651', 'Mercedes-Benz', 2022, 1, 'img1.jpg'),
('DEF2E34', 'Prata', 'F-4000', 'Ford', 2021, 2, 'img2.jpg'),
('GHI3F45', 'Preto', 'Hilux SRX', 'Toyota', 2023, 2, 'img3.jpg'),
('JKL4G56', 'Branco', 'Renegade Longitude', 'Jeep', 2020, 3, 'img4.jpg'),
('MNO5H67', 'Cinza', 'HR-V Touring', 'Honda', 2022, 3, 'img5.jpg'),
('PQR6I78', 'Azul', 'Corolla GLi', 'Toyota', 2021, 4, 'img6.jpg'),
('STU7J89', 'Verde', 'Onix Plus', 'Chevrolet', 2020, 4, 'img7.jpg'),
('VWX8K90', 'Amarelo', 'Axor 3344', 'Mercedes-Benz', 2023, 1, 'img8.jpg');
