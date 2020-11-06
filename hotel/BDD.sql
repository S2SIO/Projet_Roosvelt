--connexion a postgres
\c postgres
--suppresion de bd_hotel
drop database bd_hotel;

--creation de bd hotel
create database bd_hotel; 


\c bd_hotel

create table client (

	id serial,
    nom varchar(50),
    prenom varchar(50),
    adresse varchar(255),
    ville varchar(255),
    telephonne varchar(50),

       
    primary key (id)
    
);

create table chambre(

    id serial,
    numero_chambre int,
    type varchar(50)
    

);


create table reservation (

	id serial,
	date date,
	client_id int,
    chambre int,


    primary key (id),
    foreign key (client_id) references client(id)


);

drop user uti_hotel;
create user uti_hotel login password 'n_62_@'; 
grant all on client to uti_hotel;
grant all on client_id_seq to uti_hotel;
grant all on chambre to uti_hotel;
grant all on chambre_id_seq to uti_hotel;

grant all on reservation to uti_hotel;    
grant all on reservation_id_seq to uti_hotel;

--Insert chambre
--RezDeChaussée
insert into chambre values('1', '001', 'chambre_simple');
insert into chambre values('2', '002', 'chambre_simple');
insert into chambre values('3', '003', 'chambre_simple');
insert into chambre values('4', '004', 'chambre_simple');
insert into chambre values('5', '005', 'chambre_grande');
insert into chambre values('6', '006', 'chambre_simple');
insert into chambre values('7', '007', 'chambre_simple');
insert into chambre values('8', '008', 'chambre_simple');
insert into chambre values('9', '009', 'chambre_simple');
insert into chambre values('10', '010', 'chambre_grande');
insert into chambre values('11', '011', 'chambre_simple');
insert into chambre values('12', '012', 'chambre_simple');
insert into chambre values('13', '013', 'chambre_grande');
--1er etage
insert into chambre values('14', '101', 'chambre_simple');
insert into chambre values('15', '102', 'chambre_simple');
insert into chambre values('16', '103', 'chambre_grande');
insert into chambre values('17', '104', 'chambre_simple');
insert into chambre values('18', '105', 'chambre_simple');
insert into chambre values('19', '106', 'chambre_simple');
insert into chambre values('20', '107', 'chambre_simple');
insert into chambre values('21', '108', 'chambre_simple');
insert into chambre values('22', '109', 'chambre_simple');
insert into chambre values('23', '110', 'chambre_grande');
insert into chambre values('24', '111', 'chambre_simple');
insert into chambre values('24', '112', 'chambre_simple');
insert into chambre values('24', '113', 'suite');
--2eme étage
insert into chambre values('25', '201', 'suite');
insert into chambre values('26', '202', 'chambre_grande');
insert into chambre values('27', '203', 'chambre_grande');
insert into chambre values('28', '204', 'chambre_simple');
insert into chambre values('29', '205', 'chambre_simple');
insert into chambre values('30', '206', 'chambre_grande');
insert into chambre values('31', '207', 'chambre_simple');
insert into chambre values('32', '208', 'chambre_simple');
insert into chambre values('33', '209', 'suite');






--insert client
insert into client values('1', 'robinet', 'kevin', '3 grand rue nohan sur semoy', 'thilay', '0641853992');
insert into client values('2', 'roland', 'jean', '8 rue de la fraise', 'Paris', '0749854192');
insert into client values('3', 'Richard', 'mederic', '8 rue de la pomme', 'Grueville', '0743492192');


--insert reservation;
insert into reservation values('1', '2020-10-09', '1', '001');
insert into reservation values('2', '2020-10-09', '2', '002');
insert into reservation values('3', '2020-10-09', '3', '003');
insert into reservation values('4', '2020-10-09', '2', '004');
insert into reservation values('5', '2020-10-09', '3', '005');
insert into reservation values('6', '2020-10-09', '1', '006');
