-- Tabla de usuarios del sistema
CREATE TABLE users (
 id INT AUTO_INCREMENT PRIMARY KEY,
 username VARCHAR(50) NOT NULL UNIQUE,
 password VARCHAR(255) NOT NULL,
 role VARCHAR(20) NOT NULL
);

-- Tabla de habitaciones
CREATE TABLE rooms (
 id INT AUTO_INCREMENT PRIMARY KEY,
 room_number INT NOT NULL UNIQUE,
 type VARCHAR(50) NOT NULL,
 price DECIMAL(10,2) NOT NULL,
 status VARCHAR(20) DEFAULT 'Disponible'
);

-- Tabla de clientes
CREATE TABLE clients (
 id INT AUTO_INCREMENT PRIMARY KEY,
 name VARCHAR(100) NOT NULL,
 email VARCHAR(100)
);

-- Tabla de reservaciones
CREATE TABLE reservations (
 id INT AUTO_INCREMENT PRIMARY KEY,
 client_id INT NOT NULL,
 room_id INT NOT NULL,
 check_in DATE NOT NULL,
 check_out DATE NOT NULL,
 status VARCHAR(20) DEFAULT 'Activa',
 created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
 
 FOREIGN KEY (client_id) REFERENCES clients(id),
 FOREIGN KEY (room_id) REFERENCES rooms(id)
);

-- Usuarios iniciales del sistema
INSERT INTO users (username,password,role)
VALUES
('admin','1234','admin'),
('recepcion','1234','recepcion');

-- Habitaciones iniciales
INSERT INTO rooms (room_number,type,price,status)
VALUES
(101,'Sencilla',900,'Disponible'),
(102,'Doble',1200,'Disponible'),
(103,'Suite',2000,'Disponible');

-- Clientes de ejemplo
INSERT INTO clients (name,email)
VALUES
('Juan Perez','juan@email.com'),
('Maria Lopez','maria@email.com');
