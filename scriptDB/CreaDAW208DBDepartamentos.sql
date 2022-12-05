create database if not exists DAW208DBDepartamentos;
use DAW208DBDepartamentos;
create table T02_Departamento(T02_CodDepartamento char(3) primary key,
T02_DescDepartamento varchar(255) not null, T02_FechaCreacionDepartamento int not null,
T02_VolumenNegocio float not null,T02_FechaBajaDepartamento int null)
engine=Innodb;
create user if not exists 'usuarioDAW208DBDepartamentos'@'%' identified by 'paso';
grant all privileges on DAW208DBDepartamentos.* to 'usuarioDAW208DBDepartamentos'@'%';
FLUSH PRIVILEGES;