-- Crear la tabla Persona
use BDLeonel
IF NOT EXISTS (SELECT * FROM sysobjects WHERE name='Persona' and xtype='U')
CREATE TABLE Persona (
    ID_Persona INT PRIMARY KEY,
    Nombre VARCHAR(50),
    Apellido VARCHAR(50),
    Rol VARCHAR(50)
);

-- Crear la tabla CuentaBancaria
IF NOT EXISTS (SELECT * FROM sysobjects WHERE name='CuentaBancaria' and xtype='U')
CREATE TABLE CuentaBancaria (
    ID_Cuenta INT PRIMARY KEY,
    ID_Persona INT,
    NumeroCuenta VARCHAR(20),
    Saldo DECIMAL(18, 2),
    Tipo_Cuenta VARCHAR(20),
    Departamento VARCHAR(50),
    FOREIGN KEY (ID_Persona) REFERENCES Persona(ID_Persona)
);

-- Crear la tabla Transaccion
IF NOT EXISTS (SELECT * FROM sysobjects WHERE name='Transaccion' and xtype='U')
CREATE TABLE Transaccion (
    ID_Transaccion INT PRIMARY KEY,
    ID_Cuenta INT,
    Tipo VARCHAR(50),
    Monto DECIMAL(18, 2),
    Fecha DATETIME2,
    FOREIGN KEY (ID_Cuenta) REFERENCES CuentaBancaria(ID_Cuenta)
);

-- Insertar datos en la tabla Persona
INSERT INTO Persona (ID_Persona, Nombre, Apellido, Rol)
VALUES 
    (1, 'Juanito', 'Perez', 'administrador'),
    (2, 'Moreno', 'Blanco', 'normal'),
    (3, 'Pickachu', 'Lopez', 'normal'),
    (4, 'Anita', 'Huerfanita', 'normal'),
    (5, 'Goku', 'Mamani', 'administrador'),
    (6, 'Pedro', 'Martinez', 'normal'),
    (7, 'María', 'González', 'normal'),
    (8, 'Luis', 'Hernández', 'administrador'),
    (9, 'Laura', 'Rodríguez', 'normal'),
    (10, 'Carlos', 'López', 'normal');

-- Insertar datos en la tabla CuentaBancaria
INSERT INTO CuentaBancaria (ID_Cuenta, ID_Persona, NumeroCuenta, Saldo, Tipo_Cuenta, Departamento)
VALUES 
    (101, 1, '123456789', 1500.00, 'mixta', 'Banca Personal'),
    (102, 2, '987654321', 2500.00, 'corriente', 'Banca Corporativa'),
    (103, 3, '567890123', 1800.00, 'ahorros', 'Banca Corporativa'),
    (104, 4, '321654987', 3000.00, 'mixta', 'Inversiones'),
    (105, 5, '456789012', 2000.00, 'ahorros', 'Inversiones'),
    (106, 6, '135792468', 3500.00, 'corriente', 'Banca Personal'),
    (107, 7, '246801357', 2200.00, 'ahorros', 'Banca Corporativa'),
    (108, 8, '987654321', 1800.00, 'mixta', 'Banca Corporativa'),
    (109, 9, '654321987', 4000.00, 'ahorros', 'Inversiones'),
    (110, 10, '123098765', 2800.00, 'corriente', 'Inversiones');

-- Insertar datos en la tabla Transaccion
INSERT INTO Transaccion (ID_Transaccion, ID_Cuenta, Tipo, Monto, Fecha)
VALUES 
    (201, 101, 'Depósito', 500.00, '2024-04-20 09:30:00'),
    (202, 102, 'Transferencia', -200.00, '2024-04-20 10:15:00'),
    (203, 103, 'Retiro', -300.00, '2024-04-21 11:00:00'),
    (204, 104, 'Depósito', 800.00, '2024-04-21 13:45:00'),
    (205, 105, 'Transferencia', -1000.00, '2024-04-21 15:20:00'),
    (206, 106, 'Depósito', 1000.00, '2024-05-01 09:30:00'),
    (207, 107, 'Retiro', -300.00, '2024-05-02 10:15:00'),
    (208, 108, 'Transferencia', -400.00, '2024-05-03 11:00:00'),
    (209, 109, 'Depósito', 1200.00, '2024-05-04 13:45:00'),
    (210, 110, 'Transferencia', -800.00, '2024-05-05 15:20:00');
