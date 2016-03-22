DROP DATABASE IF EXISTS Extraescolares;

CREATE DATABASE Extraescolares character set utf8 collate utf8_general_ci;

USE Extraescolares;

CREATE TABLE Centros 
(
  idCentro int(9) NOT NULL AUTO_INCREMENT,
  nombreCentro varchar(200) NOT NULL,
  domicilioCentro varchar(200) NOT NULL,
  telefonoCentro int(9) NOT NULL,
  contactoCentro varchar(200) NOT NULL,
  PRIMARY KEY(idCentro)
);

CREATE TABLE Actividades 
(
  idActividad int(9) NOT NULL AUTO_INCREMENT,
  nombreActividad varchar(200) NOT NULL,
  monitor varchar(200) NOT NULL,
  descripcion varchar(200) NOT NULL,
  idCentro int(9) NOT NULL,
  PRIMARY KEY(idActividad),
  FOREIGN KEY (idCentro) REFERENCES Centros(idCentro)
);

CREATE TABLE Alumnos 
(
  idAlumno int(9) NOT NULL AUTO_INCREMENT,
  nombreAlumno varchar(200) NOT NULL,
  apellidosAlumno varchar(200) NOT NULL,
  fechaNac date NOT NULL,
  curso varchar(200) NOT NULL,
  observaciones varchar(200),
  idActividad int(9) NOT NULL,
  PRIMARY KEY(idAlumno),
  FOREIGN KEY (idActividad) REFERENCES Actividades(idActividad)
);

CREATE TABLE Tutores (
  dniTutor varchar(9) NOT NULL,
  passLogin varchar(200) NOT NULL,
  nombreTutor varchar(200) NOT NULL,
  apellidosTutor varchar(200) NOT NULL,
  domicilioTutor varchar(200) NOT NULL,
  telefonoTutor int(9) NOT NULL,
  idAlumno int(9) NOT NULL,
  PRIMARY KEY(dniTutor),
  FOREIGN KEY (idAlumno) REFERENCES Alumnos(idAlumno)
);


INSERT INTO Centros VALUES
('', 'C.P. Mariano Aroca', 'Calle del Sauce, 13, 30011 Murcia', 968250254, 'Ángel '),
('', 'C.P. Ntra. Sra. de Arrixaca', 'Calle del Doctor Alonso de Espejo, 30007 Murcia', 968234047, 'Pilar'),
('', 'C.P. Ntra. Sra. de Atocha', 'Av de Nuestra Señora de Atocha, 2, 30007, Murcia', 968231411, 'Francisco'),
('', 'C.P. Virgen De La Fuensanta', 'Calle Calderón de la Barca, 14, 30150 La Alberca, Murcia', 968842232, 'Carmen María'),
('', 'C.P. Ntra Sra De Belén', 'Av. Dr. Pascual Parrilla Paricio, 30007, Murcia\r\n', 968247771, 'Mariano'),
('', 'C.P. de Prácticas María Maroto', 'Calle Puerta Nueva, 16, 30001 Murcia', 968243527, 'Lourdes'),
('', 'C.P. Santiago El Mayor', ' Calle Sta. Rosa, 30012 Murcia', 968260880, 'Noelia'),
('', 'CEIP. Maestro Enrique Laborda', 'Calle Maestro Francisco Soto, 30011 Los Dolores, Murcia', 968348135, 'Asunción');

INSERT INTO Actividades VALUES
('', 'Psicomotricidad Infantil', 'Pepe', 'Iniciación al deporte para los mas pequeños ', 3),
('', 'Fútbol Sala', 'Jose Javier', 'Iniciación al Fútbol Sala', 5),
('', 'Baloncesto', 'Antonio', 'Iniciación al Baloncesto', 7),
('', 'Baile', 'Virginia', 'Baile flamenco, Moderno, y coreografías', 6),
('', 'Tenis', 'Antonio', 'Iniciación a Tenis y Badminton', 4),
('', 'Patinaje Iniciación', 'Jose Alberto', 'Iniciación a Patinaje con cualquier patín', 2),
('', 'Patinaje Avanzado', 'Jose Alberto', 'Patinaje en línea y estilo libre ', 2),
('', 'Fútbol Base', 'Jose Javier', 'Iniciación al Fútbol Base', 1),
('', 'Ping Pong', 'Pepe', 'Iniciación al Tenis de mesa', 1),
('', 'Ajedred', 'Javi', 'Iniciación al Ajedred', 1),
('', 'Multideporte', 'Pablo', 'Iniciación al Balonmano, Volleyball y FloorBall.', 8);


INSERT INTO Alumnos VALUES
('', 'Ángela', 'Pérez Moreno', '2012-06-07', '2º Infantil', '', 4),
('', 'Jose Antonio', 'Alemán Nicolás', '2008-05-15', '3º Primaria', 'Se queda a Comedor', 8),
('', 'María Isabel', 'García Sánchez', '2013-12-28', '1º Infantil', '', 1),
('', 'Raúl', 'Martínez García', '2006-03-11', '4º Primaria', 'Alérgico al polen', 2),
('', 'Pedro', 'Rosique Gimeno', '2007-08-24', '3º Primaria', 'Se queda a Comedor', 3),
('', 'Martina', 'Sáez Huertas', '2011-04-18', '2º Infantil', 'Alérgica a las abejas', 9),
('', 'Míriam', 'Leal Aroca', '2009-08-07', '1º Primaria', '', 5),
('', 'Juán', 'Gálvez Cuenca', '2008-10-07', '2º Primaria', 'Se queda a Comedor', 10),
('', 'Manuel', 'Hernández Cifuentes', '2008-01-31', '2º Primaria', '', 7),
('', 'Pablo', 'Andújar Gutiérrez', '2010-02-12', '3º Infantil', 'Celíaco. Se queda a Comedor', 6);


INSERT INTO Tutores VALUES
('00000000A', '4a7d1ed414474e4033ac29ccb8653d9b', 'ADMINISTRADOR', 'DE LA APLICACIÓN', 'SERVIDOR', 192168100, 1),
('22185398D', 'b0df2270be9cb16c14537e5bc2f2d37b', 'Carmen', 'Aroca Buendía', 'Calle Rosario, 7. Puente Tocinos. Murcia', 968468904, 7),
('23402861V', '43e4e6a6f341e00671e123714de019a8', 'Juán Pedro', 'Rosique Escribano', 'Calle Cartagena, 65 - 3ºI. Murcia', 968410325, 5),
('25976304X', 'ed57844fa5e051809ead5aa7e3e1d555', 'María', 'Nicolás Zapata', 'Calle Iglesia, 13. Los Dolores. Murcia', 968250134, 2),
('27106529L', 'de594ef5c314372edec29b93cab9d72e', 'Arturo', 'García Sanchez', 'Calle Roque, 4. Murcia', 616843541, 3),
('32171612J', '52edc4a5890adc59cec82cb60f8af691', 'Antonio', 'Gálvez Torrico', 'Carril del Torero, 1. Los Dolores. Murcia', 637934805, 8),
('32480492Q', 'c57abe86de4e516e12dfa386053fbfe2', 'Ángela', 'Moreno Hernández', 'Calle Orfeón, 34. Murcia', 650724209, 1),
('36143680P', '6add07cf50424b14fdf649da87843d01', 'Encarna', 'Cifuentes Marcos', 'Avda. Torre de Romo, 47 - 2ºC. Murcia', 868135441, 9),
('38470621B', 'a3048e47310d6efaa4b1eaf55227bc92', 'Jorge', 'Sáez Jimenez', 'Avda. de las Américas, 78. Murcia', 689411357, 6),
('40592314M', '75806e8a1c04cad241934a374c1359c0', 'Ginés', 'Martínez Fernández', 'Calle Tejeras, 24 - 2ºC. Los Garres. Murcia', 968471608, 4),
('43630486R', 'c0a62e133894cdce435bcb4a5df1db2d', 'Pepe', 'Andujar Oliver', 'Avda. Albacete, 120. Murcia', 654316816, 10);

