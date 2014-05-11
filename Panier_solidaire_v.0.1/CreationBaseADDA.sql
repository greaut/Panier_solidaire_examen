CREATE DATABASE paniersolidaire;
USE paniersolidaire;
# -----------------------------------------------------------------------------
#       TABLE : PRODUIT
# -----------------------------------------------------------------------------

CREATE TABLE  Produit
 (
   code    INTEGER NOT NULL,
   libelle VARCHAR(32) DEFAULT NULL
 ) 
# -----------------------------------------------------------------------------
#       TABLE : PANIER
# -----------------------------------------------------------------------------

CREATE TABLE Panier
 (
   datePanier DATETIME NOT NULL
 ) 
# -----------------------------------------------------------------------------
#       TABLE : CONTENIR
# -----------------------------------------------------------------------------

CREATE TABLE Contenir
 (
   datePanier   DATETIME NOT NULL,
   codeProduit  INTEGER NOT NULL,
   quantite     INTEGER NOT NULL
 ) 
 
# -----------------------------------------------------------------------------
#       CREATION DES REFERENCES DE TABLE
# -----------------------------------------------------------------------------

# -----------------------------------------------------------------------------
#       CLES PRIMAIRES
# -----------------------------------------------------------------------------
ALTER TABLE Produit
	ADD PRIMARY KEY pk_produit (code);
	
ALTER TABLE Panier
	ADD PRIMARY KEY pk_panier (datePanier);
	
ALTER TABLE Contenir
	ADD PRIMARY KEY pk_contenir(datePanier,codeProduit);

# -----------------------------------------------------------------------------
#       CLES ETRANGERES
# -----------------------------------------------------------------------------
	
ALTER TABLE Contenir 
	ADD FOREIGN KEY fk_contenir_panier(datePanier)
    REFERENCES Panier (datePanier);
	
ALTER TABLE Contenir 
	ADD FOREIGN KEY fk_contenir_produit(codeProduit)
    REFERENCES Produit (code);

# -----------------------------------------------------------------------------
#       INSERTIONS
# -----------------------------------------------------------------------------

# -----------------------------------------------------------------------------
#       TABLE PRODUIT
# -----------------------------------------------------------------------------

INSERT INTO Produit VALUES (1,'Pomme de terre');
INSERT INTO Produit VALUES (2,'Carotte');
INSERT INTO Produit VALUES (3,'Poireau');
INSERT INTO Produit VALUES (4,'Potiron');
INSERT INTO Produit VALUES (5,'Navet');
INSERT INTO Produit VALUES (6,'Oignon');
INSERT INTO Produit VALUES (7,'Pomme');
INSERT INTO Produit VALUES (8,'Poire');
INSERT INTO Produit VALUES (9,'Banane');
INSERT INTO Produit VALUES (10,'Orange');

# -----------------------------------------------------------------------------
#       TABLE PANIER
# -----------------------------------------------------------------------------

INSERT INTO Panier VALUES ('2013-12-05');
INSERT INTO Panier VALUES ('2013-12-12');

# -----------------------------------------------------------------------------
#       TABLE CONTENIR
# -----------------------------------------------------------------------------

INSERT INTO Contenir VALUES ('2013-12-05',1,500);
INSERT INTO Contenir VALUES ('2013-12-05',2,500);
INSERT INTO Contenir VALUES ('2013-12-05',3,1000);
INSERT INTO Contenir VALUES ('2013-12-05',4,1000);
INSERT INTO Contenir VALUES ('2013-12-05',5,500);
INSERT INTO Contenir VALUES ('2013-12-05',10,2000);
INSERT INTO Contenir VALUES ('2013-12-12',1,800);
INSERT INTO Contenir VALUES ('2013-12-12',2,1000);
INSERT INTO Contenir VALUES ('2013-12-12',3,500);
INSERT INTO Contenir VALUES ('2013-12-12',6,500);
INSERT INTO Contenir VALUES ('2013-12-12',8,500);
INSERT INTO Contenir VALUES ('2013-12-12',2,1500);