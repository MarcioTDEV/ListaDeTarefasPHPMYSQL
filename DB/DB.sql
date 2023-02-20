create database listaDeTarefas;
use listaDeTarefas;

create table Usuario (
idUsuario int not null auto_increment primary key,
nomeUsuario varchar(100) not null,
emailUsuario varchar(100) not null,
senhaUsuario varchar(255) not null);

create table Tarefas(
idTarefa int not null auto_increment primary key,
textoTarefa varchar(255) not null,
statusTarefa varchar(15) not null,
idUsuario int not null,
foreign key (idUsuario) references Usuario(idUsuario)
);
