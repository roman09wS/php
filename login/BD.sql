DROP DATABASE gestion_user;
CREATE DATABASE gestion_user;
USE gestion_user;

CREATE TABLE usuarios (
    id_user INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(70),
    contrasena VARCHAR(25),
    email VARCHAR(80) UNIQUE
);

CREATE TABLE password (
    id_pass INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(80),
    codigo INT,
    fecha_hora TIMESTAMP
);

INSERT INTO usuarios (nombre,contrasena,email) VALUES 
('Luis','12345','luis@gmail.com'),
('Andres','678910','andres@gmail.com'),
('Sech','54321','sech@gmail.com');