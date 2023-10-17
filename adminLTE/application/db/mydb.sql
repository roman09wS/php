DROP DATABASE IF EXISTS dashboard;
CREATE DATABASE dashboard;
USE dashboard;
CREATE TABLE usuarios (
    id_usuario INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    correo VARCHAR(80) UNIQUE,
    passw VARCHAR(255),
    rol ENUM('admin','lector'),
    estado TINYINT(1) DEFAULT '1'
);

INSERT INTO `usuarios` (`id_usuario`, `correo`, `passw`,`rol`) VALUES (NULL, 'admin@gmail.com', '123','admin');
INSERT INTO `usuarios` (`id_usuario`, `correo`, `passw`,`rol`) VALUES (NULL, 'lector@gmail.com', '123','lector');

-- Insertar 2 usuarios con rol 'admin' y estado '1'
INSERT INTO usuarios (correo, passw, rol, estado) VALUES
('admin1@ficticio.com', 'admin1', 'admin', 1),
('admin2@ficticio.com', 'admin2', 'admin', 1);

-- Insertar 10 usuarios con rol 'lector' y estado '1'
INSERT INTO usuarios (correo, passw, rol, estado) VALUES
('johndoe@ficticio.com', 'johndoe123', 'lector', 1),
('janedoe@ficticio.com', 'janedoe123', 'lector', 1),
('alice.smith@ficticio.com', 'alice123', 'lector', 1),
('bob.johnson@ficticio.com', 'bob123', 'lector', 1),
('emily.wilson@ficticio.com', 'emily123', 'lector', 1),
('michael.brown@ficticio.com', 'michael123', 'lector', 1),
('susan.williams@ficticio.com', 'susan123', 'lector', 1),
('david.jackson@ficticio.com', 'david123', 'lector', 1),
('linda.martin@ficticio.com', 'linda123', 'lector', 1),
('chris.wilson@ficticio.com', 'chris123', 'lector', 1);

-- Insertar 2 usuarios con rol 'lector' y estado '0'
INSERT INTO usuarios (correo, passw, rol, estado) VALUES
('brian.johnson@ficticio.com', 'brian123', 'lector', 0),
('karen.wilson@ficticio.com', 'karen123', 'lector', 0);
