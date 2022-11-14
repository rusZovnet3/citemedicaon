CREATE DATABASE `websiteCitasMedicaOnline` DEFAULT CHARACTER SET utf8 COLLATE utf8_spanish_ci;
USE `websiteCitasMedicaOnline`;

create table secretarias(
	id int primary key auto_increment,
	usuario text,
	clave text,
	nombre text,
	apellido text,
	foto text,
	rol text
);

create table consultorios(
	id int primary key auto_increment,
	nombre text
);

create table doctores(
	id int primary key auto_increment,
	id_consultorio int,
	apellido text,
	nombre text,
	foto text,
	usuario text,
	clave text,
	sexo text,
	horarioE time,
	horarioS time,
	rol text,
	foreign key(id_consultorio) references consultorios(id)
);

create table pacientes(
	id int primary key auto_increment,
	apellido text,
	nombre text,
	documento text,
	foto text,
	usuario text,
	clave text,
	rol varchar(8) default "Paciente"
);

create table citas(
	id int primary key auto_increment,
	id_doctor int,
	id_consultorio int,
	id_paciente int,
	documento text,
	inicio datetime,
	fin datetime,
	foreign key(id_doctor) references doctores(id),
	foreign key(id_consultorio) references consultorios(id),
	foreign key(id_paciente) references pacientes(id)
);

/*==========================================
=            Datos de tablas               =
==========================================*/

insert into secretarias(usuario,clave,nombre,apellido,rol)
	values 	("karenz","karenz","Karen","Zabala Claudio","Secretaria"),
			("rosap","rosap","Rosa","Paracta Azurduy","Secretaria");

INSERT INTO consultorios(nombre)
	VALUES 	("Cardiología"), ("Neumología"),
			("Gastrología"), ("Neurología");

insert into pacientes(apellido,nombre,documento,usuario,clave)
	values 	('Zelaya Luizaga','Norah','100112','norahz','norahz'),
			('Melendres','Tatiana','100113','tatianam','tatianam'),
			('Herrera','Katherine','152220','katherineh','katherineh'),
			('Soruco Zeballos','Vanessa','100452','vanessas','vanessas');




/*==========================================
=            Relacion de tablas            =
==========================================*/
alter table doctores AUTO_INCREMENT=1;

alter table doctores add foreign key(id_consultorio) references consultorios(id);




insert into usuarios(usuario,clave,nombre,apellido,documento,rol)
	values ("carlosf","localhost","Carlos Fernando","Llanque Soliz","212129627","Administrador");

select c.nombre as especialista, concat(d.apellido, ' ', d.nombre) as medico
from consultorios c, doctores d
 where d.id_consultorio=c.id group by especialista, medico order by especialista asc;

SELECT * FROM doctores WHERE id_consultorio = ;


