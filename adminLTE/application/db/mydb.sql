CREATE DATABASE dashboard;
USE dashboard;
CREATE TABLE usuarios (
    id_usuario INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    correo VARCHAR(80) UNIQUE,
    passw VARCHAR(255)
);

INSERT INTO `usuarios` (`id_usuario`, `correo`, `passw`) VALUES (NULL, 'admin@gmail.com', '123');