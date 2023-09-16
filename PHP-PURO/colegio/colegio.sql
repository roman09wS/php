CREATE DATABASE colegio;
USE colegio;

CREATE TABLE alumnos (
    id_alumno INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(50),
    email VARCHAR(80),
    nota VARCHAR(10)
);

INSERT INTO alumnos (nombre,email,nota) 
VALUES  ('Luis','luis@gmail.com','10'),
        ('Pepe','pepe@gmail.com','9'),
        ('Javier','javier@gmail.com','8');