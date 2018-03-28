<?php

CREATE TABLE Utilisateur(
id_Utilisateur INTEGER(6) NOT NULL AUTO_INCREMENT,
pseudo_Utilisateur VARCHAR(25) NOT NULL,
mdp_Utilisateur VARCHAR(30) NOT NULL,
mail_Utilisateur VARCHAR(50) NOT NULL,
note_Utilisateur INTEGER(2),
PRIMARY KEY (id_Utilisateur)
);

INSERT INTO Utilisateur(pseudo_Utilisateur, mdp_Utilisateur, mail_Utilisateur) VALUES("mathi", "mathi", "mathi@gmail.com");
INSERT INTO Utilisateur(pseudo_Utilisateur, mdp_Utilisateur, mail_Utilisateur) VALUES("anna", "anna", "anna@gmail.com");

CREATE TABLE Type_Utilisateur(
id_Type INTEGER(2) NOT NULL AUTO_INCREMENT,
libelle_Type VARCHAR(50) NOT NULL,
PRIMARY KEY (id_Type)
);

INSERT INTO Type_Utilisateur(libelle_Type) VALUES("lecteur");
INSERT INTO Type_Utilisateur(libelle_Type) VALUES("administrateur");
INSERT INTO Type_Utilisateur(libelle_Type) VALUES("dessinateur");
INSERT INTO Type_Utilisateur(libelle_Type) VALUES("traducteur");

CREATE TABLE Type_U(
id_Utilisateur INTEGER(6) NOT NULL,
id_Type INTEGER(2) NOT NULL,
PRIMARY KEY (id_Utilisateur, id_Type),
FOREIGN KEY (id_Utilisateur) REFERENCES Utilisateur(id_Utilisateur),
FOREIGN KEY (id_Type) REFERENCES Type_Utilisateur(id_Type)
);

INSERT INTO Type_U VALUES(1, 1);
INSERT INTO Type_U VALUES(1, 2);
INSERT INTO Type_U VALUES(2, 1);
INSERT INTO Type_U VALUES(2, 2);
INSERT INTO Type_U VALUES(2, 3);

CREATE TABLE Mail(
id_Mail INTEGER(4) NOT NULL AUTO_INCREMENT,
objet_Mail VARCHAR(30),
message_Mail VARCHAR(4000) NOT NULL,
date_Envoi_Mail DATE,
statut_Mail VARCHAR(5),
id_Utilisateur INTEGER(6) NOT NULL,
id_Dest_Utilisateur INTEGER(6) NOT NULL,
PRIMARY KEY (id_Mail, id_Utilisateur, id_Dest_Utilisateur),
FOREIGN KEY (id_Utilisateur) REFERENCES Utilisateur(id_Utilisateur),
FOREIGN KEY (id_Dest_Utilisateur) REFERENCES Utilisateur(id_Utilisateur)
);

INSERT INTO Mail(objet_Mail, message_Mail, date_Envoi_Mail, id_Utilisateur, id_Dest_Utilisateur) VALUES("objet 1", "message 1", NOW(), 1, 2);
INSERT INTO Mail(objet_Mail, message_Mail, date_Envoi_Mail, id_Utilisateur, id_Dest_Utilisateur) VALUES("objet 2", "message 2", NOW(), 1, 2);
INSERT INTO Mail(objet_Mail, message_Mail, date_Envoi_Mail, id_Utilisateur, id_Dest_Utilisateur) VALUES("objet 3", "message 3", NOW(), 2, 1);
INSERT INTO Mail(objet_Mail, message_Mail, date_Envoi_Mail, id_Utilisateur, id_Dest_Utilisateur) VALUES("objet 4", "message 4", NOW(), 2, 1);

CREATE TABLE BD(
id_BD INTEGER(6) NOT NULL AUTO_INCREMENT,
titre_BD VARCHAR(50) NOT NULL,
date_Creation_BD DATE,
date_Fin_BD DATE,
note_BD INTEGER(2),
rang_BD INTEGER(6),
valide_Admin_BD	VARCHAR(5),
synopsis_BD VARCHAR(2000),
couverture_BD VARCHAR(150),
id_Utilisateur INTEGER(6) NOT NULL,
PRIMARY KEY (id_BD, id_Utilisateur),
FOREIGN KEY (id_Utilisateur) REFERENCES Utilisateur(id_Utilisateur)
);

INSERT INTO BD(titre_BD, date_Creation_BD, date_Fin_BD, couverture_BD, id_Utilisateur) VALUES("Harry Potter", "2018-01-20", "2018-02-10", "harry_potter.jpg", 2);
INSERT INTO BD(titre_BD, date_Creation_BD, date_Fin_BD, couverture_BD, id_Utilisateur) VALUES("Tom Tom et Nana", "2018-02-10", "2018-02-15" , "tom_tom_nana.jpg", 2);
INSERT INTO BD(titre_BD, date_Creation_BD, date_Fin_BD, couverture_BD, id_Utilisateur) VALUES("Le monde de Narnia", "2017-12-20", "2017-01-03" , "Narnia.jpg", 2);
INSERT INTO BD(titre_BD, date_Creation_BD, couverture_BD, id_Utilisateur) VALUES("Totoro", "2018-12-01" , "totoro.jpg", 2);

CREATE TABLE Genre(
id_Genre INTEGER(2) NOT NULL AUTO_INCREMENT,
libelle_Genre VARCHAR(50) NOT NULL,
PRIMARY KEY (id_Genre)
);

INSERT INTO Genre(libelle_Genre) VALUES("Policier");
INSERT INTO Genre(libelle_Genre) VALUES("Jeunesse");
INSERT INTO Genre(libelle_Genre) VALUES("SF");
INSERT INTO Genre(libelle_Genre) VALUES("Fantastique");
INSERT INTO Genre(libelle_Genre) VALUES("Aventure");
INSERT INTO Genre(libelle_Genre) VALUES("Humour");

CREATE TABLE BD_Genre(
id_BD INTEGER(6) NOT NULL,
id_Genre INTEGER(2) NOT NULL,
PRIMARY KEY (id_BD, id_Genre),
FOREIGN KEY (id_BD) REFERENCES BD(id_BD),
FOREIGN KEY (id_Genre) REFERENCES Genre(id_Genre)
);

INSERT INTO BD_Genre VALUES(1, 4);
INSERT INTO BD_Genre VALUES(2, 2);
INSERT INTO BD_Genre VALUES(2, 6);
INSERT INTO BD_Genre VALUES(3, 4);
INSERT INTO BD_Genre VALUES(4, 5);

CREATE TABLE Langue(
id_Langue INTEGER(2) NOT NULL AUTO_INCREMENT,
libelle_Langue VARCHAR(50) NOT NULL,
PRIMARY KEY (id_Langue)
);

INSERT INTO Langue(libelle_Langue) VALUES("Français");
INSERT INTO Langue(libelle_Langue) VALUES("Anglais");
INSERT INTO Langue(libelle_Langue) VALUES("Espagnol");
INSERT INTO Langue(libelle_Langue) VALUES("Italien");
INSERT INTO Langue(libelle_Langue) VALUES("Chinois");
INSERT INTO Langue(libelle_Langue) VALUES("Japonais");

CREATE TABLE BD_Langue(
id_BD INTEGER(6) NOT NULL,
id_Langue INTEGER(2) NOT NULL,
PRIMARY KEY (id_BD, id_Langue),
FOREIGN KEY (id_BD) REFERENCES BD(id_BD),
FOREIGN KEY (id_Langue) REFERENCES Langue(id_Langue)
);

INSERT INTO BD_Langue VALUES(1, 1);
INSERT INTO BD_Langue VALUES(1, 2);
INSERT INTO BD_Langue VALUES(1, 3);
INSERT INTO BD_Langue VALUES(1, 4);
INSERT INTO BD_Langue VALUES(2, 1);
INSERT INTO BD_Langue VALUES(3, 1);
INSERT INTO BD_Langue VALUES(3, 2);
INSERT INTO BD_Langue VALUES(4, 1);
INSERT INTO BD_Langue VALUES(4, 2);
INSERT INTO BD_Langue VALUES(4, 6);

CREATE TABLE Chapitre(
id_Chapitre INTEGER(2) NOT NULL AUTO_INCREMENT,
titre_Chapitre VARCHAR(50),
date_Creation_Chapitre DATE,
numero_Chapitre INTEGER(2) NOT NULL,
id_BD INTEGER(6) NOT NULL,
PRIMARY KEY (id_Chapitre, numero_Chapitre, id_BD),
FOREIGN KEY (id_BD) REFERENCES BD(id_BD)
);

INSERT INTO Chapitre(titre_Chapitre, numero_Chapitre, id_BD) VALUES("chapitre1",1,1);
INSERT INTO Chapitre(titre_Chapitre, numero_Chapitre, id_BD) VALUES("chapitre2",2,1);
INSERT INTO Chapitre(titre_Chapitre, numero_Chapitre, id_BD) VALUES("chapitre3",3,1);
INSERT INTO Chapitre(titre_Chapitre, numero_Chapitre, id_BD) VALUES("chapitre4",4,1);
INSERT INTO Chapitre(titre_Chapitre, numero_Chapitre, id_BD) VALUES("chapitre1",1,2);
INSERT INTO Chapitre(titre_Chapitre, numero_Chapitre, id_BD) VALUES("chapitre1",1,3);
INSERT INTO Chapitre(titre_Chapitre, numero_Chapitre, id_BD) VALUES("chapitre2",2,3);
INSERT INTO Chapitre(titre_Chapitre, numero_Chapitre, id_BD) VALUES("chapitre3",3,3);
INSERT INTO Chapitre(titre_Chapitre, numero_Chapitre, id_BD) VALUES("chapitre1",1,4);

CREATE TABLE Image(
id_Image INTEGER(4) NOT NULL AUTO_INCREMENT,
source_Image VARCHAR(150) NOT NULL,
numero_Image INTEGER(3) NOT NULL,
id_Chapitre INTEGER(2) NOT NULL,
PRIMARY KEY (id_Image, numero_Image, id_Chapitre),
FOREIGN KEY (id_Chapitre) REFERENCES Chapitre(id_Chapitre)
);



CREATE TABLE Bulle(
id_Bulle INTEGER(4) NOT NULL AUTO_INCREMENT,
parole_BD VARCHAR(1000),
coordonnee VARCHAR(2000),
type_Bulle VARCHAR(40),
numero_Bulle INTEGER(3) NOT NULL,
id_Image INTEGER(4) NOT NULL,
id_Langue INTEGER(2) NOT NULL,
PRIMARY KEY (id_Bulle, numero_Bulle, id_Image, id_Langue),
FOREIGN KEY (id_Image) REFERENCES Image(id_Image),
FOREIGN KEY (id_Langue) REFERENCES Langue(id_Langue)
);



CREATE TABLE Commentaire(
id_Commentaire INTEGER(6) NOT NULL AUTO_INCREMENT,
commentaire_Comm VARCHAR(4000),
date_Comm TIMESTAMP,
id_Chapitre INTEGER(2) NOT NULL,
id_Utilisateur INTEGER(6) NOT NULL,
PRIMARY KEY(id_Commentaire, id_Chapitre, id_Utilisateur),
FOREIGN KEY (id_Chapitre) REFERENCES Chapitre(id_Chapitre),
FOREIGN KEY (id_Utilisateur) REFERENCES Utilisateur(id_Utilisateur)
);



CREATE TABLE Modification(
id_Utilisateur INTEGER(6) NOT NULL,
id_Bulle INTEGER(4) NOT NULL,
date_Modif TIMESTAMP,
description_Modif VARCHAR(50),
PRIMARY KEY (id_Utilisateur, id_Bulle),
FOREIGN KEY (id_Utilisateur) REFERENCES Utilisateur(id_Utilisateur),
FOREIGN KEY (id_Bulle) REFERENCES Bulle(id_Bulle)
);



CREATE TABLE Traduire(
id_Utilisateur INTEGER(6) NOT NULL,
id_BD INTEGER(6) NOT NULL,
date_Debut_Traduire DATE,
date_Fin_Traduire DATE,
PRIMARY KEY (id_Utilisateur, id_BD),
FOREIGN KEY (id_Utilisateur) REFERENCES Utilisateur(id_Utilisateur),
FOREIGN KEY (id_BD) REFERENCES BD(id_BD)
);



CREATE TABLE Forum(
id_Forum INTEGER(4) NOT NULL AUTO_INCREMENT,
date_Creation_Forum DATE,
titre_Forum VARCHAR(50),
id_BD INTEGER(6) NOT NULL,
PRIMARY KEY (id_Forum, id_BD),
FOREIGN KEY (id_BD) REFERENCES BD(id_BD)
);

INSERT INTO Forum(date_Creation_Forum, titre_Forum, id_BD) VALUES(NOW(), "titre 1", 1);
INSERT INTO Forum(date_Creation_Forum, titre_Forum, id_BD) VALUES(NOW(), "titre 2", 3);
INSERT INTO Forum(date_Creation_Forum, titre_Forum, id_BD) VALUES(NOW(), "titre 3", 4);

CREATE TABLE Post(
id_Post INTEGER(4) NOT NULL AUTO_INCREMENT,
message_Post VARCHAR(4000),
date_Post TIMESTAMP,
id_Utilisateur INTEGER(6) NOT NULL,
id_Forum INTEGER(4) NOT NULL,
PRIMARY KEY (id_Post, id_Utilisateur, id_Forum),
FOREIGN KEY (id_Utilisateur) REFERENCES Utilisateur(id_Utilisateur),
FOREIGN KEY (id_Forum) REFERENCES Forum(id_Forum)
);



?>