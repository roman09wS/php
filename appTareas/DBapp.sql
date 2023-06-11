CREATE DATABASE apptarea;
USE apptarea;

CREATE TABLE tarea (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    tarea VARCHAR(255),
    estado TINYINT
);

INSERT INTO `tarea` (`id`, `tarea`, `estado`) VALUES (NULL, 'Aprender Trigger', '0');
INSERT INTO `tarea` (`id`, `tarea`, `estado`) VALUES (NULL, 'Aprender a crear un ingreso pasivo', '');