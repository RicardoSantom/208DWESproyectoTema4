use dbs9174079;
create table T02_Departamento(T02_CodDepartamento char(3) primary key,
T02_DescDepartamento varchar(255) not null, usuT02_FechaCreacionDepartamento int not null,
T02_VolumenNegocio float not null,T02_FechaBajaDepartamento int null)
engine=Innodb;