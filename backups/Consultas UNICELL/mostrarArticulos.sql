-- mostrando Articulos
SELECT A.modelo AS MODELO, C.nombreCategoria AS CATEGORIA, M.nombreMarca AS MARCA, CO.nombreColor AS COLOR, A.stock AS STOCK, A.precio AS PRECIO, A.descripcion AS DESCRIPCION  
FROM articulo A
INNER JOIN categoria C ON C.idCategoria=A.idCategoria
INNER JOIN marca M ON M.idMarca=A.idMarca
INNER JOIN color CO ON CO.idColor=A.idColor
ORDER BY 2 ASC;


-- mostrando usuarios
CREATE VIEW vwusuarios AS
SELECT CONCAT(P.nombres,' ',P.apellidoPaterno,' ',IFNULL(P.apellidoMaterno,' ')) AS 'nombrecompleto', P.email AS email, R.nombreRol AS rol,U.nombreUsuario AS 'nombreusuario', U.contrasena AS contrasena, U.imagenUsuario AS avatar, u.estado as estado
FROM persona P
INNER JOIN usuario U ON U.idUsuario=P.idPersona
INNER JOIN rol R ON R.idRol=U.idRol
ORDER BY 2;

-- mostradno proveedores
SELECT P.nombres AS NOMBRES, P.apellidoPaterno AS 'Apellido Paterno', IFNULL(P.apellidoMaterno,'NULO') AS 'Apellido Materno', P.email AS EMAIL, PR.representanteLegal AS 'Representante Legal'
FROM persona P
INNER JOIN proveedor PR ON PR.idProveedor=P.idPersona
ORDER BY 2;


-- mostrando clientes
SELECT CONCAT(P.nombres, ' ', P.apellidoPaterno, ' ', IFNULL(P.apellidoMaterno,'NULO')) AS 'Nombre completo', P.email AS EMAIL
FROM persona P
INNER JOIN cliente CL ON CL.idCliente=P.idPersona
ORDER BY 2;


 -- mostrando imagen
 SELECT A.modelo AS MODELO, I.nombreImagen AS DESCRIPCION, I.rutaImagen AS IMAGEN
 FROM imagen I 
 INNER JOIN articulo A ON A.idArticulo=I.idArticulo
 ORDER BY 1;
 -- mostrando categorias
 SELECT idCategoria AS ID, nombreCategoria AS CATEGORIA
 FROM categoria
 ORDER BY 2 ASC ;
 
 -- mostrando servicios
 SELECT S.nombreServicio AS NOMBRE, S.descripcion AS DESCRIPCION, C.nombreCategoria AS CATEGORIA 
FROM servicio S
INNER JOIN categoria C ON C.idCategoria=S.idCategoria
ORDER BY NOMBRE, DESCRIPCION, CATEGORIA;
 
 
 -- seleccionar datos de cliente con sus respectivos atributos de PERSONA
SELECT p.*, cl.*
FROM persona p
INNER JOIN cliente cl ON cl.idCliente=p.idPersona
WHERE p.idPersona=4;

-- Mostrar usuarios

SELECT P.*, U.*
FROM persona P
INNER JOIN usuario U ON U.idUsuario=P.idPersona
ORDER BY 1;

-- Vista listar articulos vendidos
CREATE VIEW vwConsultaVenta AS
SELECT A.idAccesorio, MO.nombreModelo, CL.idCliente, CONCAT(P.apellidoPaterno,' ',IFNULL(P.apellidoMaterno, ' '),P.nombres) AS nombrecompleto, P.nroCelular, P.telefonoReferencia, CL.numDocumento
FROM cliente CL
INNER JOIN persona P ON P.idPersona=CL.idCliente
INNER JOIN venta V ON V.idCliente=CL.idCliente 
INNER JOIN detalleventa DV ON DV.idVenta=V.idVenta
INNER JOIN accesorio A ON A.idAccesorio=DV.idAccesorio
INNER JOIN modelo MO ON MO.idModelo=A.idModelo
WHERE A.idCategoria = 6;

-- consulta estado avance orden de servicio
SELECT CONCAT(P.apellidoPaterno, ' ', P.apellidoMaterno, ' ', P.nombres), O.nroOrdenServicio, EO.nombreEstado, EO.valorEstado
FROM persona P
INNER JOIN cliente CL ON CL.idCliente=P.idPersona
INNER JOIN ordenservicio O ON O.idCliente=CL.idCliente
INNER JOIN estadoordenservicio EO ON EO.idEstadoOrdenServicio=O.idEstadoOrdenServicio;

-- seleccionar años para ventas
SELECT YEAR(fechaUpdate) year
FROM venta
GROUP BY year
ORDER BY year ;

-- consulta para recuperar montos por meses-ventas por año
SELECT MONTH(fechaUpdate) as MES, SUM(total) as MONTO
FROM venta 
WHERE fechaUpdate BETWEEN '2017-01-01' AND '2018-12-31'
GROUP BY MES;

-- para clientes con mas ventas-total
SELECT idCliente,SUM(total) 
FROM venta 
GROUP BY idCliente DESC;

-- articulo mas vendido
SELECT A.modelo, SUM(DV.cantidad) AS mayor,C.nombreCategoria
FROM detalleventa DV
LEFT JOIN venta V ON V.idVenta=DV.idVenta
LEFT JOIN articulo A ON A.idArticulo=DV.idArticulo
LEFT JOIN categoria C ON C.idCategoria=A.idCategoria
GROUP BY DV.idArticulo
ORDER BY mayor DESC
LIMIT 1;

-- cliente con mas compras  
SELECT COUNT(V.idVenta) AS cantidad, V.idCliente, CONCAT(P.apellidoPaterno,' ',IFNULL(P.apellidoMaterno, ' '),P.nombres) AS nombrecompleto
FROM venta V
LEFT JOIN cliente CL ON CL.idCliente=V.idCliente
LEFT JOIN persona P ON P.idPersona=CL.idCliente
GROUP BY V.idCliente 
ORDER BY cantidad DESC
LIMIT 1;

-- cliente con mas dinero que gasto en compras
CREATE VIEW vwclienteventas AS
SELECT V.idCliente, SUM(DV.importe) AS total, CONCAT(P.apellidoPaterno, ' ', P.apellidoMaterno,' ', P.nombres) AS nombrecompleto, DATE_FORMAT(V.fechaUpdate,'%d - %b - %Y') AS formatted_date, V.fechaUpdate AS fechaUpdate
FROM detalleventa DV
LEFT JOIN venta V ON V.idVenta=DV.idVenta
LEFT JOIN cliente CL ON CL.idCliente=V.idCliente
LEFT JOIN persona P ON P.idPersona=CL.idCliente
WHERE DV.fechaUpdate BETWEEN '2018-01-01' AND '2018-12-31'
GROUP BY V.idCliente
ORDER BY total DESC
LIMIT 1; 

 -- limpiar tablas 
SET FOREIGN_KEY_CHECKS=0;
TRUNCATE TABLE accesorio;
SET FOREIGN_KEY_CHECKS=1;

-- actualizar total de modelo una vez insertado stock de accesorios
UPDATE modelo SET total =
(SELECT SUM(stock)
		FROM accesorio
		WHERE idModelo=2)
        WHERE idModelo=2;
        
-- recuperar accesorio mas precio-stock(segun Modelo)
SELECT AC.idAccesorio,MO.idModelo, AC.idColor as idColor, CONCAT(MO.nombreModelo,' ', MO.calidad,' ', CO.nombreColor,' ',CA.nombreCategoria) AS label, AC.precio, AC.stock
FROM modelo MO
LEFT JOIN accesorio AC ON AC.idModelo=MO.idModelo
INNER JOIN color CO ON CO.idColor=AC.idColor
INNER JOIN categoria CA ON CA.idCategoria=MO.idCategoria
INNER JOIN marca M ON M.idMarca=MO.idMarca
ORDER BY AC.idAccesorio,MO.idModelo;

-- recuperar accesorio
SELECT AC.idModelo, MO.nombreModelo, CO.codigoHexadecimal, AC.precio, AC.stock, C.nombreCategoria, M.nombreMarca
FROM accesorio AC
INNER JOIN modelo MO ON MO.idModelo=AC.idModelo
INNER JOIN color CO ON CO.idColor=AC.idColor
INNER JOIN marca M ON M.idMarca=MO.idMarca
INNER JOIN categoria C ON C.idCategoria=MO.idCategoria;

-- Datos para prueba de transacciones
SELECT * FROM detalleventa;
SELECT * FROM venta; 
SELECT * FROM accesorio;
SELECT * FROM comprobante;

-- estructura de transaccion 
START TRANSACTION;
INSERT INTO venta (idVenta,total, idComprobante, idCliente, numDocumento, serie) VALUES (13,250, 2, 59, '000012',1);
INSERT INTO detalleventa (idAccesorio, idVenta, precio, cantidad,importe) VALUES (8, 13, 250, 1 , '500' ); 
UPDATE comprobante SET cantidad=(cantidad+1) WHERE idComprobante = 2;
UPDATE accesorio SET stock = (stock-1) WHERE idAccesorio=8;
COMMIT; 