  -- Me posiciono en la base de datos
USE DB206DWESLoginLogOffTema5;

-- Inserto los datos iniciales en la tabla Departamento
INSERT INTO T02_Departamento (T02_CodDepartamento, T02_DescDepartamento, T02_FechaCreacionDepartamento, T02_VolumenDeNegocio, T02_FechaBajaDepartamento) VALUES
('AAA', 'Departamento de Ventas', NOW(), 100000.50, NULL),
('AAB', 'Departamento de Marketing', NOW(), 50089.50, NULL),
('AAC', 'Departamento de Finanzas', NOW(), 600.50, '2023-11-13 13:06:00');

-- Inserto los datos iniciales en la tabla T01_Usuario con contraseñas cifradas en SHA-256
-- Insetar campos en la tabla usuarios

INSERT INTO T01_Usuario (
    T01_CodUsuario,
    T01_Password,
    T01_DescUsuario,
    T01_Perfil
) VALUES 
    ('admin', SHA2('adminpaso', 256), 'administrador', 'administrador'),
    ('alvaro', SHA2('alvaropaso', 256), 'Alvaro Cordero Miñambres', 'usuario'),
    ('carlos', SHA2('carlospaso', 256), 'Carlos Garcia Cachon', 'usuario'),
    ('oscar', SHA2('oscarpaso', 256), 'Oscar Pascual Ferrero', 'usuario'),
    ('borja', SHA2('borjapaso', 256), 'Borja Nuñez Refoyo', 'usuario'),
    ('rebeca', SHA2('rebecapaso', 256), 'Rebeca Sanchez Perez', 'usuario'),
    ('erika', SHA2('erikapaso', 256), 'Erika', 'usuario'),
    ('ismael', SHA2('ismaelpaso', 256), 'Ismael Ferreras Garcia', 'usuario'),
    ('heraclio', SHA2('heracliopaso', 256), 'Heraclio Borbujo Moran', 'administrador'),
    ('amor', SHA2('amorpaso', 256), 'Amor Rodriguez Navarro', 'administrador'),
    ('antonio', SHA2('antoniopaso', 256), 'Antonio Jañez Velada', 'administrador'),
    ('alberto', SHA2('antoniopaso', 256), 'Alberto Bahillo Fernandez', 'administrador');

-- Insertar fila 1
INSERT INTO T08_Pregunta (T08_CodPregunta, T08_DescPregunta, T08_FechaAlta, T08_Respuesta, T08_AutorRespuesta, T08_Valor)
VALUES 
('001', '¿Cuál es la capital de Francia?', '2024-02-12 10:00:00', 'París', 'Admin1', 10),
('002', '¿Quién escribió la Odisea?', '2024-02-12 10:05:00', 'Homero', 'Admin2', 8),
('003', '¿En qué año comenzó la Primera Guerra Mundial?', '2024-02-12 10:10:00', '1914', 'Admin3', 9),
('004', '¿Cuál es el símbolo químico del oro?', '2024-02-12 10:15:00', 'Au', 'Admin4', 7),
('005', '¿Qué año se firmó la Declaración de Independencia de los Estados Unidos?', '2024-02-12 10:20:00', '1776', 'Admin5', 9);

