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