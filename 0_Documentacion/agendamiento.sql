-- Creación de la base de datos
-- CREATE DATABASE sistemaAgendamiento;


CREATE TABLE pacientes (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(50),
    apellido VARCHAR(50),
    correo VARCHAR(100),
    telefono VARCHAR(20)
);

CREATE TABLE medicos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(50),
    especialidad VARCHAR(100),
    correo VARCHAR(100),
    telefono VARCHAR(20)
);


CREATE TABLE agendaMedica (
    id_turno INT AUTO_INCREMENT PRIMARY KEY,
    id_medico INT,
    dia_semana VARCHAR(15),
    hora_inicio TIME,
    hora_fin TIME,
    FOREIGN KEY (id_medico) REFERENCES medicos(id)
);

-- Tabla citas
CREATE TABLE citas (
    id INT AUTO_INCREMENT PRIMARY KEY,
    id_paciente INT,
    id_turno INT,
    fecha DATE,
    hora TIME,
    estado VARCHAR(20), 
    FOREIGN KEY (id_paciente) REFERENCES pacientes(id),
    FOREIGN KEY (id_turno) REFERENCES agendaMedica(id_turno)
);

-- Insert de 10 pacientes
INSERT INTO Pacientes (nombre, apellido, correo, telefono) VALUES
('Juan', 'Perez', 'juan.perez@gmail.com', '3123456789'),
('Maria', 'Lopez', 'maria.lopez@gmail.com', '3123456790'),
('Carlos', 'Rodriguez', 'carlos.rodriguez@gmail.com', '3123456791'),
('Ana', 'Martinez', 'ana.martinez@gmail.com', '3123456792'),
('Luis', 'Gonzalez', 'luis.gonzalez@gmail.com', '3123456793'),
('Sofia', 'Ramirez', 'sofia.ramirez@gmail.com', '3123456794'),
('Jorge', 'Sanchez', 'jorge.sanchez@gmail.com', '3123456795'),
('Isabella', 'Diaz', 'elena.diaz@gmail.com', '3123456796'),
('Pedro', 'Morales', 'pedro.morales@gmail.com', '3123456797'),
('Laura', 'Gutierrez', 'laura.gutierrez@gmail.com', '3123456798');

-- Insert de 3 médicos
INSERT INTO Medicos (nombre, especialidad, correo, telefono) VALUES
('Dr. Carlos', 'Cardiología', 'dr.carlos@hospital.com', '3111111111'),
('Dra. Ana', 'Dermatología', 'dra.ana@hospital.com', '3222222222'),
('Dr. Luis', 'Pediatría', 'dr.luis@hospital.com', '3333333333');

-- Insert de agenda médica para los 3 médicos (asumiendo que trabajan de lunes a viernes de 9am a 5pm)
INSERT INTO AgendaMedica (id_medico, dia_semana, hora_inicio, hora_fin) VALUES
(1, 'Lunes', '09:00:00', '17:00:00'),
(1, 'Martes', '09:00:00', '17:00:00'),
(1, 'Miércoles', '13:00:00', '17:00:00'),
(1, 'Jueves', '09:00:00', '17:00:00'),
(1, 'Viernes', '09:00:00', '12:00:00'),

(2, 'Lunes', '09:00:00', '17:00:00'),
(2, 'Martes', '09:00:00', '17:00:00'),
(2, 'Miércoles', '09:00:00', '17:00:00'),
(2, 'Jueves', '09:00:00', '17:00:00'),
(2, 'Viernes', '09:00:00', '17:00:00'),

(3, 'Lunes', '13:00:00', '17:00:00'),
(3, 'Martes', '13:00:00', '17:00:00'),
(3, 'Miércoles', '13:00:00', '17:00:00'),
(3, 'Jueves', '13:00:00', '17:00:00'),
(3, 'Viernes', '13:00:00', '17:00:00');
