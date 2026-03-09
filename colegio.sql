CREATE DATABASE IF NOT EXISTS colegio;
USE colegio;


CREATE TABLE profesores (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100),
    especialidad VARCHAR(100),
    borrado TINYINT(1) DEFAULT 0
);


CREATE TABLE alumnos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100),
    email VARCHAR(100),
    borrado TINYINT(1) DEFAULT 0
);

CREATE TABLE aulas (
    id INT AUTO_INCREMENT PRIMARY KEY,
    numero VARCHAR(10),
    capacidad INT,
    edificio VARCHAR(50),
    borrado TINYINT(1) DEFAULT 0
);


CREATE TABLE asignaturas (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100),
    borrado TINYINT(1) DEFAULT 0
);


CREATE TABLE clases (
    id INT AUTO_INCREMENT PRIMARY KEY,
    id_asignatura INT,
    id_profesor INT,
    id_aula INT,
    dia_semana ENUM('Lunes', 'Martes', 'Miercoles', 'Jueves', 'Viernes'),
    hora_inicio TIME,
    FOREIGN KEY (id_asignatura) REFERENCES asignaturas(id),
    FOREIGN KEY (id_profesor) REFERENCES profesores(id),
    FOREIGN KEY (id_aula) REFERENCES aulas(id)
);



-- Meter Profesores
INSERT INTO profesores (nombre, especialidad) VALUES 
('García López', 'Matemáticas'), ('Marta Sánchez', 'Lengua'), ('Jordi Cruz', 'Cocina'), 
('Elena Nito', 'Historia'), ('Paco Merlo', 'Gimnasia'), ('Ana Tomía', 'Biología'), 
('Luz Cuesta', 'Física'), ('Aitor Tilla', 'Inglés'), ('Esteban Quito', 'Geografía'), ('Sara Mago', 'Arte');

-- Meter Aulas
INSERT INTO aulas (numero, capacidad, edificio) VALUES 
('101', 30, 'Principal'), ('102', 25, 'Principal'), ('201', 20, 'Norte'), ('202', 20, 'Norte'),
('Lab1', 15, 'Ciencias'), ('Lab2', 15, 'Ciencias'), ('Inf1', 25, 'Tecnología'), ('Gym', 50, 'Deportes');

-- Meter Asignaturas
INSERT INTO asignaturas (nombre) VALUES 
('Matemáticas I'), ('Lengua Española'), ('Historia de España'), ('Inglés B1'), 
('Biología Geología'), ('Física y Química'), ('Educación Física'), ('Informática'), 
('Dibujo Técnico'), ('Filosofía'), ('Economía'), ('Francés');
