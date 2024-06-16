USE AlumnoDB;
GO

-- Crear la tabla Alumno
CREATE TABLE Alumno (
    CI INT PRIMARY KEY,
    Nombre VARCHAR(50),
    Apellidos VARCHAR(50),
    Edad INT
);
GO

-- Insertar datos en la tabla Alumno
INSERT INTO Alumno (CI, Nombre, Apellidos, Edad)
VALUES 
    (12345678, 'Juan', 'Pérez', 20),
    (87654321, 'María', 'González', 22),
    (11223344, 'Luis', 'Martínez', 19),
    (44332211, 'Ana', 'López', 21),
    (55667788, 'Carlos', 'Rodríguez', 23);
GO