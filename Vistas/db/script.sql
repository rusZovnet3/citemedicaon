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

insert into secretarias(usuario,clave,nombre,apellido,rol)
	values 	("karenz","karenz","KAREN","ZABALA CLAUDIO","Secretaria"),
			("rosap","rosap","ROSA","PARACTA AZURDUY","Secretaria");

