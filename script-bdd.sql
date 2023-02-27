CREATE DATABASE literie3000;

USE literie3000;

CREATE TABLE matelas(
    id SMALLINT PRIMARY KEY AUTO_INCREMENT,
    marque VARCHAR(250) NOT NULL,
    modele VARCHAR(250) NOT NULL,
    taille VARCHAR(10),
    prix SMALLINT,
    remise SMALLINT,
    picture VARCHAR(255)
);


INSERT INTO matelas
(marque, modele, taille, prix, remise, picture)
VALUES
("epeda","transition","90x190",759,529,"epeda-transition.png"),
("dreamway","stan","90x190",809,709,"dreamway-stan.png"),
("bultex","teamasse","140x190",759,529,"bultex-teamasse.png"),
("epeda","coup de boule","160x200",1019,509,"epeda-coupdeboule.png");