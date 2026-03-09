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
