DROP DATABASE datos;
CREATE DATABASE datos;
USE datos;
CREATE TABLE personas(
    persona_id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100),
    apellido VARCHAR(100),
    edad INT,
    genero VARCHAR(100),
    estado_civil VARCHAR(100),
    php VARCHAR(100) DEFAULT 'no sabe',
    html VARCHAR(100) DEFAULT 'no sabe',
    python VARCHAR(100) DEFAULT 'no sabe',
    aws VARCHAR(100) DEFAULT 'no sabe'
);