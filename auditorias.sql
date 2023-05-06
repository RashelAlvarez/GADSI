-- phpMyAdmin SQL Dump
-- version 4.9.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 13, 2020 at 02:34 AM
-- Server version: 5.7.24
-- PHP Version: 7.2.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `auditorias`
--

-- --------------------------------------------------------

--
-- Table structure for table `activos`
--

CREATE TABLE `activos` (
  `idactivo` int(20) NOT NULL,
  `idauditoria` int(11) NOT NULL,
  `idtipoactivo` int(20) NOT NULL,
  `idestatus` int(10) NOT NULL,
  `idempresa` int(11) NOT NULL,
  `nombre` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `descripcion` text COLLATE utf8_unicode_ci NOT NULL,
  `responsable` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `idconfidencialidad` int(10) NOT NULL,
  `idintegridad` int(10) NOT NULL,
  `idisponibilidad` int(11) NOT NULL,
  `codigo` varchar(25) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `activos`
--

INSERT INTO `activos` (`idactivo`, `idauditoria`, `idtipoactivo`, `idestatus`, `idempresa`, `nombre`, `descripcion`, `responsable`, `idconfidencialidad`, `idintegridad`, `idisponibilidad`, `codigo`) VALUES
(1, 1, 1, 1, 2, 'Base de Datos', 'Mysql version 5.4', 'Jose Garcia', 3, 4, 4, 'DP001'),
(2, 1, 2, 2, 2, 'Disco Duro Portatil', 'Marca Toshiba con capacidad de almacenamiento 1TB', 'Fernando Perez', 3, 3, 2, 'DP002'),
(3, 1, 2, 1, 2, 'Servidor', 'Servidor HP ProLiant ML10 v2 (Ram 8 GB, 4 DD 1 TB en RAID 10, 2 tarjetas de red, Procesador Xenon)', 'Karla Rodriguez', 5, 4, 4, 'DP003'),
(4, 1, 1, 1, 2, 'Plan de continuidad del negocio', 'Plan de continuidad del negocio en caso de desastres', 'Nelson Perez', 3, 5, 5, 'DP004'),
(5, 1, 1, 1, 2, 'Estructura del departamento de tecnología', 'Organigrama del departamento asi como tambien de los cargos ocupados en la misma', 'Gabriel Lara', 3, 3, 4, 'DP005'),
(6, 2, 1, 1, 3, 'base de datos', 'hjhgjg', 'carlos', 1, 3, 4, 'EP000'),
(14, 2, 1, 1, 3, 'Manual del Sistema', '	dfdfgdg', 'Juan pereira', 1, 3, 4, 'EP001'),
(15, 2, 6, 1, 3, 'Cuarto de telecomunicaciones', '							', 'Juan jose', 5, 3, 5, 'EP002'),
(16, 2, 3, 1, 3, 'Sistema de administracion', 'Sistema de administración', 'Manuel Ortega', 3, 4, 4, 'EP003'),
(18, 3, 1, 1, 2, 'Base de Datos', 'Mysql version 5.4', 'Jose Garcia', 3, 4, 4, 'DP001'),
(19, 3, 2, 1, 2, 'Disco Duro Portatil', 'Marca Toshiba con capacidad de almacenamiento 1TB', 'Fernando Perez', 3, 3, 2, 'DP002'),
(20, 3, 2, 1, 2, 'Servidor', ' 	Servidor HP ProLiant ML10 v2 (Ram 8 GB, 4 DD 1 TB ...', 'Karla Rodriguez', 5, 4, 4, 'DP003'),
(21, 3, 1, 1, 2, 'Plan de continuidad del negocio', 'Plan de continuidad del negocio en caso de desastres', 'Nelson Perez', 3, 5, 5, 'DP004'),
(22, 3, 1, 1, 2, 'Estructura del departamento de tecnología', 'Organigrama del departamento asi como tambien de los cargos ocupados en la misma', 'Gabriel Lara', 3, 3, 4, 'DP005');

-- --------------------------------------------------------

--
-- Table structure for table `amenazas`
--

CREATE TABLE `amenazas` (
  `idamenaza` int(20) NOT NULL,
  `idtipoamenazas` int(20) NOT NULL,
  `descripcion` varchar(200) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `amenazas`
--

INSERT INTO `amenazas` (`idamenaza`, `idtipoamenazas`, `descripcion`) VALUES
(1, 1, 'Cortes de Suministro Electricos'),
(2, 4, 'Falta de capacitacion del personal, falta de mantenimiento de las políticasde seguridad en credenciales y cifrado de la información'),
(3, 2, 'Caida del servicio, virus, toyanos, falta de mantenimiento'),
(4, 3, 'Desastres Naturales debido a terremetos, inundaciones, incendios,etc'),
(5, 5, 'Explosiones, derrumbes, contaminación química, etc.');

-- --------------------------------------------------------

--
-- Table structure for table `auditoria`
--

CREATE TABLE `auditoria` (
  `idauditoria` int(20) NOT NULL,
  `idusuario` int(20) NOT NULL,
  `idempresa` int(20) NOT NULL,
  `idestatus` int(20) NOT NULL,
  `descripcion` text COLLATE utf8_unicode_ci NOT NULL,
  `fechai` date NOT NULL,
  `fechaf` date NOT NULL,
  `observaciones` text COLLATE utf8_unicode_ci,
  `idcontactoinicial` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `auditoria`
--

INSERT INTO `auditoria` (`idauditoria`, `idusuario`, `idempresa`, `idestatus`, `descripcion`, `fechai`, `fechaf`, `observaciones`, `idcontactoinicial`) VALUES
(1, 2, 2, 1, 'El objetivo de esta auditoria es verificar el estado actual en el que se encuentra el servidor', '2020-01-30', '2020-02-19', '', 1),
(2, 6, 3, 1, 'La finalidad de la auditoria es verificar la integridad de la base de datos', '2020-02-17', '2020-02-28', '', 3),
(3, 2, 2, 1, 'El objetivo de la auditoria es comparar el nivel de riesgo actual con los resultados de la auditoria anterior', '2021-04-23', '2021-04-28', '', 2),
(4, 6, 3, 1, 'La finalidad de la auditoria es analizar el riesgo en la que se encuentra la organización', '2020-03-11', '2020-05-31', ' ', 4);

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `id` int(11) NOT NULL,
  `comment` text COLLATE utf8_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `file_id` int(11) NOT NULL,
  `comment_id` int(11) DEFAULT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`id`, `comment`, `user_id`, `file_id`, `comment_id`, `created_at`) VALUES
(5, 'Perfecto, buen aporte.', 4, 15, NULL, '2020-03-11 15:50:19'),
(6, 'Buen aporte', 1, 16, NULL, '2020-03-11 18:03:21');

-- --------------------------------------------------------

--
-- Table structure for table `confidencialidad`
--

CREATE TABLE `confidencialidad` (
  `idconfidencialidad` int(11) NOT NULL,
  `valor` int(11) NOT NULL,
  `nombre` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `confidencialidad`
--

INSERT INTO `confidencialidad` (`idconfidencialidad`, `valor`, `nombre`) VALUES
(1, 1, 'Muy Bajo'),
(2, 2, 'Bajo'),
(3, 3, 'Medio'),
(4, 4, 'Alto'),
(5, 5, 'Muy Alto');

-- --------------------------------------------------------

--
-- Table structure for table `contactoinicial`
--

CREATE TABLE `contactoinicial` (
  `idcontactoinicial` int(11) NOT NULL,
  `idempresa` int(11) NOT NULL,
  `nombre` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `apellido` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `idusuario` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `descripcion` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `contactoinicial`
--

INSERT INTO `contactoinicial` (`idcontactoinicial`, `idempresa`, `nombre`, `apellido`, `idusuario`, `fecha`, `descripcion`) VALUES
(1, 2, 'Enmanuel', 'Rodriguez', 2, '2020-01-08', 'En esta reunión se planificó lo siguiente:\r\n* Cooperacion para la ejecucion de la auditoria.\r\n* Se establecio un horario para aclarar dudas y aplicación de entrevistas.\r\n* La informacion se proporcionara solo por autorizacion de la dirección'),
(2, 2, 'Fabian', 'Gonzalez', 2, '2020-03-17', 'En la presente reunión se establecieron las siguientes condiciones:\r\n* Atención en horario de oficina 1 dia por semana.\r\n* Disponibilidad de la información'),
(3, 3, 'Mariana', 'Ramirez', 6, '2020-01-21', 'En la presente reunión se planificó lo siguiente:\r\n* Tiempo y recursos necesarios.\r\n* Se proporcionará información documentada y digital\r\n'),
(4, 4, 'Estefani', 'Pereira', 6, '2020-03-08', 'El motivo de esta reunión es plantear los motivos por la cual se llevara a cabo la auditoria y evaluar la viabilidad de la misma de acuerdo a los requerimientos solicitados. El gerente proporcionara la informacion necesaria para llevar a cabo la auditoria de forma adecuada y de igual manera estara a disposición en la manera que se requiera plantear alguna situacion inadecuada.'),
(5, 3, 'Javier', 'Henriquez', 6, '2020-03-01', 'Esta reunión se llevo a cabo para definir la viabilidad de la auditoria, a continuación se mencionara lo siguiente:\r\n* El auditado estara dispuesto a ofrecer la documentacion requerida.\r\n* Atendera cualquier inquietud solo al auditor lider en horario de oficina.\r\n* Proporcionara el tiempo y los recursos necesarios.\r\n'),
(6, 2, 'juan', 'perez', 2, '2020-03-11', 'hola');

-- --------------------------------------------------------

--
-- Table structure for table `controles`
--

CREATE TABLE `controles` (
  `idcontrol` int(20) NOT NULL,
  `dominio` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `objetivo` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `nombre` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `controles`
--

INSERT INTO `controles` (`idcontrol`, `dominio`, `objetivo`, `nombre`) VALUES
(1, '5.Politicas de Seguridad', '5.1 Directrices de la Direccion en Seguridad de la Informacion', '5.1.1 Conjunto de politicas para la seguridad de la informacion'),
(2, '5. Politicas de Seguridad', '5.1 Directrices de la direccion en seguridad de la informacion', '5.1.2 Revision de las politicas para la seguridad de la informacion'),
(3, '6. Aspectos Organizativos de la seguridad de la informacion', '6.1 Organizacion interna', '6.1.1 Asignacion de actividades para la seguridad de la informacion'),
(4, '6. Aspectos Organizativos de la seguridad de la informacion', '6.1 Organizacion interna', '6.1.2 Segregacion de tareas'),
(5, '6. Aspectos Organizativos de la seguridad de la informacion', '6.1 Organizacion interna', '6.1.3 Contacto con las autoridades'),
(6, '6. Aspectos Organizativos de la seguridad de la informacion', '6.1 Organizacion interna', '6.1.4 Contacto con grupos de interés especial'),
(7, '6. Aspectos Organizativos de la seguridad de la informacion', '6.1 Organizacion interna', '6.1.5 Seguridad de la información en la gestión de proyectos');

-- --------------------------------------------------------

--
-- Table structure for table `disponibilidad`
--

CREATE TABLE `disponibilidad` (
  `idisponibilidad` int(11) NOT NULL,
  `valor` int(11) NOT NULL,
  `nombre` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `disponibilidad`
--

INSERT INTO `disponibilidad` (`idisponibilidad`, `valor`, `nombre`) VALUES
(1, 1, 'Muy Bajo'),
(2, 2, 'Bajo'),
(3, 3, 'Medio'),
(4, 4, 'Alto'),
(5, 5, 'Muy Alto');

-- --------------------------------------------------------

--
-- Table structure for table `empresas`
--

CREATE TABLE `empresas` (
  `idempresa` int(20) NOT NULL,
  `nombre` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `rif` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `direccion` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `telefono` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `fecha` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `empresas`
--

INSERT INTO `empresas` (`idempresa`, `nombre`, `rif`, `direccion`, `telefono`, `fecha`) VALUES
(2, 'Derivados Plasticos c.a', 'J-23445452', 'Avenida 67 Valencia, Carabobo', '0241-8747522', '2020-01-07'),
(3, 'Empresas Polar', 'J-43545621', 'Autopista regional del centro', '0241-9856778', '2020-02-10'),
(4, 'EPA', 'J-53423232', 'Zona Industrial', '0241-9341243', '2020-02-29');

-- --------------------------------------------------------

--
-- Table structure for table `estatus`
--

CREATE TABLE `estatus` (
  `idestatus` int(20) NOT NULL,
  `nombre` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `estatus`
--

INSERT INTO `estatus` (`idestatus`, `nombre`) VALUES
(1, 'Activo'),
(2, 'Inactivo');

-- --------------------------------------------------------

--
-- Table structure for table `evaluar_controles`
--

CREATE TABLE `evaluar_controles` (
  `idevaluarcontroles` int(10) NOT NULL,
  `idcontrol` int(10) NOT NULL,
  `idnivelriesgo` int(10) NOT NULL,
  `frecuencia` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `tipocontrol` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `automatizacion` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `evaluar_controles`
--

INSERT INTO `evaluar_controles` (`idevaluarcontroles`, `idcontrol`, `idnivelriesgo`, `frecuencia`, `tipocontrol`, `automatizacion`) VALUES
(1, 1, 1, 'Periodico', 'Preventivo', 'Automatizado'),
(2, 2, 2, 'Periodico', 'Correctivo', 'Manual'),
(3, 2, 3, 'Permanente', 'Preventivo', 'Manual'),
(4, 1, 4, 'Periodico', 'Correctivo', 'Manual');

-- --------------------------------------------------------

--
-- Table structure for table `file`
--

CREATE TABLE `file` (
  `idfile` int(11) NOT NULL,
  `code` varchar(12) COLLATE utf8_unicode_ci NOT NULL,
  `filename` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `is_public` tinyint(1) NOT NULL,
  `is_folder` tinyint(1) NOT NULL,
  `user_id` int(11) NOT NULL,
  `folder_id` int(11) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `idempresa` int(11) DEFAULT NULL,
  `idauditoria` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `file`
--

INSERT INTO `file` (`idfile`, `code`, `filename`, `description`, `is_public`, `is_folder`, `user_id`, `folder_id`, `created_at`, `idempresa`, `idauditoria`) VALUES
(1, 'y7Olmd6lFRpo', 'Herramientas para la Auditoria', 'Formatos de encuestas e informes necesarios para la aplicacion de la auditoria', 0, 1, 1, NULL, '2020-02-26 13:02:45', NULL, NULL),
(2, 'CyFmGEeL5IEO', 'ENCUESTA_TI.docx', 'Formato de Encuesta para la aplicacion de la entrevista en la auditoria de sistemas', 0, 0, 1, 1, '2020-02-26 13:02:42', NULL, NULL),
(3, 'kURAsw-HP1mM', 'evidencias', 'evidencias para la auditoria', 0, 1, 1, NULL, '2020-03-03 18:03:57', NULL, NULL),
(4, 'xwy6UBgYRUC8', 'autocontrol.jpg', 'La sala de servidores donde reside el sistema no cuenta con mecanismos de control de accesos que permita restringir y monitorear el acceso solo al personal autorizado.', 0, 0, 1, 3, '2020-03-10 22:03:11', 2, 1),
(10, 'xd6J15Gp42TQ', 'audi_infor.pdf', 'No se cuenta con un Plan de Continuidad del Negocio (BCP) y Plan de Recuperación de Desastres (DRP) formalmente documentado, aprobado y actualizado.', 0, 0, 1, 3, '2020-03-11 09:03:06', 2, 1),
(11, '62tLBeHS5RyI', 'notas.txt', 'No están claramente definidas y documentadas las descripciones de cargo del personal de Tecnología y Sistemas, así como tampoco, existe una figura encargada de la gestión de desarrollo de sistemas.', 0, 0, 1, 3, '2020-03-11 12:03:03', 2, 1),
(12, 'tUtLUs2oQYjQ', 'incidentes.pdf', 'La planificación de un Plan de Continuidad del Negocio y Plan de Recuperación de Desastres  se encuentra en proceso esta siendo documentado pero no esta aprobado.', 0, 0, 1, 3, '2020-03-11 12:03:02', 2, 3),
(13, 'G9MujFvFLR0m', 'notas_1.txt', 'Se evidenció que las funciones y responsabilidades relacionadas con el departamento de tecnologia, se encuentra en proceso de documentacion formal.', 0, 0, 1, 3, '2020-03-11 13:03:02', 2, 3),
(14, 'LgPgmkUS9anI', 'Chrysanthemum.jpg', 'Durante nuestra indagación  la organización no posee un mecanismo de autenticación que permita identificar las personas que ingresaron a la sala de servidores.', 0, 0, 1, 3, '2020-03-11 13:03:56', 2, 3),
(15, '00iLRGbsqV8_', 'Desert.jpg', 'No se realizan procedimientos formales de monitoreo para la ejecucion de respaldos de la base de datos ni del sistema', 0, 0, 1, 3, '2020-03-11 15:03:40', 3, 2),
(16, '1VCeYbPgSpVi', 'chart.png', 'No se realizan cambios de contraseña anual.', 0, 0, 4, 3, '2020-03-11 15:03:41', 3, 2),
(17, '5raY92LZdfEb', 'IMG_3288.jpg', 'Se encontró un fallo en el sistema', 0, 0, 1, 3, '2020-03-12 20:03:23', 2, 3),
(18, 'VU9uOlwTC_9F', 'IMG_2605.jpg', 'Como siempre, esto es una prueba', 0, 0, 2, 3, '2020-03-12 20:03:47', 2, 3),
(19, 'Kba4H80QZEgk', 'IMG_4077.jpg', 'Prueba', 0, 0, 6, 3, '2020-03-12 20:03:36', 2, 3);

-- --------------------------------------------------------

--
-- Table structure for table `impacto`
--

CREATE TABLE `impacto` (
  `idimpacto` int(20) NOT NULL,
  `valor` int(20) NOT NULL,
  `nombre` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `impacto`
--

INSERT INTO `impacto` (`idimpacto`, `valor`, `nombre`) VALUES
(1, 5, 'Catastrofico'),
(2, 4, 'Desastroso'),
(3, 3, 'Serio'),
(4, 2, 'Menor'),
(5, 1, 'Insignificante');

-- --------------------------------------------------------

--
-- Table structure for table `integridad`
--

CREATE TABLE `integridad` (
  `idintegridad` int(11) NOT NULL,
  `valor` int(11) NOT NULL,
  `nombre` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `integridad`
--

INSERT INTO `integridad` (`idintegridad`, `valor`, `nombre`) VALUES
(1, 1, 'Muy Bajo'),
(2, 2, 'Bajo'),
(3, 3, 'Medio'),
(4, 4, 'Alto'),
(5, 5, 'Muy Alto');

-- --------------------------------------------------------

--
-- Table structure for table `modulos`
--

CREATE TABLE `modulos` (
  `idmodulos` int(10) NOT NULL,
  `nombre` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `modulos`
--

INSERT INTO `modulos` (`idmodulos`, `nombre`) VALUES
(1, 'Activos'),
(2, 'Auditorias'),
(3, 'Usuarios'),
(4, 'Informes');

-- --------------------------------------------------------

--
-- Table structure for table `nivel_riesgo`
--

CREATE TABLE `nivel_riesgo` (
  `idnivelriesgo` int(10) NOT NULL,
  `idamenaza` int(11) NOT NULL,
  `idprobabilidad` int(10) NOT NULL,
  `idimpacto` int(10) NOT NULL,
  `idactivo` int(10) NOT NULL,
  `riesgo` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `idauditoria` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `nivel_riesgo`
--

INSERT INTO `nivel_riesgo` (`idnivelriesgo`, `idamenaza`, `idprobabilidad`, `idimpacto`, `idactivo`, `riesgo`, `idauditoria`) VALUES
(1, 2, 1, 5, 1, 'MODERADO', 1),
(2, 2, 5, 5, 2, 'BAJO', 1),
(3, 2, 1, 1, 3, 'EXTREMO', 1),
(4, 4, 3, 2, 4, 'ALTO', 1),
(5, 3, 3, 4, 18, 'MODERADO', 3),
(6, 2, 5, 3, 19, 'BAJO', 3),
(7, 3, 1, 1, 3, 'EXTREMO', 3),
(9, 2, 2, 4, 6, 'MODERADO', 2),
(10, 3, 3, 1, 14, 'ALTO', 2),
(11, 1, 4, 4, 15, 'BAJO', 2),
(12, 3, 1, 5, 16, 'MODERADO', 2),
(13, 2, 2, 3, 5, 'ALTO', 1),
(14, 2, 1, 1, 4, 'EXTREMO', 3),
(15, 5, 3, 2, 22, 'ALTO', 3);

-- --------------------------------------------------------

--
-- Table structure for table `permision`
--

CREATE TABLE `permision` (
  `id` int(11) NOT NULL,
  `p_id` int(11) DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `file_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `permision`
--

INSERT INTO `permision` (`id`, `p_id`, `user_id`, `file_id`, `created_at`) VALUES
(1, 1, 2, 3, '2020-03-11 01:02:26'),
(2, 1, 3, 3, '2020-03-11 01:06:25'),
(3, 1, 5, 3, '2020-03-11 01:07:22'),
(4, 1, 5, 14, '2020-03-11 14:24:01');

-- --------------------------------------------------------

--
-- Table structure for table `permisos_modulos`
--

CREATE TABLE `permisos_modulos` (
  `idpermisos` int(10) NOT NULL,
  `idusuario` int(10) NOT NULL,
  `idmodulos` int(10) NOT NULL,
  `ver` tinyint(1) NOT NULL,
  `editar` tinyint(1) NOT NULL,
  `crear` tinyint(1) NOT NULL,
  `eliminar` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `permisos_modulos`
--

INSERT INTO `permisos_modulos` (`idpermisos`, `idusuario`, `idmodulos`, `ver`, `editar`, `crear`, `eliminar`) VALUES
(1, 1, 1, 0, 0, 0, 0),
(2, 1, 2, 0, 0, 0, 0),
(3, 1, 3, 1, 1, 1, 1),
(4, 1, 4, 1, 1, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `probabilidad`
--

CREATE TABLE `probabilidad` (
  `idprobabilidad` int(20) NOT NULL,
  `valor` int(20) NOT NULL,
  `nombre` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `probabilidad`
--

INSERT INTO `probabilidad` (`idprobabilidad`, `valor`, `nombre`) VALUES
(1, 5, 'Casi Seguro'),
(2, 4, 'Muy probable'),
(3, 3, 'Posible'),
(4, 2, 'Improbable'),
(5, 1, 'Muy improbable');

-- --------------------------------------------------------

--
-- Table structure for table `recomendaciones`
--

CREATE TABLE `recomendaciones` (
  `idrecomendaciones` int(11) NOT NULL,
  `idempresa` int(11) NOT NULL,
  `idauditoria` int(11) NOT NULL,
  `descripcion` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `recomendaciones`
--

INSERT INTO `recomendaciones` (`idrecomendaciones`, `idempresa`, `idauditoria`, `descripcion`) VALUES
(1, 2, 1, '* Documentar los roles y responsabilidades de todo el personal del departamento de sistemas, en donde se indique los niveles de reporte de cargo.\r\n* Definir una estructura organizativa que incluya la figura de Gestión de Desarrollo de Sistemas, el cual se haga responsable por la implementación de los nuevos sistemas y mantenimientos de los ya existentes.\r\n* Se sugiere evaluar la posibilidad de implementar mecanismos automatizados para el control del acceso físico a la sala donde se encuentran el servidor del sistema.\r\n* Además, se sugiere que el mecanismo automatizado de control genere reportes periódicos de los accesos que se registran, los cuales deben ser monitoreados por personal distinto al personal encargado de configurar los accesos en el sistema de control.\r\n* Desarrollo de un plan detallado para la recuperación de las instalaciones y para las funciones de negocio que sean críticas para continuar operando a un nivel aceptable.\r\n* Actualización de los planes de continuidad a medida que cambia el negocio y se desarrollan nuevos sistemas.'),
(4, 2, 3, '* Ejecución de pruebas sobre los planes de continuidad.\r\n* Un análisis del impacto del negocio sobre el efecto que tiene la pérdida de procesos de negocio críticos.\r\n* Conformar un departamento o área de TI en donde se formalicen y concentren todas las funciones relacionadas con la administración y el control de los sistemas de información y la plataforma tecnológica, incluyendo el control de aquellas funciones que se encuentren actualmente asignadas a las área funcionales\r\n* El no contar con un mecanismo de autenticación de acceso del personal al Centro de Computo puede ocasionar que personal no autorizado ingrese al mismo, realizando sustracción, modificación, alteración o destrucción de los equipos y/o de la información de las aplicaciones críticas que allí residen'),
(5, 3, 2, '* Establecer mecanismos que permitan monitorear la ejecución de los respaldos.\r\n* Considerar realizar pruebas periódicas de restauración de los datos para el sistema \r\n, con el fin de verificar que el proceso de respaldo se esté ejecutando correctamente y que los datos estarán disponibles al momento que sea necesario \r\n');

-- --------------------------------------------------------

--
-- Table structure for table `tareas`
--

CREATE TABLE `tareas` (
  `idtarea` int(20) NOT NULL,
  `idusuario` int(20) NOT NULL,
  `idestatus` int(20) NOT NULL,
  `nombre` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tipoactivos`
--

CREATE TABLE `tipoactivos` (
  `idtipoactivo` int(20) NOT NULL,
  `nombre` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tipoactivos`
--

INSERT INTO `tipoactivos` (`idtipoactivo`, `nombre`) VALUES
(1, 'Datos o Informacion'),
(2, 'Hardware'),
(3, 'Software'),
(4, 'Redes de comunicaciones'),
(5, 'Personal Interno'),
(6, 'Infraestructura');

-- --------------------------------------------------------

--
-- Table structure for table `tipoamenazas`
--

CREATE TABLE `tipoamenazas` (
  `idtipoamenazas` int(20) NOT NULL,
  `descripcion` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tipoamenazas`
--

INSERT INTO `tipoamenazas` (`idtipoamenazas`, `descripcion`) VALUES
(1, 'Infraestructura'),
(2, 'Fallos de los Sistemas Informaticos y de Comunicaciones'),
(3, 'Origen Natural'),
(4, 'Humano'),
(5, 'Origen Industrial');

-- --------------------------------------------------------

--
-- Table structure for table `tipousuarios`
--

CREATE TABLE `tipousuarios` (
  `idtipousuario` int(20) NOT NULL,
  `nombre` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tipousuarios`
--

INSERT INTO `tipousuarios` (`idtipousuario`, `nombre`) VALUES
(1, 'Administrador'),
(2, 'Lider'),
(3, 'Auditor');

-- --------------------------------------------------------

--
-- Table structure for table `usuarios`
--

CREATE TABLE `usuarios` (
  `idusuario` int(20) NOT NULL,
  `idestatus` int(20) NOT NULL,
  `idtipousuario` int(20) NOT NULL,
  `nombre` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `apellido` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `correo` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `clave` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `usuarios`
--

INSERT INTO `usuarios` (`idusuario`, `idestatus`, `idtipousuario`, `nombre`, `apellido`, `correo`, `clave`, `image`) VALUES
(1, 1, 1, 'admin', 'admin', 'admin@gmail.com', '9999', 'f1.png'),
(2, 1, 2, 'Sofia', 'Perez', 'sofia12@gmail.com', '1212', 'f1.png'),
(3, 1, 3, 'Roberto', 'Gonzalez', 'roberto12@gmail.com', '5555', 'f1.png'),
(4, 1, 3, 'Andrea', 'Romero', 'andrea3@gmail.com', '3333', 'f1.png'),
(5, 2, 3, 'Rashel', 'Alvarez', 'rashel@gmail.com', '1212', 'f1.png'),
(6, 1, 2, 'Jose', 'lopez', 'jose@gmail.com', '1111', 'f1.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activos`
--
ALTER TABLE `activos`
  ADD PRIMARY KEY (`idactivo`),
  ADD KEY `idtipoactivo` (`idtipoactivo`),
  ADD KEY `idestatus` (`idestatus`),
  ADD KEY `confidencialidad` (`idconfidencialidad`,`idintegridad`,`idisponibilidad`),
  ADD KEY `idintegridad` (`idintegridad`),
  ADD KEY `idisponibilidad` (`idisponibilidad`),
  ADD KEY `idauditoria` (`idauditoria`),
  ADD KEY `idempresa` (`idempresa`);

--
-- Indexes for table `amenazas`
--
ALTER TABLE `amenazas`
  ADD PRIMARY KEY (`idamenaza`),
  ADD KEY `idtipoamenazas` (`idtipoamenazas`);

--
-- Indexes for table `auditoria`
--
ALTER TABLE `auditoria`
  ADD PRIMARY KEY (`idauditoria`),
  ADD KEY `idusuario` (`idusuario`),
  ADD KEY `idempresa` (`idempresa`),
  ADD KEY `idestatus` (`idestatus`),
  ADD KEY `idcontactoinicial` (`idcontactoinicial`);

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `file_id` (`file_id`),
  ADD KEY `comment_id` (`comment_id`);

--
-- Indexes for table `confidencialidad`
--
ALTER TABLE `confidencialidad`
  ADD PRIMARY KEY (`idconfidencialidad`);

--
-- Indexes for table `contactoinicial`
--
ALTER TABLE `contactoinicial`
  ADD PRIMARY KEY (`idcontactoinicial`),
  ADD KEY `idempresa` (`idempresa`),
  ADD KEY `idusuario` (`idusuario`);

--
-- Indexes for table `controles`
--
ALTER TABLE `controles`
  ADD PRIMARY KEY (`idcontrol`);

--
-- Indexes for table `disponibilidad`
--
ALTER TABLE `disponibilidad`
  ADD PRIMARY KEY (`idisponibilidad`);

--
-- Indexes for table `empresas`
--
ALTER TABLE `empresas`
  ADD PRIMARY KEY (`idempresa`);

--
-- Indexes for table `estatus`
--
ALTER TABLE `estatus`
  ADD PRIMARY KEY (`idestatus`);

--
-- Indexes for table `evaluar_controles`
--
ALTER TABLE `evaluar_controles`
  ADD PRIMARY KEY (`idevaluarcontroles`),
  ADD KEY `idcontrol` (`idcontrol`),
  ADD KEY `idnivelriesgo` (`idnivelriesgo`);

--
-- Indexes for table `file`
--
ALTER TABLE `file`
  ADD PRIMARY KEY (`idfile`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `folder_id` (`folder_id`),
  ADD KEY `idempresa` (`idempresa`),
  ADD KEY `idauditoria` (`idauditoria`);

--
-- Indexes for table `impacto`
--
ALTER TABLE `impacto`
  ADD PRIMARY KEY (`idimpacto`);

--
-- Indexes for table `integridad`
--
ALTER TABLE `integridad`
  ADD PRIMARY KEY (`idintegridad`);

--
-- Indexes for table `modulos`
--
ALTER TABLE `modulos`
  ADD PRIMARY KEY (`idmodulos`);

--
-- Indexes for table `nivel_riesgo`
--
ALTER TABLE `nivel_riesgo`
  ADD PRIMARY KEY (`idnivelriesgo`),
  ADD KEY `idprobabilidad` (`idprobabilidad`),
  ADD KEY `idimpacto` (`idimpacto`),
  ADD KEY `idactivo` (`idactivo`),
  ADD KEY `idamenaza` (`idamenaza`),
  ADD KEY `idauditoria` (`idauditoria`);

--
-- Indexes for table `permision`
--
ALTER TABLE `permision`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `file_id` (`file_id`);

--
-- Indexes for table `permisos_modulos`
--
ALTER TABLE `permisos_modulos`
  ADD PRIMARY KEY (`idpermisos`),
  ADD KEY `idusuario` (`idusuario`),
  ADD KEY `idmodulos` (`idmodulos`);

--
-- Indexes for table `probabilidad`
--
ALTER TABLE `probabilidad`
  ADD PRIMARY KEY (`idprobabilidad`);

--
-- Indexes for table `recomendaciones`
--
ALTER TABLE `recomendaciones`
  ADD PRIMARY KEY (`idrecomendaciones`),
  ADD KEY `idempresa` (`idempresa`),
  ADD KEY `idauditoria` (`idauditoria`);

--
-- Indexes for table `tareas`
--
ALTER TABLE `tareas`
  ADD PRIMARY KEY (`idtarea`),
  ADD KEY `idusuario` (`idusuario`),
  ADD KEY `idestatus` (`idestatus`);

--
-- Indexes for table `tipoactivos`
--
ALTER TABLE `tipoactivos`
  ADD PRIMARY KEY (`idtipoactivo`);

--
-- Indexes for table `tipoamenazas`
--
ALTER TABLE `tipoamenazas`
  ADD PRIMARY KEY (`idtipoamenazas`);

--
-- Indexes for table `tipousuarios`
--
ALTER TABLE `tipousuarios`
  ADD PRIMARY KEY (`idtipousuario`);

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`idusuario`),
  ADD KEY `idestatus` (`idestatus`),
  ADD KEY `idtipousuario` (`idtipousuario`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activos`
--
ALTER TABLE `activos`
  MODIFY `idactivo` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `amenazas`
--
ALTER TABLE `amenazas`
  MODIFY `idamenaza` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `auditoria`
--
ALTER TABLE `auditoria`
  MODIFY `idauditoria` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `confidencialidad`
--
ALTER TABLE `confidencialidad`
  MODIFY `idconfidencialidad` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `contactoinicial`
--
ALTER TABLE `contactoinicial`
  MODIFY `idcontactoinicial` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `controles`
--
ALTER TABLE `controles`
  MODIFY `idcontrol` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `disponibilidad`
--
ALTER TABLE `disponibilidad`
  MODIFY `idisponibilidad` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `empresas`
--
ALTER TABLE `empresas`
  MODIFY `idempresa` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `estatus`
--
ALTER TABLE `estatus`
  MODIFY `idestatus` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `evaluar_controles`
--
ALTER TABLE `evaluar_controles`
  MODIFY `idevaluarcontroles` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `file`
--
ALTER TABLE `file`
  MODIFY `idfile` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `impacto`
--
ALTER TABLE `impacto`
  MODIFY `idimpacto` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `integridad`
--
ALTER TABLE `integridad`
  MODIFY `idintegridad` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `modulos`
--
ALTER TABLE `modulos`
  MODIFY `idmodulos` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `nivel_riesgo`
--
ALTER TABLE `nivel_riesgo`
  MODIFY `idnivelriesgo` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `permision`
--
ALTER TABLE `permision`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `permisos_modulos`
--
ALTER TABLE `permisos_modulos`
  MODIFY `idpermisos` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `probabilidad`
--
ALTER TABLE `probabilidad`
  MODIFY `idprobabilidad` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `recomendaciones`
--
ALTER TABLE `recomendaciones`
  MODIFY `idrecomendaciones` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tareas`
--
ALTER TABLE `tareas`
  MODIFY `idtarea` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tipoactivos`
--
ALTER TABLE `tipoactivos`
  MODIFY `idtipoactivo` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tipoamenazas`
--
ALTER TABLE `tipoamenazas`
  MODIFY `idtipoamenazas` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tipousuarios`
--
ALTER TABLE `tipousuarios`
  MODIFY `idtipousuario` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `idusuario` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `activos`
--
ALTER TABLE `activos`
  ADD CONSTRAINT `activos_ibfk_2` FOREIGN KEY (`idtipoactivo`) REFERENCES `tipoactivos` (`idtipoactivo`),
  ADD CONSTRAINT `activos_ibfk_3` FOREIGN KEY (`idestatus`) REFERENCES `estatus` (`idestatus`),
  ADD CONSTRAINT `activos_ibfk_4` FOREIGN KEY (`idconfidencialidad`) REFERENCES `confidencialidad` (`idconfidencialidad`),
  ADD CONSTRAINT `activos_ibfk_5` FOREIGN KEY (`idintegridad`) REFERENCES `integridad` (`idintegridad`),
  ADD CONSTRAINT `activos_ibfk_6` FOREIGN KEY (`idisponibilidad`) REFERENCES `disponibilidad` (`idisponibilidad`),
  ADD CONSTRAINT `activos_ibfk_7` FOREIGN KEY (`idauditoria`) REFERENCES `auditoria` (`idauditoria`),
  ADD CONSTRAINT `activos_ibfk_8` FOREIGN KEY (`idempresa`) REFERENCES `empresas` (`idempresa`);

--
-- Constraints for table `amenazas`
--
ALTER TABLE `amenazas`
  ADD CONSTRAINT `amenazas_ibfk_2` FOREIGN KEY (`idtipoamenazas`) REFERENCES `tipoamenazas` (`idtipoamenazas`);

--
-- Constraints for table `auditoria`
--
ALTER TABLE `auditoria`
  ADD CONSTRAINT `auditoria_ibfk_1` FOREIGN KEY (`idusuario`) REFERENCES `usuarios` (`idusuario`),
  ADD CONSTRAINT `auditoria_ibfk_3` FOREIGN KEY (`idestatus`) REFERENCES `estatus` (`idestatus`),
  ADD CONSTRAINT `auditoria_ibfk_4` FOREIGN KEY (`idempresa`) REFERENCES `empresas` (`idempresa`);

--
-- Constraints for table `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `comment_ibfk_1` FOREIGN KEY (`file_id`) REFERENCES `file` (`idfile`),
  ADD CONSTRAINT `comment_ibfk_2` FOREIGN KEY (`comment_id`) REFERENCES `comment` (`id`),
  ADD CONSTRAINT `comment_ibfk_3` FOREIGN KEY (`user_id`) REFERENCES `usuarios` (`idusuario`);

--
-- Constraints for table `contactoinicial`
--
ALTER TABLE `contactoinicial`
  ADD CONSTRAINT `contactoinicial_ibfk_2` FOREIGN KEY (`idusuario`) REFERENCES `usuarios` (`idusuario`),
  ADD CONSTRAINT `contactoinicial_ibfk_3` FOREIGN KEY (`idempresa`) REFERENCES `empresas` (`idempresa`);

--
-- Constraints for table `evaluar_controles`
--
ALTER TABLE `evaluar_controles`
  ADD CONSTRAINT `evaluar_controles_ibfk_1` FOREIGN KEY (`idcontrol`) REFERENCES `controles` (`idcontrol`),
  ADD CONSTRAINT `evaluar_controles_ibfk_2` FOREIGN KEY (`idnivelriesgo`) REFERENCES `nivel_riesgo` (`idnivelriesgo`);

--
-- Constraints for table `file`
--
ALTER TABLE `file`
  ADD CONSTRAINT `file_ibfk_1` FOREIGN KEY (`folder_id`) REFERENCES `file` (`idfile`),
  ADD CONSTRAINT `file_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `usuarios` (`idusuario`),
  ADD CONSTRAINT `file_ibfk_3` FOREIGN KEY (`idempresa`) REFERENCES `empresas` (`idempresa`),
  ADD CONSTRAINT `file_ibfk_4` FOREIGN KEY (`idauditoria`) REFERENCES `auditoria` (`idauditoria`);

--
-- Constraints for table `nivel_riesgo`
--
ALTER TABLE `nivel_riesgo`
  ADD CONSTRAINT `nivel_riesgo_ibfk_1` FOREIGN KEY (`idimpacto`) REFERENCES `impacto` (`idimpacto`),
  ADD CONSTRAINT `nivel_riesgo_ibfk_2` FOREIGN KEY (`idprobabilidad`) REFERENCES `probabilidad` (`idprobabilidad`),
  ADD CONSTRAINT `nivel_riesgo_ibfk_3` FOREIGN KEY (`idactivo`) REFERENCES `activos` (`idactivo`),
  ADD CONSTRAINT `nivel_riesgo_ibfk_4` FOREIGN KEY (`idamenaza`) REFERENCES `amenazas` (`idamenaza`),
  ADD CONSTRAINT `nivel_riesgo_ibfk_5` FOREIGN KEY (`idauditoria`) REFERENCES `auditoria` (`idauditoria`);

--
-- Constraints for table `permision`
--
ALTER TABLE `permision`
  ADD CONSTRAINT `permision_ibfk_1` FOREIGN KEY (`file_id`) REFERENCES `file` (`idfile`),
  ADD CONSTRAINT `permision_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `usuarios` (`idusuario`);

--
-- Constraints for table `permisos_modulos`
--
ALTER TABLE `permisos_modulos`
  ADD CONSTRAINT `permisos_modulos_ibfk_1` FOREIGN KEY (`idmodulos`) REFERENCES `modulos` (`idmodulos`),
  ADD CONSTRAINT `permisos_modulos_ibfk_2` FOREIGN KEY (`idusuario`) REFERENCES `usuarios` (`idusuario`);

--
-- Constraints for table `recomendaciones`
--
ALTER TABLE `recomendaciones`
  ADD CONSTRAINT `recomendaciones_ibfk_1` FOREIGN KEY (`idempresa`) REFERENCES `empresas` (`idempresa`),
  ADD CONSTRAINT `recomendaciones_ibfk_2` FOREIGN KEY (`idauditoria`) REFERENCES `auditoria` (`idauditoria`);

--
-- Constraints for table `tareas`
--
ALTER TABLE `tareas`
  ADD CONSTRAINT `tareas_ibfk_2` FOREIGN KEY (`idusuario`) REFERENCES `usuarios` (`idusuario`),
  ADD CONSTRAINT `tareas_ibfk_3` FOREIGN KEY (`idestatus`) REFERENCES `estatus` (`idestatus`);

--
-- Constraints for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`idtipousuario`) REFERENCES `tipousuarios` (`idtipousuario`),
  ADD CONSTRAINT `usuarios_ibfk_2` FOREIGN KEY (`idestatus`) REFERENCES `estatus` (`idestatus`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
