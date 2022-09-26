

CREATE TABLE `TALLERPHP1`. `tabla1` (
  `ID` int(30) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(50) NOT NULL,
  `campo3` varchar(50) NOT NULL,
  `campo4` varchar(50) NOT NULL
) 


INSERT INTO `tabla1` (`ID`, `descripcion`, `campo3`, `campo4`) VALUES
(1, 'primera descripcion', 'texto de ejemplo para campo3', ':texto de ejemplo para campo4'),
(2, 'Segunda descripcion', 'texto 2 de ejemplo para campo3', ':texto 2 de ejemplo para campo4'),
(3, 'tercera descripcion', 'texto 3 de ejemplo para campo3', ':texto 3 de ejemplo para campo4'),
(4, 'cuarta descripcion', 'texto 4 de ejemplo para campo3', ':texto 4 de ejemplo para campo4'),
(5, 'quinta descripcion', 'texto 5 de ejemplo para campo3', ':texto 5 de ejemplo para campo4'),
(6, 'sexta descripcion', 'texto 6 de ejemplo para campo3', ':texto 6 de ejemplo para campo4');



-- Estructura de tabla para la tabla `tabla2`

CREATE TABLE `TALLERPHP1`.`tabla2` (
  `ID` int(30) NOT NULL AUTO_INCREMENT,
  `fk_ID` int(30) NOT NULL,
  `campoVarchar1` varchar(50) NOT NULL,
  `campoVarchar2` varchar(50) NOT NULL,
  `campodatetime` datetime DEFAULT NULL,
  `campodate` date DEFAULT NULL,
  `campoint` int(11) NOT NULL,
  `campofloat` float NOT NULL,
  `campoemail` varchar(50) NOT NULL
) 


INSERT INTO `tabla2` (`ID`, `fk_ID`, `campoVarchar1`, `campoVarchar2`, `campodatetime`, `campodate`, `campoint`, `campofloat`, `campoemail`) VALUES
(1, 1, 'paciente1', 'receta1', '2001-01-01 01:01:01', '1991-01-01', 26, 26.07, 'correo1@gmail.com'),
(2, 2, 'paciente2', 'receta2', '2002-02-02 02:02:02', '1992-02-02', 27, 27.08, 'correo2@gmail.com'),
(3, 3, 'paciente3', 'receta3', '2003-03-03 03:03:03', '1993-03-03', 23, 23.03, 'correo3@gmail.com'),
(4, 4, 'paciente4', 'receta4', '2004-04-04 04:04:04', '1994-04-04', 24, 24.04, 'correo4@gmail.com');




