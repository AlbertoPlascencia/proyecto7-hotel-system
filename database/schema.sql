CREATE TABLE users (
 id INT AUTO_INCREMENT PRIMARY KEY,
 username VARCHAR(50),
 password VARCHAR(255),
 role VARCHAR(20)
);

CREATE TABLE rooms (
 id INT AUTO_INCREMENT PRIMARY KEY,
 room_number INT,
 type VARCHAR(50),
 price DECIMAL(10,2),
 status VARCHAR(20)
);

CREATE TABLE clients (
 id INT AUTO_INCREMENT PRIMARY KEY,
 name VARCHAR(100),
 email VARCHAR(100)
);

CREATE TABLE reservations (
 id INT AUTO_INCREMENT PRIMARY KEY,
 client_id INT,
 room_id INT,
 check_in DATE,
 check_out DATE,
 status VARCHAR(20),
 FOREIGN KEY (client_id) REFERENCES clients(id),
 FOREIGN KEY (room_id) REFERENCES rooms(id)
);

INSERT INTO users (username,password,role)
VALUES
('admin','1234','admin'),
('recepcion','1234','recepcion');

INSERT INTO rooms (room_number,type,price,status)
VALUES
(101,'Sencilla',900,'Disponible'),
(102,'Doble',1200,'Disponible'),
(103,'Suite',2000,'Disponible');
