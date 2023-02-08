SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";
drop database takalo;
create database takalo;
use takalo;
create table user(
    id integer auto_increment PRIMARY KEY ,
    mail varchar(40),
    name varchar(40),
    password varchar(20),
    date_naissance date 
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
create table categorie(
    id_categorie integer auto_increment PRIMARY KEY,
    nom_categorie varchar(40)
)ENGINE=InnoDB DEFAULT CHARSET=latin1; 

create table objet(
    id_objet integer auto_increment PRIMARY KEY,
    id_owner integer,
    titre varchar(20),
    descriptionn varchar(40),
    id_categorie integer,
    prix float,
    FOREIGN key (id_owner) REFERENCES user(id),
    FOREIGN KEY (id_categorie) REFERENCES categorie(id_categorie)
)ENGINE=InnoDB DEFAULT CHARSET=latin1; 

create table photo_objet(
    id_objet integer,
    photo varchar(50),
    FOREIGN KEY (id_objet) REFERENCES objet(id_objet)
)ENGINE=InnoDB DEFAULT CHARSET=latin1; 

create table echange(
    id_objet1 integer,
    id_objet2 integer,
    FOREIGN KEY (id_objet1) REFERENCES objet(id_objet),
    FOREIGN KEY  (id_objet2) REFERENCES objet(id_objet)
)ENGINE=InnoDB DEFAULT CHARSET=latin1; 

create table delete_objet(
    id_objet integer,
     FOREIGN KEY (id_objet) REFERENCES objet(id_objet)
)ENGINE=InnoDB DEFAULT CHARSET=latin1; 

Insert into user values (null,'admin@gmail.com','admin','1234','2000-02-10');
Insert into user values (null,'rabe@gmail.com','rabe','0101','1998-04-28');
Insert into user values (null,'soa@gmail.com','Soa','0202','2001-08-01');

Insert into categorie values (null,'chapeau');
Insert into categorie values (null,'chaussures');
Insert into categorie values (null,'livres');
Insert into categorie values (null,'Vetements');
Insert into categorie values (null,'accesoires');

insert into objet values (null,1,'casquette','pour un homme adulte',1,25000);
insert into objet values (null,2,'chapeau de paille','pour une femme',1,15000);
insert into objet values (null,1,'mocassin','pour homme,pointure 40 ,modele unique',2,30000);
insert into objet values (null,2,'basket','pour tout le monde,toutes pointures ,stock presque epuise',2,40000);
insert into objet values (null,1,'livre:eat beautiful','roman et fantasie',3,10000);
insert into objet values (null,1,'livre:little black book','histoire touchantes',3,15000);
insert into objet values (null,2,'patalon jean','pour un homme court',4,10000);
insert into objet values (null,2,'patalon jogging','pour une femme',4,20000);
insert into objet values (null,1,'lunette','lunette de vue pour une femme',5,20000);
insert into objet values (null,1,'lunette','lunette de soleil pour une femme et homme ',5,18000);
select * from objet;

Insert into photo_objet values(1,'chapeau1.jpg');
Insert into photo_objet values(2,'chapeau2.jpg');
Insert into photo_objet values(3,'chaussure1.jpg');
Insert into photo_objet values(4,'chaussure2.jpg');
Insert into photo_objet values(5,'livre1.jpg');
Insert into photo_objet values(6,'livre2.jpg');
Insert into photo_objet values(7,'v1.jpg');
Insert into photo_objet values(8,'v2.jpg');
Insert into photo_objet values(9,'1.jpg');
Insert into photo_objet values(10,'2.jpg');

insert into echange values(1,2,2023-02-07 10:30:20);
insert into echange values(8,5,2023-02-08 12:30:20);

create or replace view v_objet_photo as
(
    select o.*,photo from objet o join photo_objet po on o.id_objet = po.id_objet limit 1
);
    create or replace view v_objet_details as
(
    select o.*,nom_categorie from v_objet_photo o join categorie c on c.id_categorie = o.id_categorie
);
alter table echange add date_heure_echange datetime;

create or replace view proprietaires as
(
select o.*,u.nom,e.date_heure_echange from user u join objet o on o.id_owner = u.id join echange e on e.id_objet = o.id_objet 

);
