create database base_de_datos_ticket;
use base_de_datos_ticket;
drop database base_de_datos_ticket;
CREATE TABLE TICKET(
idTicket int AUTO_INCREMENT,
fecha  TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
tema varchar(250),
 idPrior int ,
   id_usuario int,
   idDepartamento int,
   id_estatus int,
   id_archivo int,
   id_tarea int,
   fecha_vencimiento TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
   fecha_creacion TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    descripcion varchar(400),
    CONSTRAINT PRIMARY KEY (idTicket)
);
 CREATE TABLE PRIORIDAD(
 idPriori int AUTO_INCREMENT,
     nombre varchar (50),
     
     CONSTRAINT PRIMARY KEY (idPriori)
 );
create table ARCHIVO(
id_archivo int auto_increment,
tipo varchar (100),
Nombre varchar (200),
CONSTRAINT PRIMARY KEY (id_archivo)
);
 alter table ARCHIVO add Foto BLOB;
create table Colas_de_ticket(
id_cola int auto_increment,
tipo_de_estado varchar(200),
creador varchar(100),
estado varchar(100),
fecha_creacion TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
CONSTRAINT PRIMARY KEY (id_cola)
);
CREATE TABLE TAREA(

idTarea int AUTO_INCREMENT,
nombre varchar(60),
Vencimiento datetime ,
id_departamento int ,
id_cola int,
Entrega TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    CONSTRAINT PRIMARY KEY (idTarea)
);

alter table TICKET add CONSTRAINT FK_TICKET FOREIGN KEY(idPrior) REFERENCES PRIORIDAD (idPriori) ON DELETE NO ACTION;
alter table TICKET add constraint FK_TAREAS foreign key(id_archivo) REFERENCES ARCHIVO(id_archivo) ON DELETE NO ACTION;
alter table TICKET add constraint FK_TRABAJOS foreign key(id_tarea) REFERENCES TAREA(idTarea) ON DELETE NO ACTION;
alter table TAREA add CONSTRAINT FK_COLAS	 FOREIGN KEY(id_cola) REFERENCES Colas_de_ticket (id_cola) ON DELETE NO ACTION;

