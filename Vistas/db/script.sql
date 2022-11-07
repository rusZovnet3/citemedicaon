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
	rol text
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




/*==========================================
=            Relacion de tablas            =
==========================================*/
alter table doctores AUTO_INCREMENT=1;

alter table doctores add foreign key(id_consultorio) references consultorios(id);


