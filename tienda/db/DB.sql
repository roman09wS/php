DROP DATABASE tienda;
CREATE DATABASE tienda;
USE tienda;
CREATE TABLE producto (
	id_producto INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) UNIQUE,
    descripcion TEXT,
    costo FLOAT,
    precio FLOAT,
    cantidad SMALLINT,
    proveedor VARCHAR(100)
);

CREATE TABLE proveedor (
	id_proveedor INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100),
    producto VARCHAR(80),
    ubicacion VARCHAR(100),
    telefono VARCHAR(50) UNIQUE
);

CREATE TABLE ventas (
	id_ventas INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    producto VARCHAR(100),
    cantidad VARCHAR(100),
    total FLOAT,
    fecha TIMESTAMP
);
ALTER TABLE `ventas` CHANGE `fecha` `fecha` DATE NOT NULL DEFAULT CURRENT_TIMESTAMP;

ALTER TABLE `ventas` ADD `estado` ENUM("ACTIVO","INACTIVO") NOT NULL AFTER `fecha`;

INSERT INTO ventas (producto,cantidad,total) VALUES ('Smartphone Galaxy','1','20.00');

-- Insertar datos en la tabla "producto"
INSERT INTO producto (nombre, descripcion, costo, precio, cantidad,proveedor)
VALUES
    ('Smartphone Galaxy', 'Potente, Versátil, Innovador, Conectado', 10.50, 20.00, 50,'Laura Thompson'),
    ('Laptop Spectre', 'Elegante, Ultradelgada, Rendimiento Potente, Segura', 15.25, 30.50, 100,'Carlos Rodríguez'),
    ('Smart TV UltraHD', 'Pantalla Vibrante, Streaming Integrado, Experiencia Inmersiva, Conectividad Inteligente', 8.75, 18.00, 75,'Emily Johnson'),
    ('Cámara DSLR Alpha', 'Profesional, Alta Resolución, Enfoque Rápido, Creatividad Expandida', 12.00, 25.50, 80,'Alejandro López'),
    ('Auriculares Bluetooth', 'Inalámbricos, Sonido Envolvente, Cancelación de Ruido, Comodidad Duradera', 9.99, 19.99, 60,'Sophia Martinez'),
    ('Consola de videojuegos X-Stream', 'Gráficos Realistas, Juegos de Última Generación, Multijugador Online, Experiencia Gaming Intensa', 7.50, 15.00, 45,'Daniel Smith'),
    ('Smartwatch FitPro', 'Monitoreo de Salud, Seguimiento de Actividades, Notificaciones Inteligentes, Estilo Moderno', 11.25, 22.50, 90,'Valentina García'),
    ('Altavoz inalámbrico SonicBoom', 'Sonido Potente, Bluetooth 5.0, Resistente al Agua, Batería Duradera', 13.75, 27.50, 70,'Liam Brown'),
    ('Impresora LaserJet Pro', 'Impresión Rápida, Calidad Profesional, Conectividad Inalámbrica, Eficiencia Energética', 6.25, 12.50, 35,'Isabella Wilson'),
    ('Tableta Digital Nexus', 'Pantalla Táctil HD, Alto Rendimiento, Almacenamiento Expandible, Versatilidad Portátil', 14.99, 29.99, 55,'Mateo Davis'),
    ('Router TurboNet', 'Velocidad Ultra Alta, Cobertura Amplia, Seguridad Avanzada, Fácil Configuración', 8.50, 17.00, 65,'Sofia Anderson');
    

-- Insertar datos en la tabla "proveedor"
INSERT INTO proveedor (nombre, producto, ubicacion, telefono)
VALUES
    ('Laura Thompson','Smartphone Galaxy', 'Calle 27', '1234567890'),
    ('Carlos Rodríguez','Laptop Spectre', 'Calle 98', '9876543210'),
    ('Emily Johnson','Smart TV UltraHD', 'Avenida Central', '5555555555'),
    ('Alejandro López','Cámara DSLR Alpha', 'Calle del Sol', '1111111111'),
    ('Sophia Martinez','Auriculares Bluetooth', 'Boulevard Primavera', '2222222222'),
    ('Daniel Smith','Consola de videojuegos X-Stream', 'Carrera 10', '3333333333'),
    ('Valentina García','Smartwatch FitPro', 'Avenida Libertad', '4444444444'),
    ('Liam Brown','Altavoz inalámbrico SonicBoom', 'Calle Principal', '5554555555'),
    ('Isabella Wilson','Impresora LaserJet Pro', 'Paseo de los Pinos', '6666666666'),
    ('Mateo Davis', 'Tableta Digital Nexus', 'Avenida del Mar', '7777777777'),
    ('Sofia Anderson', 'Router TurboNet', 'Plaza Mayor', '8888888888');


