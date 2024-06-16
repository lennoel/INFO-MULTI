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
    (12345678, 'Juan', 'P�rez', 20),
    (87654321, 'Mar�a', 'Gonz�lez', 22),
    (11223344, 'Luis', 'Mart�nez', 19),
    (44332211, 'Ana', 'L�pez', 21),
    (55667788, 'Carlos', 'Rodr�guez', 23);
GO