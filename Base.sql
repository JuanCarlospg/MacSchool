CREATE DATABASE `DB_PROJECTE`;

USE `DB_PROJECTE`;

CREATE TABLE `PROFESSOR` (
    id_profe INT(3) NOT NULL PRIMARY KEY AUTO_INCREMENT,
    dni_profe CHAR(9) NOT NULL,
    nom_profe VARCHAR(10) NOT NULL,
    cognom1_profe VARCHAR(10) NOT NULL,
    cognom2_profe VARCHAR(10) NULL,
    email_prof VARCHAR(50) NOT NULL,
    telf_prof CHAR(9) NOT NULL,
    sal_prof decimal(5) NOT NULL,
    dept_prof int(3) NOT NULL
);

CREATE TABLE `CLASSE`(
    id_classe INT(3) NOT NULL PRIMARY KEY AUTO_INCREMENT,
    codi_classe CHAR(3) NOT NULL,
    nom_classe VARCHAR(20) NOT NULL,
    tutor INT(3) NOT NULL
);

CREATE TABLE `ALUMNE`(
    num_matric INT(3) NOT NULL PRIMARY KEY AUTO_INCREMENT,
    nom_alu VARCHAR(20) NOT NULL,
    cognom1_alu VARCHAR(30) NOT NULL,
    cognom2_alu VARCHAR(30) NOt NULL,
    email_alu VARCHAR(50) NOT NULL,
    dni_alu CHAR(9) NOT NULL,
    telf_alu CHAR(9) NOT NULL,
    fecha_matric_alu date NOT NULL,
    classe int(3) NOT NULL
);

CREATE TABLE `DEPARTAMENT`(
    id_dep INT(3) NOT NULL PRIMARY KEY AUTO_INCREMENT,
    codi_dept CHAR(3) NOT NULL,
    nom_dept VARCHAR(30)
);

CREATE TABLE `ADMINISTRADORES`(
    dni_ad CHAR(9) NOT NULL PRIMARY KEY,
    nom_ad VARCHAR(10) NOT NULL,
    email_ad VARCHAR(50) NOT NULL,
    pass_ad VARCHAR(10) NOT NULL
);

ALTER TABLE PROFESSOR
ADD CONSTRAINT profe_id_dep FOREIGN KEY (dept_prof)
REFERENCES DEPARTAMENT (id_dep);

ALTER TABLE CLASSE
ADD CONSTRAINT alu_dni_prof FOREIGN KEY (tutor)
REFERENCES PROFESSOR (id_profe);

ALTER TABLE ALUMNE
ADD CONSTRAINT alu_id_class FOREIGN KEY (classe)
REFERENCES CLASSE (id_classe);

INSERT INTO DEPARTAMENT VALUE(NULL,"102","Informatica");
INSERT INTO DEPARTAMENT VALUE(NULL,"201","deportes");
INSERT INTO DEPARTAMENT VALUE(NULL,"010","Humanidades");
INSERT INTO DEPARTAMENT VALUE(NULL,"015","Ciencias");
INSERT INTO DEPARTAMENT VALUE(NULL,"025","Artes");

INSERT INTO PROFESSOR VALUE(NULL,"03619853K","Gerard","Orobitg","Boyer","gorobitg@fje.edu","600550167",1000,1);
INSERT INTO PROFESSOR VALUE(NULL,"59810845N","Núria","Garrés","González","gnuria@fje.edu","649218387",1000,1);
INSERT INTO PROFESSOR VALUE(NULL,"79225888L","Agnes","Plans","Berenguer","aplans@fje.edu","675274171",1000,1);
INSERT INTO PROFESSOR VALUE(NULL,"24585946G","Sergio","Jimenez","Velasco","sjimenez@fje.edu","611552414",1000,1);
INSERT INTO PROFESSOR VALUE(NULL,"00494146Z","Alberto","de Santos","Ontoria","gorobitg@fje.edu","758978200",1000,1);
INSERT INTO PROFESSOR VALUE(NULL,"81748298L","Ignasi","Romero","Sanjuan","iromero@fje.edu","684204692",1000,1);
INSERT INTO PROFESSOR VALUE(NULL,"98067578V","Miguel","Delgado","Caballero","mdelgado@fje.edu","637423352",1000,2);
INSERT INTO PROFESSOR VALUE(NULL,"19796391S","Laura","Redondo","Rión","lredondo@fje.edu","639223832",1000,2);
INSERT INTO PROFESSOR VALUE(NULL,"31077895L","Pedro","Blanco","Andrés","pblanco@fje.edu","634770284",1000,1);
INSERT INTO PROFESSOR VALUE(NULL,"52485173R","Lluc","Rodriguez","Lopez","lrodriguez@fje.edu","665873994",1000,1);
INSERT INTO PROFESSOR VALUE(NULL,"94128241M","Magda","Retamal","Montilla","mretamal@fje.edu","654793598",1000,1);
INSERT INTO PROFESSOR VALUE(NULL,"71504175G","Sergi","Font","Tejedor","sfont@fje.edu","687972131",1000,2);
INSERT INTO PROFESSOR VALUE(NULL,"45925350P","Fonxo","Tomas","Arias","ftomas@fje.edu","695682875",1000,2);
INSERT INTO PROFESSOR VALUE(NULL,"75605214M","Anselmo","Torres","Raya","atorres@fje.edu","710082508",1000,2);
INSERT INTO PROFESSOR VALUE(NULL,"60695187G","Eustaquio","Mateu","Herrera","emateu@fje.edu","676043465",1000,1);
INSERT INTO PROFESSOR VALUE(NULL,"88936915D","Ramon","Colom","Valiente","rcolom@fje.edu","608 873872",1000,3);
INSERT INTO PROFESSOR VALUE(NULL,"63642258Q","Robledo","Roble","Echevarria","rroble@fje.edu","628443504",1000,3);
INSERT INTO PROFESSOR VALUE(NULL,"54437648Y","Xavi","Soler","Centeno","xsoler@fje.edu","661331831",1000,4);
INSERT INTO PROFESSOR VALUE(NULL,"41499392D","Alba","Brunet","Cabrera","abrunet@fje.edu","678595996",1000,4);
INSERT INTO PROFESSOR VALUE(NULL,"86920828X","Claudia","Sadurni","Llanos","csadurni@fje.edu","627710614",1000,5);
INSERT INTO PROFESSOR VALUE(NULL,"02497001Y","Roger","Vidal","Prados","rvidal@fje.edu","691508318",1000,5);

INSERT INTO CLASSE VALUE(NULL,"307","SMX1","1");
INSERT INTO CLASSE VALUE(NULL,"301","SMX2","2");
INSERT INTO CLASSE VALUE(NULL,"301","ASIX1","3");
INSERT INTO CLASSE VALUE(NULL,"304","ASIX2","4");
INSERT INTO CLASSE VALUE(NULL,"307","DAW2","5");

INSERT INTO ALUMNE VALUE(NULL,"Julio","Carrillo","Rocha","julio@fje.edu","80601839H","942891818", CURDATE(),1);
INSERT INTO ALUMNE VALUE(NULL,"Ainoa","Prados","Valcarcel","ainoa@fje.edu","18176076G","680527969", CURDATE(),1);
INSERT INTO ALUMNE VALUE(NULL,"Paulino ","Espin","García","paulino@fje.edu","99709398M","653086012",CURDATE(),1);
INSERT INTO ALUMNE VALUE(NULL,"Nancy","Luengo","Pacheco","nancy@fje.edu","56400532R","726446795",CURDATE(),2);
INSERT INTO ALUMNE VALUE(NULL,"Piedad","Ariza","Becerra","piedad@fje.edu","18619881R","646163728",CURDATE(),2);
INSERT INTO ALUMNE VALUE(NULL,"Anastasia","Alcazar","Galvez","anastasia@fje.edu","97946886Y","659280801",CURDATE(),2);
INSERT INTO ALUMNE VALUE(NULL,"Maite","Arroyo","Ortiz","maite@fje.edu","50629024K","626255504",CURDATE(),3);
INSERT INTO ALUMNE VALUE(NULL,"Diego","Pérez","Paz","diego@fje.edu","26849614N","660547746",CURDATE(),3);
INSERT INTO ALUMNE VALUE(NULL,"Adan","Calle","Ortuño","adan@fje.edu","78679374P","705771394",CURDATE(),3);
INSERT INTO ALUMNE VALUE(NULL,"Nuria","Fuentes","Ubeda","nuria@fje.edu","08796926R","604713149",CURDATE(),4);
INSERT INTO ALUMNE VALUE(NULL,"Tomas","Morera","Martinez","tomas@fje.edu","76403881C","690180428",CURDATE(),4);
INSERT INTO ALUMNE VALUE(NULL,"Elias","Recio","Fernández","elias@fje.edu","11367144S","696947094",CURDATE(),4);
INSERT INTO ALUMNE VALUE(NULL,"Alberto","Bermejo","Nuñez","441292.joan23@fje.edu","78972211S","690621200",CURDATE(),5);
INSERT INTO ALUMNE VALUE(NULL,"Marc","Martinez","Mendez","100007471.joan23@fje.edu","49809228Z","601419940",CURDATE(),5);
INSERT INTO ALUMNE VALUE(NULL,"Juan Carlos","Prado","Garcia","467560.joan23@fje.edu","AV124106","640813704",CURDATE(),5);
INSERT INTO ALUMNE VALUE(NULL,"Christian","Monrabal","Donis","100007473.joan23@fje.edu","39730727K","638872242",CURDATE(),1);
INSERT INTO ALUMNE VALUE(NULL,"Albert","Pérez","Hervás","albert.joan23@fje.edu","93623820C","615006480",CURDATE(),2);
INSERT INTO ALUMNE VALUE(NULL,"Oriol","Godoy","Morote","oriol@fje.edu","99351219M","675478440",CURDATE(),3);
INSERT INTO ALUMNE VALUE(NULL,"Rafael","García","Del Rincon","rafael@fje.edu","65672691D","635746521",CURDATE(),4);
INSERT INTO ALUMNE VALUE(NULL,"Mario","Palamari","Molina","mario@fje.edu","26448267S","695342793",CURDATE(),5);
INSERT INTO ALUMNE VALUE(NULL,"Sergio","Callejas","Martos","sergio@fje.edu","72451244W","622179914",CURDATE(),1);
INSERT INTO ALUMNE VALUE(NULL,"Luca","Lusuardi","Masip","luca@fje.edu","64364909F","602486039",CURDATE(),2);
INSERT INTO ALUMNE VALUE(NULL,"Julia","Suarez","Dueso","julia@fje.edu","94630862F","622566846",CURDATE(),3);
INSERT INTO ALUMNE VALUE(NULL,"Carla","Maldonado","Benedicto","carla@fje.edu","624031023","680473507",CURDATE(),4);
INSERT INTO ALUMNE VALUE(NULL,"Aina","Orozco","Gonzalez","aina@fje.edu","21953110R","625564278",CURDATE(),5);
INSERT INTO ALUMNE VALUE(NULL,"Marta","Rubio","Sedano","marta@fje.edu","66752340S","650667626",CURDATE(),1);
INSERT INTO ALUMNE VALUE(NULL,"Marc","Guiró","Gassó","marc@fje.edu","71244870R","640900251",CURDATE(),2);
INSERT INTO ALUMNE VALUE(NULL,"Pol","Deulonder","Biarge","pol@fje.edu","83353805B","637813836",CURDATE(),3);
INSERT INTO ALUMNE VALUE(NULL,"Marc","Pecellin","Rodríguez","marcp@fje.edu","82595911J","602979731",CURDATE(),4);
INSERT INTO ALUMNE VALUE(NULL,"Cesar","Del Pozo","Rodríguez","cesar@fje.edu","91705010P","627918043",CURDATE(),5);