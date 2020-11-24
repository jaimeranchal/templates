/* drop database if exists biblioteca; */
drop table if exists libros;
drop table if exists usuarios;

/* Usuarios */
create table usuarios (
    id int auto_increment not null,
    nombre varchar(10) not null,
    pass varchar(10) not null,
    constraint PK_usuario primary key (id)
);

create table libros (
    id int auto_increment not null,
    id_usuario int not null,
    titulo varchar(255) not null,
    autor varchar(50) not null,
    fecha year,
    genero varchar(20),
    idioma varchar(15) not null,
    prestado boolean,
    formato varchar(10),
    constraint PK_biblioteca primary key (id),
    constraint FK_usu foreign key (id_usuario) references usuarios(id)
);

/* Valores de prueba */
insert into usuarios values(null, 'jaime', '1234');

insert into libros values(
    null,
    1,
    'El principito',
    'Jean Valery',
    '1944',
    'novela',
    'francés',
    false,
    'pdf'
);
insert into libros values(
    null,
    1,
    'El Señor de los Anillos',
    'J.R.R. Tolkien',
    '1951',
    'novela',
    'inglés',
    false,
    'tapa dura'
);
insert into libros values(
    null,
    1,
    'La guerra de los mundos',
    'Orson Wells',
    '1920',
    'ensayo',
    'inglés',
    false,
    'epub'
);
