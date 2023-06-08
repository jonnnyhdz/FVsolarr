use  ulsolar;

CREATE TABLE usuarios (
    id INT NOT NULL AUTO_INCREMENT,
    nombre VARCHAR(50) NOT NULL,
    apellidos VARCHAR(50) NOT NULL,
    nombre_empresa VARCHAR(50) NOT NULL,
    correo VARCHAR(100) NOT NULL,
    contrasena VARCHAR(100) NOT NULL,
    numero_telefono VARCHAR(20) NOT NULL,
    estado VARCHAR(50) NOT NULL,
    persona VARCHAR(50) NOT NULL,
	imagen VARCHAR(100),
    PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


CREATE TABLE ModulosFV (
    ID_MFV INT NOT NULL AUTO_INCREMENT,
    Marca varchar (200) ,	
	Modelo varchar (200) ,
	Watts INT ,
	modulo_fotovoltaico DECIMAL(10,3) , 	
	Potencia_panel	DECIMAL(10,3) ,
	Vmpp DECIMAL(10,3),	
	Impp  DECIMAL(10,3) ,
	Circuit_Voltage_Voc DECIMAL(10,3) , 	
	Short_Circuit DECIMAL(10,3) ,	
	Module_Efficiency DECIMAL(10,3) , 	
	Temperature_Coefficient_Voc DECIMAL(10,3) SIGNED,	
	Temperature_Coefficient_Pmax DECIMAL(10,3) SIGNED,
	NMOT DECIMAL(10,3),
	Largo_módulo DECIMAL(10,3) ,
	Ancho_módulo DECIMAL(10,3) ,
	Area_módulo	DECIMAL(10,4) ,
    PRIMARY KEY (ID_MFV)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


INSERT INTO ModulosFV 
( ID_MFV , Marca, Modelo, Watts ,modulo_fotovoltaico , Potencia_panel , Vmpp ,  Impp , Circuit_Voltage_Voc , Short_Circuit ,Module_Efficiency, Temperature_Coefficient_Voc ,Temperature_Coefficient_Pmax,
 NMOT, Largo_módulo , Ancho_módulo , Area_módulo )
VALUES 
(1 ,"Canadian Solar","CS6W-530MS",530,0,530,40.90,12.96,48.80,13.80,20.70,-0.26,-0.34,41,2.26,1.13,2.61),
(2 ,"Canadian Solar","CS6W-535MS",535,0,535,41.10,13.02,49.00,0.14,20.90,-0.26,-0.34,41,2.26,1.13,2.61),
(3 ,"Canadian Solar","CS6W-540MS",540,0,540,41.10,13.02,49.00,13.85,20.90,-0.26,-0.34,41,2.261,13,2.61),
(4 ,"Canadian Solar","CS6W-545MS",545,0,545,41.50,13.14,49.40,13.95,21.30,-0.26,-0.34,41,2.26,1.13,2.61),
(5 ,"Canadian Solar","CS6W-550MS",550,0,550,41.70,13.20,49.60,14.00,21.50,-0.26,-0.34,41,2.26,1.13,2.61),
(6 ,"Canadian Solar","CS6W-555MS",555,0,555,41.70,13.20,49.60,14.00,21.50,-0.26,-0.34,41,2.26,1.13,2.61),
(7 ,"Canadian Solar","CS6W-580MS",580,0,580,34.10,17.02,40.50,18.27,20.50,-0.26,-0.34,41,2.17,1.30,2.87),
(8 ,"Canadian Solar",""          ,585,0,585,34.30,17.06,40.70,18.32,20.70,-0.26,-0.34,41,2.17,1.30,2.87),
(9 ,"Canadian Solar",""          ,585,0,585,34.30,17.06,40.70,18.32,20.70,-0.26,-0.34,41,2.17,1.30,2.87),
(10,"Canadian Solar",""          ,590,0,590,34.50,17.11,40.90,18.37,20.80,-0.26,-0.34,41,2.17,1.30,2.87),
(11,"Canadian Solar",""          ,595,0,595,34.70,17.15,41.10,18.42,21.00,-0.26,-0.34,41,2.17,1.30,2.87),
(12,"Canadian Solar",""          ,600,0,600,34.90,17.20,41.30,18.47,21.20,-0.26,-0.34,41,2.17,1.30,2.87),
(13,"Canadian Solar",""          ,605,0,605,35.10,17.25,41.50,18.52,21.40,-0.26,-0.34,41,2.17,1.30,2.87),
(14,"Canadian Solar",""          ,610,0,610,0    ,17.29,41.70,18.57,21.60,-0.26,-0.34,41,2.17,1.30,2.87),
(15,"LONGI","LRS-72HPH-540M"     ,540,0,540,41.65,12.97,49.50,13.85,21.10,-0.27,-0.34,44,2.256,1.113,2.56),
(16,"LONGI","LRS-72HPH-545M"     ,545,0,545,41.80,13.04,49.65,13.90,21.30,-0.27,-0.34,45,2.256,1.113,2.56),
(17,"LONGI","LRS-72HPH-550M"     ,550,0,550,41.95,13.12,49.80,13.98,21.50,-0.27,-0.34,45,2.256,1.113,2.56),
(18,"LONGI","LRS-72HPH-555M"     ,555,0,555,42.10,13.19,49.95,14.04,21.50,-0.27,-0.34,46,2.256,1.113,2.56),
(19,"TRINA SOLAR","VERTEX 555 watts",555,0,555,37.20,14.92,44.80,15.91,20.50,-0.25,-0.34,43,2.384,1.134,2.75),
(20,"TRINA SOLAR","VERTEX 560 watts",560,0,560,37.40,14.96,45.00,15.95,20.70,-0.25,-0.34,44,2.384,1.134,2.75),
(21,"TRINA SOLAR","VERTEX 565 watts",565,0,565,37.70,14.99,45.20,16.00,20.90,-0.25,-0.34,45,2.384,1.134,2.75),
(22,"TRINA SOLAR","VERTEX 570 watts",570,0,570,37.90,15.03,45.50,16.05,21.30,-0.25,-0.34,46,2.384,1.134,2.75),
(23,"TRINA SOLAR","VERTEX 575 watts",575,0,575,38.20,15.07,45.70,16.08,21.30,-0.25,-0.34,47,2.384,1.134,2.75),
(24,"TRINA SOLAR","VERTEX 580 watts",580,0,580,38.40,15.10,46.00,16.11,21.50,-0.25,-0.34,48,2.384,1.134,2.75)
;


CREATE TABLE inversores (
    id_inversor INT NOT NULL AUTO_INCREMENT,
    Marca VARCHAR(255),
    Modelo VARCHAR(255),
    Max_potencia_FV_recomendada INT,
    Voltaje_max_DC INT,
    Voltaje_arranque INT,
    Voltaje_nominal INT,
    Rango_voltaje_MPPT  VARCHAR(255),
    Voltaje_min_MPPT INT,
    Voltaje_max_MPPT INT,
    No_rastreadores_MPPT INT,
    No_strings_rastreador_MPPT INT,
    Max_corriente_entrada_rastreador_MPPT DECIMAL(10,2),
    Max_corriente_cortocircuito_rastreador_MPPT DECIMAL(10,2),
    Poder_nominal_AC INT,
    Max_poder_aparente_AC INT,
    Rango_voltaje_nominal_AC INT,
    Voltaje_operacion_seleccionado INT,
    Frecuencia_AC INT,
    Corriente_nominal_salida_CA DECIMAL(10,2),
    Max_corriente_salida DECIMAL(10,2),
    Max_eficiencia DECIMAL(10,2),
    PRIMARY KEY (id_inversor)
);

INSERT INTO inversores (id_inversor, Marca, Modelo, Max_potencia_FV_recomendada, Voltaje_max_DC, Voltaje_arranque, Voltaje_nominal, Rango_voltaje_MPPT, Voltaje_min_MPPT, Voltaje_max_MPPT, No_rastreadores_MPPT, No_strings_rastreador_MPPT, Max_corriente_entrada_rastreador_MPPT, Max_corriente_cortocircuito_rastreador_MPPT, Poder_nominal_AC, Max_poder_aparente_AC, Rango_voltaje_nominal_AC, Voltaje_operacion_seleccionado, Frecuencia_AC, Corriente_nominal_salida_CA, Max_corriente_salida, Max_eficiencia)
VALUES 
(1,'GROWATT', 'MAC 10KTL3-XL', 15000, 1100, 250, 360, '200-850', 200, 850, 4, 2, 26.00, 32.00, 10000, 11100, 220, 220, 60, 0, 29.20,98.00),
(2,'GROWATT', 'MAC 15KTL3-XL', 22500, 1100, 250, 360, '200-1000', 200, 850, 3, 3, 52.00, 55.00, 15000, 16600, 220, 220, 60, 39.40, 43.60, 98.00),
(3,'GROWATT', 'MAC 12KTL3-XL', 18000, 1100, 250, 360, '200-850', 200, 850, 4, 2, 26.00, 32.00, 12000, 13300, 220, 220, 60, 0, 34.90,98.00),
(4,'GROWATT', 'MAC 20KTL3-XL', 30000, 1100, 250, 360, '200-1000', 200,  850, 3, 3, 52.00, 55.00, 20000, 22200, 220, 220, 60, 52.50, 58.30, 98.00) ;



CREATE TABLE Proyectos (
    ID_PROYECTO INT NOT NULL AUTO_INCREMENT,
    ID_USUARIO INT,
    NOMBRE_PROYECTO VARCHAR(255),
    TEMP_MIN INT ,
    TEMP_MAX INT ,
    HSP INT ,
    Ubicacion varchar(200),
    ID_MFV  INT ,
    VMPMIN  DECIMAL(10,2),
    Energiarequerida  DECIMAL(10,2),
    PotenciopicoFV  DECIMAL(10,2),
    NumerosdeModulos  DECIMAL(10,2),
    Areatotal  DECIMAL(10,2),
    VOCMAX  DECIMAL(10,2),
    CmodulosVolt INT ,
    CcadenasVolt INT,
    areadisponible DECIMAL(10,2),
    opcionSeleccionada VARCHAR(10),
    PRIMARY KEY (ID_PROYECTO)
);


ALTER TABLE Proyectos
ADD FOREIGN KEY (ID_USUARIO) REFERENCES usuarios(id);


ALTER TABLE Proyectos
ADD FOREIGN KEY (ID_MFV) REFERENCES ModulosFV(ID_MFV);



CREATE TABLE ESCOGIDO_MFV (
    ID_ESCOGIDO INT NOT NULL AUTO_INCREMENT,
    ID_PROYECTO INT,
    ID_INVERSORES INT,
    cantidad INT,
    ID_Usuario INT
    PRIMARY KEY (ID_ESCOGIDO)
);


ALTER TABLE ESCOGIDO_MFV
ADD FOREIGN KEY (ID_PROYECTO) REFERENCES Proyectos(ID_PROYECTO),
ADD FOREIGN KEY (ID_INVERSORES) REFERENCES inversores (id_inversor);
ADD FOREIGN KEY (ID_Usuario) REFERENCES usuarios(id);



/*meses */
CREATE TABLE facturas (
  id INT(11) NOT NULL AUTO_INCREMENT,
  Id_proyecto int,
  no_servicio VARCHAR(255) NOT NULL,
  fecha_facturacion DATE NOT NULL,
  mes DATE NOT NULL,
  mes2 DATE NOT NULL,
  kwh FLOAT NOT NULL,
  kw FLOAT NOT NULL,
  fp FLOAT NOT NULL,
  PRIMARY KEY (id)
);


ALTER TABLE facturas
ADD FOREIGN KEY (Id_proyecto) REFERENCES proyectos (ID_PROYECTO);

CREATE TABLE Tabla1 (
    id_cables INT NOT NULL AUTO_INCREMENT,
    tepmin VARCHAR(10),
    AWG VARCHAR(10),
    medida DECIMAL(5, 2),
    tepmax DECIMAL(5, 2),
    PRIMARY KEY (id_cables)
);


INSERT INTO Tabla1 (id_cables, tepmin, AWG, medida, tepmax)
VALUES
    (1, '-', '18', '0.82', '14.00'),
    (2, '-', '16', '1.31', '18.00'),
    (3, '20 y 24', '14', '2.08', '25.00'),
    (4, '21 y 25', '12', '3.31', '30.00'),
    (5, '20 y 35', '10', '5.26', '40.00'),
    (6, '36 y 50', '8', '8.37', '55.00'),
    (7, '51 y 65', '6', '13.30', '75.00'),
    (8, '66 y 85', '4', '21.20', '95.00'),
    (9, '86 y 100', '3', '26.70', '115.00'),
    (10, '101 y 115', '2', '33.60', '130.00'),
    (11, '116 y 130', '1', '42.40', '145.00'),
    (12, '131 y 150', '1/0', '53.49', '170.00'),
    (13, '151 y 175', '2/0', '67.43', '195.00'),
    (14, '176 y 200', '3/0', '85.01', '225.00'),
    (15, '201 y 230', '4/0', '107.20', '260.00'),
    (16, '231 y 255', '250', '127.00', '290.00'),
    (17, '256 y 285', '300', '152.00', '320.00'),
    (18, '286 y 310', '350', '177.00', '350.00'),
    (19, '311 y 335', '400', '203.00', '380.00'),
    (20, '336 y 380', '500', '253.00', '430.00'),
    (21, '381 y 420', '600', '304.00', '475.00');

