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

create table semana(
	id int primary key auto_increment,
	nombre text
);

create table horario(
	id int primary key auto_increment,
	id_semana int,
	horarioE time default "00:00:00",
	horarioS time default "00:00:00",
	foreign key(id_semana) references semana(id)
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
	horarioE time default "00:00:00",
	horarioS time default "00:00:00",
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
	nom_ape_pac text,
	documento text,
	inicio datetime,
	fin datetime,
	foreign key(id_doctor) references doctores(id),
	foreign key(id_consultorio) references consultorios(id),
	foreign key(id_paciente) references pacientes(id)
);

create table administradores(
	id int primary key auto_increment,
	usuario text,
	clave text,
	apellido text,
	nombre text,
	foto text,
	rol varchar(13) default "Administrador"
);

insert into administradores(usuario,clave,apellido,nombre)
	values ('carlosf','carlosf','Llanque Soliz','Carlos'),
			('carmenr','carmenr','Fernandez Castro','Carmen');

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

# agregar un atributo nuevo despues del atributo id_paciente
ALTER TABLE `citas` ADD `nom_ape_pac` TEXT NOT NULL AFTER `id_paciente`;


#cambiar el tipo de dato del atributo a default 00:00:00
ALTER TABLE `doctores` CHANGE `horarioE` `horarioE` TIME NULL DEFAULT '00:00:00';


# Mostrar las citas del doctor, ordenados de manera Ascendente
select ct.id as id_cita, concat(ct.inicio,'  -------  ',ct.fin) as atencion_cita,
 ct.id_paciente as id_paciente, ct.nom_ape_pac as paciente, c.id as id_consultorio,
 c.nombre as consultorio, d.id as id_doctorr, concat(d.apellido,' ',d.apellido) as doctor,
concat(d.horarioE,' ',horarioS) as horario_doctor
 from citas ct, doctores d, consultorios c
where ct.id_doctor=d.id AND ct.id_consultorio=c.id AND d.id=15 ORDER BY date(ct.inicio) ASC;




