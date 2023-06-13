CREATE DATABASE tienda;
USE tienda;
CREATE TABLE producto (
	id_producto INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100),
    descripcion TEXT,
    costo FLOAT,
    precio FLOAT,
    cantidad SMALLINT,
    proveedor VARCHAR(100)
);

CREATE TABLE proveedor (
	id_proveedor INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100),
    producto INT UNSIGNED,
    ubicacion VARCHAR(100),
    telefono VARCHAR(50),
    FOREIGN KEY (producto) REFERENCES producto(id_producto)
);

CREATE TABLE ventas (
	id_ventas INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    producto VARCHAR(100),
    precio VARCHAR(100),
    costo VARCHAR(100),
    total VARCHAR(100)
);