CREATE DATABASE base_ads4;

==================


CREATE TABLE usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(255),
    telefone VARCHAR(11),
    email VARCHAR(50),
    senha VARCHAR(50)
);

==================

INSERT INTO usuarios (nome, telefone, email, senha)
VALUES ('Jorge', '81993334433', 'jorge@exemplo.com', '1122332211');
INSERT INTO usuarios (nome, telefone, email, senha)
VALUES ('Flavia', '81955443044', 'flavia@exemplo.com', '23424wfsdfsdf');
INSERT INTO usuarios (nome, telefone, email, senha)
VALUES ('Pedro', '81985543922', 'pedro@exemplo.com', 'sdfsdfsdf');
INSERT INTO usuarios (nome, telefone, email, senha)
VALUES ('Carlos', '81943445544', 'carlos@exemplo.com', '33wwss');
INSERT INTO usuarios (nome, telefone, email, senha)
VALUES ('Julia', '81994345679', 'julia@exemplo.com', '1111122222');