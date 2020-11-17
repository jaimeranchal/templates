ALTER DATABASE test CHARACTER SET utf8 COLLATE utf8_general_ci;

DROP TABLE IF EXISTS usuarios;

CREATE TABLE usuarios (
    id int AUTO_INCREMENT,
    nombre varchar(8) NOT NULL,
    apellidos varchar(100) NOT NULL,
    alias varchar(100) NOT NULL,
    nacimiento date NOT NULL,
    pass varchar(8) NOT NULL,
    rol char(1) NOT NULL,
    activo char(1) NOT NULL,
    CONSTRAINT PK_usuarios PRIMARY KEY (id)
);

INSERT into usuarios VALUES (NULL, 'Jaime', 'Ranchal Beato', 'jranch', '1984-06-27', '1234', 'u', 'y');
INSERT into usuarios VALUES (NULL, 'Álvaro', 'Pérez Galba', 'apergal', '1962-12-03', '1234', 'a', 'y');
INSERT into usuarios VALUES (NULL, 'María', 'Aldo Molina', 'malmol', '2000-03-15', '1234', 'a', 'y');
INSERT into usuarios VALUES (NULL, 'Sara', 'Cuadrado Gómez', 'scuagom', '1994-09-01', '1234', 'u', 'n');

