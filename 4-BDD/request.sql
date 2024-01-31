+++++/* 1 : Sélectionner toutes les colonnes de la table SERV. */
SELECT* FROM serv;
/* 2 : Sélectionner d’une autre manière ces colonnes. */
SELECT service FROM `serv`;
/* 3 : Sélectionner les colonnes SERVICE et NOSERV de la table SERV. */
SELECT service,noserv FROM `serv`;
/* 4 : Sélectionner toutes les colonnes de la table EMP. */
SELECT* FROM `emp`;
/* 5 : Sélectionner les emplois de la table EMP */
SELECT emploi FROM `emp`;
/* 6 : Sélectionner les différents emplois de la table EMP. */
SELECT DISTINCT emploi FROM `emp`;
 
/* 7 : Sélectionner les employés du service N°3 */
SELECT * FROM `emp` WHERE noserv=3;
/* 8 : Sélectionner les noms, prénoms, numéro d’employé, numéro de service de tous 
les techniciens. */
SELECT nom,prenom,noemp,noserv FROM `emp` WHERE `emploi`= "technicien";
/* 9 : Sélectionner les noms, numéros de service de tous les services dont le numéro 
est supérieur à 2 */
SELECT service,noserv FROM `serv` WHERE noserv > 2;
/* 10 : Sélectionner les noms, numéros de service de tous les services dont le 
numéro est inférieur ou égal à 2. */
SELECT service,noserv FROM `serv` WHERE noserv <= 2;
/* 11 : Sélectionner les employés dont la commission est inférieure au salaire. Vérifiez 
le résultat jusqu’à obtenir la bonne réponse. */
SELECT nom FROM `emp` WHERE comm < sal;
/* 12 : Sélectionner les employés qui ne touchent jamais de 
commission. */
SELECT nom FROM `emp` WHERE comm IS NULL;
/* 13 : Sélectionner les employés qui touchent éventuellement une 
commission et dans l’ordre croissant des commissions. */
SELECT * FROM `emp` ORDER BY `comm` ASC;
/* 14 : Sélectionner les employés qui ont un chef. */
SELECT * FROM `emp` WHERE sup is not null;
/* 15 : Sélectionner les employés qui n’ont pas de chef. */
SELECT * FROM `emp` WHERE sup is null;

/* 16 : Sélectionner les noms, emploi, salaire, numéro de service de tous les employés 
du service 5 qui gagnent plus de 20000 €. */
SELECT nom,emploi,sal,noserv FROM emp WHERE noserv=5 AND sal>20000;
/* 17 : Sélectionner les vendeurs du service 6 qui ont un revenu mensuel supérieur ou 
égal à 9500 €. */
SELECT nom,emploi,sal,noserv FROM emp WHERE emploi="VENDEUR" AND noserv=6 AND sal>=9500;
/* 18 : Sélectionner dans les employés tous les présidents et directeurs. Attention, le 
français et la logique sont parfois contradictoires. */
SELECT * FROM `emp` WHERE emploi="DIRECTEUR" OR emploi="PRESIDENT";
/* 19 : Sélectionner les directeurs qui ne sont pas dans le service 3. */
SELECT * FROM `emp` WHERE emploi="DIRECTEUR" AND NOT noserv=3 ;
/* 20 : Sélectionner les directeurs et « les techniciens du service 1 ». */
SELECT * FROM `emp` WHERE emploi="DIRECTEUR" OR emploi="TECHNICIEN" AND noserv=1;
/* 21 : Sélectionner les « directeurs et les techniciens » du service 1. */
SELECT * FROM `emp` WHERE (emploi="DIRECTEUR" OR emploi="TECHNICIEN") AND noserv=1;
/* 22 : Sélectionner les employés du service 1 qui sont directeurs ou techniciens. */
SELECT * FROM `emp` WHERE noserv=1 AND (emploi="DIRECTEUR" OR emploi="TECHNICIEN");
/* 23 : Sélectionner les employés qui ne sont ni directeur, ni technicien et travaillant 
dans le service 1. */
SELECT * FROM `emp` WHERE noserv=1 AND NOT (emploi="DIRECTEUR" OR emploi="TECHNICIEN");

/* 24 : Sélectionner les employés qui sont techniciens, comptables ou vendeurs. */
SELECT * FROM `emp` WHERE emploi="COMPTABLE" OR emploi="TECHNICIEN" OR emploi="VENDEUR";
/* 25 : Sélectionner les employés qui ne sont ni technicien, ni comptable, ni vendeur */
SELECT * FROM `emp` WHERE emploi="COMPTABLE" OR emploi="TECHNICIEN" OR emploi="VENDEUR";
/* 26 : Sélectionner les directeurs des services 2, 4 et 5. */
SELECT * FROM `emp` WHERE emploi="DIRECTEUR" AND (noserv=2 OR noserv=4 OR noserv=5)
/* 27 : Sélectionner les subalternes qui ne sont pas dans les services 1, 3, 5.*/
SELECT * FROM `emp` WHERE NOT emploi="DIRECTEUR" AND NOT emploi="PRESIDENT" AND NOT (noserv=1 OR noserv=3 OR noserv=5);
/* 28 : Sélectionner les employés qui gagnent entre 20000 et 40000 euros, bornes comprises. */
SELECT * FROM `emp` WHERE sal BETWEEN 20000 AND 40000;
/* 29 : Sélectionner les employés qui gagnent moins de 20000 et plus de 40000 euros. */
SELECT * FROM `emp` WHERE sal NOT BETWEEN 20000 AND 40000;
/* 30 : Sélectionner les employés qui ne sont pas directeur et qui ont été embauchés en 88. */
SELECT * FROM `emp` WHERE NOT emploi="DIRECTEUR" AND embauche BETWEEN "1988-01-01" AND "1988-12-31";
/* 31 : Sélectionner les directeurs des services 2 ,3 , 4, 5 sans le IN. */
SELECT * FROM `emp` WHERE emploi="DIRECTEUR" AND (noserv=2 OR noserv=3 OR noserv=4 OR noserv=5);
/* 32 :Sélectionner les employés dont le nom commence par la lettre M. */
SELECT * FROM `emp` WHERE nom LIKE "M%";
/* 33 : Sélectionner les employés dont le nom se termine par T. */
SELECT * FROM `emp` WHERE nom LIKE "%T";
/* 34 : Sélectionner les employés ayant au moins deux E dans leur nom. */
SELECT * FROM `emp` WHERE nom LIKE "%E%";
/* 35 : Sélectionner les employés ayant exactement un E dans leur nom. */
SELECT * FROM `emp` WHERE nom NOT LIKE "%E%E%" AND nom LIKE "%E%";
/* 36 : Sélectionner les employés ayant au moins un N et un O dans leur nom */
SELECT * FROM `emp` WHERE nom LIKE "%N%O%";
/* 37 : Sélectionner les employés dont le nom s'écrit avec 6 caractères et qui se termine par N. */
SELECT * FROM `emp` WHERE nom LIKE "_____N";
/* 38 : Sélectionner les employés dont la troisième lettre du nom est un R. */
SELECT * FROM `emp` WHERE nom LIKE "__R%";
/* 39 : Sélectionner les employés dont le nom ne s'écrit pas avec 5 caractères. */
SELECT * FROM `emp` WHERE nom NOT LIKE "_____";

/* 40 : Trier les employés (nom, prénom, n° de service, salaire) du service 3 par ordre de salaire 
croissant. */
SELECT nom,prenom,noserv,sal FROM `emp` WHERE noserv=3 ORDER BY sal ASC;
/* 41 : Trier les employés (nom, prénom, n° de service , salaire) du service 3 par ordre de 
salaire décroissant. */
SELECT nom,prenom,noserv,sal FROM `emp` WHERE noserv=3 ORDER BY sal DESC;
/* 42 : Idem en indiquant le numéro de colonne à la place du nom colonne. */

/* 43 : Trier les employés (nom, prénom, n° de service, salaire, emploi) par emploi, et pour 
chaque emploi par ordre décroissant de salaire. */
SELECT nom,prenom,noserv,sal,emploi FROM `emp`  ORDER BY emploi,sal DESC;
/* 44 : Idem en indiquant les numéros de colonnes. */

/* 45 : Trier les employés (nom, prénom, n° de service, commission) du service 3 par ordre 
croissant de commission. */
SELECT nom,prenom,noserv,comm FROM `emp` WHERE noserv=3 ORDER BY comm ASC;
/* 46 : Trier les employés (nom, prénom, n° de service, commission) du service 3 par ordre 
décroissant de commission, en considérant que celui dont la commission est nulle ne touche 
pas de commission. */
SELECT nom,prenom,noserv,comm FROM `emp` WHERE noserv=3 AND comm IS NOT null ORDER BY comm DESC;

/* 47 : Sélectionner le nom, le prénom, l'emploi, le nom du service de l'employé pour tous les 
employés. */
SELECT nom,prenom,service FROM emp,serv ;
/* 48 : Sélectionner le nom, l'emploi, le numéro de service, le nom du service pour tous les 
employés. */
SELECT nom,prenom,emploi,service,noserv FROM emp NATURAL JOIN serv;
/* 49 : Idem en utilisant des alias pour les noms de tables. */
 SELECT nom,prenom,emploi,service,noserv FROM emp AS t1 NATURAL JOIN serv AS t2 ;
/* 50 : Sélectionner le nom, l'emploi, suivis de toutes les colonnes de la table SERV pour tous 
les employés. */
SELECT emp.nom,emp.emploi, serv.* FROM `emp` RIGHT JOIN `serv` ON emp.noserv=serv.noserv ; 
/* 51 : Sélectionner les nom et date d'embauche des employés suivi des nom et date 
d'embauche de leur supérieur pour les employés plus ancien que leur supérieur, dans l'ordre 
nom employés, noms supérieurs.  */
SELECT `t1`.`nom`,`t1`.`embauche`, `t2`.`nom`,`t2`.`embauche`
FROM `emp` as `t1`
LEFT OUTER JOIN `emp` as `t2` ON `t2`.`noemp`=`t1`.`sup`
WHERE `t1`.`embauche`< `t2`.`embauche`
/* 52 : Sélectionner sans doublon les prénoms des directeurs et « les prénoms des
techniciens du service 1 » avec un UNION. */
SELECT prenom from emp WHERE emploi="DIRECTEUR" 
UNION 
SELECT prenom from emp WHERE emploi="TECHNICIEN" AND noserv=1
/* 53 : Sélectionner les numéros de services n’ayant pas d’employés sans une
jointure externe */
SELECT noserv FROM serv
WHERE noserv NOT IN (SELECT DISTINCT noserv from emp);
/* 54 : Sélectionner les services ayant au moins un employé. */
SELECT noserv FROM serv
WHERE noserv IN (SELECT DISTINCT noserv from emp);

/* 55 : Sélectionner les employés qui travaillent à LILLE.*/
SELECT* FROM emp WHERE noserv IN
(SELECT noserv FROM serv WHERE ville="LILLE") ;
/* 56 : Sélectionner les employés qui ont le même chef que DUBOIS, DUBOIS exclu. */
select*
from emp
where sup=(select sup from emp where nom="DUBOIS") 
and NOT nom="DUBOIS";
/* 57 : Sélectionner les employés embauchés le même jour que DUMONT.*/
select*
from emp
where embauche=(select embauche from emp where nom="DUMONT");
/* 58 : Sélectionner les nom et date d'embauche des employés plus anciens que MINET, 
dans l’ordre des embauches. */
select nom,embauche
from emp
where embauche<(select embauche 
			from emp 
			where nom="MINET")
ORDER BY embauche ASC ;
/* 59 : Sélectionner le nom, le prénom, la date d’embauche des employés 
plus anciens que tous les employés du service N°6. (Attention MIN) */
select nom, prenom, emploi, embauche
from emp
where embauche<(select min(embauche) 
           from emp
           where noserv=6)
order by embauche;
/* 60 : Sélectionner le nom, le prénom, le revenu mensuel des employés 
qui gagnent plus qu'au moins un employé du service N°3, trier le résultat 
dans l'ordre croissant des revenus mensuels. */
select nom, prenom, sal,noserv
from emp
where sal>(select min(sal) 
	from emp
	where noserv=3)
order by sal;
/* 61 : Sélectionner les noms, le numéro de service, l’emplois et le salaires 
des personnes travaillant dans la même ville que HAVET. */
select nom, emp.noserv, emploi, sal 
from emp inner join serv on emp.noserv = serv.noserv where ville IN 
(select ville from emp INNER JOIN serv on emp.noserv = serv.noserv where nom ='HAVET');
/* 62 : Sélectionner les employés du service 1, ayant le même emploi qu'un employé du service N°3. */
select*
from emp
where noserv=1 AND emploi IN(select emploi
	from emp
	where noserv=3);
/* 63 : Sélectionner les employés du service 1 dont l'emploi n'existe pas dans le service 3. */
select*
from emp
where noserv=1 AND emploi not IN(select emploi
	from emp
	where noserv=3);
/* 64 : Sélectionner nom, prénom, emploi, salaire pour les employés ayant 
même emploi et un salaire supérieur à celui de CARON. */
select nom,prenom,sal,noserv,emploi
from emp
where sal>(select sal
	from empç
	where nom="CARON")
    AND emploi IN 
    (SELECT DISTINCT emploi FROM emp WHERE nom="CARON");
/* 65 : Sélectionner les employés du service N°1 ayant le même emploi 
qu'un employé du service des VENTES. */
select nom, emp.noserv, emploi, sal 
from emp inner join serv on emp.noserv = serv.noserv where emploi IN 
(select emploi from emp INNER JOIN serv on emp.noserv = serv.noserv where service="VENTES");
/* 66 : Sélectionner les employés de LILLE ayant le même emploi que RICHARD, 
trier le résultat dans l'ordre alphabétique des noms. */
				select nom,emploi,emp.noserv,ville
				FROM emp INNER JOIN serv ON emp.noserv=serv.noserv WHERE emploi IN
				(SELECT emploi FROM serv INNER JOIN emp ON emp.noserv = serv.noserv WHERE nom="RICHARD" AND ville=(select ville from emp WHERE nom="RICHARD"));


/* 67 : Sélectionner les employés dont le salaire est plus élevé que le salaire moyen de leur service 
(moyenne des salaires = avg(sal)), résultats triés par numéros de service. */
select nom,emploi,e.noserv,sal
FROM emp AS e WHERE sal>
(SELECT avg(sal) FROM emp AS m WHERE e.noserv=m.noserv) order by noserv;
/* 68 : Sélectionner les employés du service INFORMATIQUE embauchés la même année qu'un employé du service VENTES. 
( année -> oracle : to_char(embauche,’YYYY’)> MYSQL: DATE_FORMAT(embauche,’%Y’) */
SELECT emp.* from emp INNER JOIN serv on emp.noserv = serv.noserv where  DATE_FORMAT(embauche, '%Y') 
IN (select DATE_FORMAT(embauche, '%Y') FROM emp inner JOIN serv ON serv.noserv = emp.noserv 
where service = 'ventes') and service = 'INFORMATIQUE' ;
/* 69 : Sélectionner le nom, l’emploi, la ville pour les employés 
qui ne travaillent pas dans le même service que leur supérieur hiérarchique direct. */
SELECT p.nom, p.emploi,p.noserv, v.ville
FROM emp p
INNER JOIN serv v ON p.noserv = v.noserv
WHERE p.noserv != (
    SELECT noserv
    FROM emp
    WHERE noemp = p.sup
);
/* 70 : Sélectionner le nom, le prénom, le service, le revenu des employés qui ont des
subalternes, trier le résultat suivant le revenu décroissant. */
SELECT nom,prenom,sal,noemp
FROM emp
WHERE noemp IN(SELECT sup from emp WHERE sup IS NOT null)
ORDER BY sal DESC

/* 71 :Sélectionner le nom, l’emploi, le revenu mensuel (nommé Revenu) 
avec deux décimales pour tous les employés, dans l’ordre des revenus décroissants. */
SELECT nom, prenom, emploi, 
ROUND((comm / sal) * 100, 2) 
AS "% Commissions" 
FROM emp 
ORDER BY "% Commissions" DESC;
/* 73 : Sélectionner nom, prénom, emploi, le pourcentage de commission 
(deux décimales) par rapport au revenu mensuel ( renommé "% Commissions") , pour tous les vendeurs dans l'ordre décroissant de ce pourcentage. */
SELECT nom, prenom, emploi, 
ROUND((comm / sal) * 100, 2) 
AS "% Commissions" 
FROM emp
WHERE emploi="VENDEUR"
ORDER BY "% Commissions" DESC;
/* 75 : Sélectionner nom, prénom, emploi, salaire, commissions, revenu mensuel 
pour les employés des services 3,5,6. */
SELECT nom, prenom, emploi, sal, comm, ROUND((sal / 12), 2) AS "Revenu mensuel",noserv
FROM emp
WHERE noserv IN (3,5,6)
/* 76 : Idem pour les employés des services 3,5,6 en remplaçant les noms des colonnes : 
SAL par SALAIRE, COMM par COMMISSIONS, SAL+IFNULL(COMM,0) par GAIN_MENSUEL. */
SELECT nom, prenom, emploi, sal AS "SALAIRE", comm AS "COMMISSIONS", ROUND(SAL+IFNULL(COMM,0),2) AS "GAIN_MENSUEL"
FROM emp
WHERE noserv IN (3,5,6)
/* 77 : Idem pour les employés des services 3,5,6 en remplaçant GAIN_ MENSUEL par GAINMENSUEL */
SELECT nom, prenom, emploi, sal AS "SALAIRE", comm AS "COMMISSIONS", ROUND(SAL+IFNULL(COMM,0),2) AS "GAINMENSUEL"
FROM emp
WHERE noserv IN (3,5,6)
/* 78 : Afficher le nom, l'emploi, les salaires journalier et horaire 
pour les employés des services 3,5,6 (22 jours/mois et 8 heures/jour), sans arrondi, 
arrondi au centime près. */
sans arrondi
SELECT nom, prenom, emploi, sal, ROUND((sal / 22)) AS "SALAIRE JOURNALIER", ROUND(((sal / 22)/8)) AS "SALAIRE HORAIRE"
FROM emp
WHERE noserv IN (3,5,6)

arrondi au centime près
SELECT nom, prenom, emploi, sal, ROUND((sal / 22), 1) AS "SALAIRE JOURNALIER", ROUND(((sal / 22)/8), 1) AS "SALAIRE HORAIRE"
FROM emp
WHERE noserv IN (3,5,6)
/* 79 : Idem sans arrondir mais en tronquant. */
SELECT nom, prenom, emploi, sal, TRUNCATE((sal / 22),1) AS "SALAIRE JOURNALIER", TRUNCATE(((sal / 22)/8),1) AS "SALAIRE HORAIRE"
FROM emp
WHERE noserv IN (3,5,6)

/*81 : Sélectionner nom, emploi pour les employés en ajoutant une colonne "CODE EMPLOI", trier le résultat sur ce code.
0 signifie que le code emploi n’existe pas. */
ALTER TABLE emp
ADD code_emploi int(1) after emploi

UPDATE emp
SET code_emploi = '1'
WHERE emploi="PRESIDENT"

UPDATE emp
SET code_emploi = '2'
WHERE emploi="DIRECTEUR"

UPDATE emp
SET code_emploi = '3'
WHERE emploi="COMPTABLE"

UPDATE emp
SET code_emploi = '4'
WHERE emploi="VENDEUR"

UPDATE emp
SET code_emploi = '5'
WHERE emploi="TECHNICIEN"

UPDATE emp
SET code_emploi = '0'
WHERE code_emploi is null 

/* 83 : Sélectionner les noms des services en affichant que les 5 premiers caractères. */
SELECT LEFT(service,5) FROM serv;

/* 87 : Afficher le nombre de lettres qui sert à écrire le nom de chaque service. */
SELECT LENGTH (service) FROM `serv`;
/* 89 : Sélectionner nom, emploi, date d'embauche des employés du service 6. */
SELECT p.nom,p.emploi,p.embauche,s.noserv 
FROM `emp` AS p 
INNER JOIN serv AS s 
ON p.noserv= s.noserv 
WHERE s.noserv=6;
/* 90 : Même chose en écrivant la colonne embauche sous la forme ‘dd-mm-yy’, renommée embauche. */
SELECT p.nom,p.emploi, DATE_FORMAT(p.embauche,"%d/%m/%y") as embauche,s.noserv 
FROM `emp` AS p 
INNER JOIN serv AS s ON p.noserv= s.noserv 
WHERE s.noserv=6;
/* 91 : Même chose en écrivant la colonne embauche sous la forme ‘day dd month yyyy' */
SELECT p.nom,p.emploi, DATE_FORMAT(p.embauche,"%a %d %M %Y") as embauche,s.noserv 
FROM `emp` AS p 
INNER JOIN serv AS s ON p.noserv= s.noserv 
WHERE s.noserv=6;
/* 92 : Même chose en écrivant la colonne embauche sous la forme ‘day dd month(abv) yy' */
SELECT p.nom,p.emploi, DATE_FORMAT(p.embauche,"%a %d %b %Y") as embauche,s.noserv 
FROM `emp` AS p 
INNER JOIN serv AS s ON p.noserv= s.noserv 
WHERE s.noserv=6;
/* 115 : Afficher l'emploi, l'effectif, le salaire moyen pour tout type d'emploi ayant plus de deux représentants. */
SELECT emploi, AVG(sal) AS moyenne_salaire
FROM emp
GROUP BY emploi
HAVING COUNT(*) > 2;
/* 116 : Sélectionner les services ayant au mois deux vendeurs. */
SELECT s.noserv, s.service, COUNT(e.noemp) AS nombre_vendeurs FROM serv s 
JOIN emp e ON s.noserv = e.noserv 
WHERE e.emploi = 'VENDEUR' 
GROUP BY s.noserv, s.service 
HAVING COUNT(e.noemp) >= 2; 
/* 121 : Augmenter de 10% ceux qui ont un salaire inférieur au salaire moyen. Valider. */
UPDATE `emp2` 
SET sal= (sal*10)/100 
WHERE sal<(SELECT AVG(sal) FROM `emp2`);
/* 122 : Insérez vous comme nouvel employé embauché aujourd’hui au salaire que vous
désirez. Valider. */
INSERT INTO emp2 (nom,prenom,embauche,sal)
VALUES ("GATTEPAILLE","GERTRUDE",CURRENT_DATE,"100000")
/* 123 : Effacer les employés ayant le métier de SECRETAIRE. Valider. */
DELETE FROM `emp2` WHERE emploi="SECRETAIRE";
/* 124 : Insérer le salarié dont le nom est MOYEN, prénom Toto, no 1010, embauché le 12/12/99,supérieur 1000, 
pas de comm, service no 1, salaire vaut le salaire moyen des employés.Valider. */
INSERT INTO emp2 (noemp, nom, prenom, embauche, sal, sup, comm, noserv)
VALUES (1010, 'MOYEN', 'Toto', '1999-12-12', (SELECT AVG(sal) FROM emp2 AS e), 1000, NULL, 1);
/* 125 : Supprimer tous les employés ayant un A dans leur nom. Faire un SELECT sur votre table pour vérifier cela. 
Annuler les modifications et vérifier que cette action s’est biendéroulée. */
BEGIN;

DELETE FROM emp
WHERE nom LIKE '%A%';

SELECT nom
FROM emp

ROLLBACK;

/* 127 : Créer les tables EMP1 et SERV1 comme copie des tables EMP et SERV. */
CREATE TABLE EMP1 AS
SELECT *
FROM emp;

INSERT INTO EMP1
SELECT *
FROM emp;

CREATE TABLE SERV1 AS
SELECT *
FROM serv;

INSERT INTO SERV1
SELECT *
FROM serv;
/* 128 : Vérifier que la table PROJ n’existe pas. */
SHOW TABLES FROM emploi LIKE 'PROJ';
/* 129 :
 Créer une table PROJET avec les colonnes suivantes:
numéro de projet (noproj), type numérique 3 chiffres, doit contenir une valeur. 
nom de projet (nomproj), type caractère, longueur = 10
budget du projet (budget), type numérique, 6 chiffres significatifs et 2 décimales.
 Vérifier l'existence de la table PROJET.
 Faire afficher la description de la table PROJET.
 C’était une erreur!!! Renommez la table PROJET en PROJ */
CREATE TABLE projet
(
    id INT PRIMARY KEY NOT NULL,
    noproj INT(3),
    nomprojet VARCHAR(10)
	budget DECIMAL(8,2)
);

SHOW TABLES FROM emploi LIKE 'projet';

DESCRIBE projet;

ALTER TABLE projet RENAME TO PROJ;


/* 130 :
 Insérer trois lignes de données dans la table PROJ: numéros des projets = 101, 102,
103
noms des projets = alpha, beta, gamma budgets = 250000, 175000, 950000
 Afficher le contenu de la table PROJ.
 Valider les insertions faites dans la table PROJ. */
INSERT INTO PROJ VALUES (101,"ALPHA",250000);
INSERT INTO PROJ VALUES (102,"BETA",175000);
INSERT INTO PROJ VALUES (103,"GAMMA",950000);

SELECT * FROM `PROJ`;

/* 131 :
Modifier la table PROJ en donnant un budget de 1.500.000 Euros au projet 103.
Modifier la colonne budget afin d'accepter des projets jusque 10.000.000.000 d’Euros
Retenter la modification demandée 2 lignes au dessus. */
ALTER TABLE PROJ
MODIFY budget decimal(13,2);

UPDATE PROJ
SET budget=1500000 
WHERE noproj=103;


/* 132 :
Ajouter une colonne NOPROJ (type numérique) à la table EMP.
Afficher le contenu de la table EMP. */
ALTER TABLE emp
ADD NOPROJ INT;

SELECT * FROM `emp`;