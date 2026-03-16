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

INSERT INTO users (username,password,role)
VALUES
('admin','1234','admin'),
('recepcion','1234','recepcion');
