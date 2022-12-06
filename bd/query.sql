drop database if EXISTS monitoreoSonora;
Create database if not exists monitoreoSonora;
Use monitoreoSonora;

create table nivelesUsuarios(
    id_nivelUsuario int not null auto_increment primary key,
    nivel varchar(30)
);

insert into nivelesUsuarios(nivel) values ('Root'), ('Admin'), ('user');

create table empresas(
    id_empresa int not null auto_increment primary key,
    razonSocial varchar(60),
    nombreContacto varchar(120),
    telefonoContacto varchar(16),
    activa int default 1,
    correoContacto varchar(60)
);

insert into empresas (razonSocial, nombreContacto) values ('Sistemas', 'Marina Lara');

create table Usuarios(
    id_usuario int not null auto_increment primary key,
    id_nivelUsuario int not null,
    id_empresa int,
    nombre varchar(60),
    apellidoPaterno varchar(60),
    apellidoMaterno varchar(60),
    email varchar(100),
    pass varchar(16),
    pathImgPerfil varchar(100),
    activo int default 1,
    foreign key (id_nivelUsuario) references nivelesUsuarios(id_nivelUsuario),
    foreign key (id_empresa) references empresas (id_empresa)
);

insert into Usuarios (id_nivelUsuario, id_empresa, nombre, apellidoPaterno, apellidoMaterno, email, pass) 
    values (1, 1, 'Marina', 'Lara', 'Meza', 'marina@sistemas.com', '123');

create table colmenas (
    id_colmena int not null auto_increment primary key,
    id_empresa int not null,
    identificadorColmena varchar(60),
    activo int default 1,
    foreign key (id_empresa) references empresas (id_empresa)
);

insert into colmenas (id_empresa, identificadorColmena) values (1, 'colmenaA-1');

create table datosColmenas (
    id_dato int not null auto_increment primary key,
    id_colmena int not null,
    fechaToma date,
    temperaturaIn1 decimal(24,3),
    temperaturaIn2 decimal(24,3),
    temperaturaEx1 decimal(24,3),
    humedadExt decimal(24,3),
    humedadInt decimal(24,3),
    foreign key (id_colmena) references colmenas(id_colmena)
);