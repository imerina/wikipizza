#------------------------------------------------------------
#        Script MySQL.
#------------------------------------------------------------


#------------------------------------------------------------
# Table: pizza
#------------------------------------------------------------

CREATE TABLE pizza(
        id_pizza    BigInt NOT NULL ,
        libelle     Varchar (25) ,
        prix_petite Decimal (5,2) ,
        prix_grande Decimal (5,2) ,
        prix_plaque Decimal (5,2) ,
        PRIMARY KEY (id_pizza )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: ingredient
#------------------------------------------------------------

CREATE TABLE ingredient(
        id_ingredient BigInt NOT NULL ,
        libelle       Varchar (30) ,
        PRIMARY KEY (id_ingredient )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: contient
#------------------------------------------------------------

CREATE TABLE contient(
        id_pizza      BigInt NOT NULL ,
        id_ingredient BigInt NOT NULL ,
        PRIMARY KEY (id_pizza ,id_ingredient )
)ENGINE=InnoDB;

ALTER TABLE contient ADD CONSTRAINT FK_contient_id_pizza FOREIGN KEY (id_pizza) REFERENCES pizza(id_pizza);
ALTER TABLE contient ADD CONSTRAINT FK_contient_id_ingredient FOREIGN KEY (id_ingredient) REFERENCES ingredient(id_ingredient);
