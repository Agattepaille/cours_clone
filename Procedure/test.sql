-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mer. 06 déc. 2023 à 00:35
-- Version du serveur : 10.4.28-MariaDB
-- Version de PHP : 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `test`
--

DELIMITER $$
--
-- Procédures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `changeEmployeeSalary` (IN `employeeId` INT, IN `newSalary` DECIMAL(10,2))   BEGIN
    -- Vérifier si l'employé existe
    DECLARE employeeCount INT;
    SELECT COUNT(*) INTO employeeCount FROM employees3 WHERE ID = employeeId;

    IF employeeCount > 0 THEN
        -- L'employé existe, mettre à jour le salaire
        UPDATE employees3 SET SALARY = newSalary WHERE ID = employeeId;
        SELECT 'Le salaire de l\'employé a été mis à jour.' AS Result;
    ELSE
        -- L'employé n'existe pas
        SELECT 'L\'employé avec l\'identifiant fourni n\'existe pas.' AS Result;
    END IF;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `countOfEmployeesOutsideOfLille` ()   BEGIN
   
    DECLARE totalOut INT DEFAULT 0;
    
	 SELECT COUNT(*) INTO totalOut FROM employees2 WHERE CITY != "LILLE";
     
	SELECT totalOut;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `countTotalEmployees` ()   BEGIN
    -- Compter le nombre total d'employés
   
    DECLARE total INT DEFAULT 0;
    
	 SELECT COUNT(*) INTO total FROM employees2;
     
	SELECT total;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `deleteEmployee` (IN `p_ID` INT)   BEGIN
    -- Vérifier si la personne existe avant de la supprimer
    IF EXISTS (SELECT * FROM employees2 WHERE ID = p_ID) THEN
        -- Supprimer la personne de la table
        DELETE FROM employees2 WHERE ID = p_ID;
        
        -- Afficher un message de succès
        SELECT 'Personne supprimée avec succès' AS Message;
    ELSE
        -- Afficher un message si la personne n'existe pas
        SELECT 'Personne non trouvée. Aucune suppression effectuée.' AS Message;
    END IF;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `insertNewEmployee` (IN `NEW_FIRSTNAME` VARCHAR(255), IN `NEW_SURNAME` VARCHAR(255), IN `NEW_JOB` VARCHAR(255), IN `NEW_CITY` VARCHAR(255))   BEGIN
    INSERT INTO employees2 (FIRSTNAME, SURNAME, JOB, CITY) VALUES (NEW_FIRSTNAME, NEW_SURNAME, NEW_JOB, NEW_CITY);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `manageEmployees` (IN `newFirstname` VARCHAR(255), IN `newName` VARCHAR(255), IN `newJob` VARCHAR(255), IN `newCity` VARCHAR(255), IN `newSalary` INT, OUT `totalEmployees` INT)   BEGIN
    -- Requête 1 : Mettre à jour la ville des employés dont le salaire est inférieur à 8000
    UPDATE employees3 SET CITY = "LILLE" WHERE SALARY > 8000;

    -- Requête 2 : Ajouter un nouvel employé, situé à Lille
    INSERT INTO employees3 (FIRSTNAME, SURNAME, JOB, CITY, SALARY) VALUES (newFirstname,newName,newJob,newCity, newSalary);

    -- Requête 3 : Supprimer les employés dont le salaire est inférieur à 2000
    DELETE FROM employees3 WHERE SALARY < 2000;

    -- Requête 4 : Récupérer le nombre total d'employés après les opérations
    SELECT COUNT(*) INTO totalEmployees FROM employees3;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `readEmployees` ()   BEGIN
    SELECT * FROM employees2 ORDER BY ID DESC;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `updateCity` (IN `p_ID` INT, IN `NEW_CITY` VARCHAR(255))   BEGIN
    -- Vérifier si la personne existe avant de modifier la ville
    IF EXISTS (SELECT * FROM employees2 WHERE ID = p_ID) THEN
        -- Mettre à jour la ville de la personne
        UPDATE employees2 SET CITY = NEW_CITY WHERE ID = p_ID;
        
        -- Afficher un message de succès
        SELECT 'Ville mise à jour avec succès' AS Message;
    ELSE
        -- Afficher un message si la personne n'existe pas
        SELECT 'Personne non trouvée. Aucune mise à jour effectuée.' AS Message;
    END IF;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `updateEmployeeJob` (IN `employee_id` INT, IN `new_job` VARCHAR(255))   BEGIN
    -- Déclarer des variables pour stocker les anciennes informations
    DECLARE old_job VARCHAR(255);

    -- Sélectionner l'emploi actuel de l'employé
    SELECT JOB INTO old_job FROM employees2 WHERE ID = employee_id;

    -- Mettre à jour l'emploi de l'employé
    UPDATE employees2
    SET JOB = new_job
    WHERE ID = employee_id;

    -- Sélectionner les nouvelles informations
    SELECT CONCAT('Nouvel emploi : ', new_job) AS NouvelEmploi;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Structure de la table `employees`
--

CREATE TABLE `employees` (
  `ID` int(6) NOT NULL,
  `FIRSTNAME` varchar(255) NOT NULL,
  `SURNAME` varchar(255) NOT NULL,
  `JOB` varchar(255) NOT NULL,
  `SALARY` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `employees`
--

INSERT INTO `employees` (`ID`, `FIRSTNAME`, `SURNAME`, `JOB`, `SALARY`) VALUES
(128037, 'Clemens', 'Schumm', 'Regional Mobility Associate', 0),
(135939, 'Emma', 'Jerde', 'International Integration Engineer3050', 0),
(161537, 'Liana', 'Leuschke', 'Future Directives Planner', 0),
(217179, 'Mellie', 'Stracke', 'Chief Data Agent', 0),
(235183, 'Isabell', 'Greenfelder', 'Global Factors Coordinator6848', 0),
(251641, 'Austen', 'Batz', 'Internal Implementation Assistant', 0),
(260199, 'Kaden', 'Grimes', 'Chief Applications Administrator', 0),
(309210, 'Breanna', 'Kuhlman', 'District Configuration Assistant6879', 0),
(311614, 'Shayna', 'Mosciski', 'Customer Metrics Administrator', 0),
(318579, 'Mayra', 'Hauck', 'Legacy Markets Manager8290', 0),
(322213, 'Stan', 'Glover', 'Customer Integration Producer9435', 0),
(327979, 'Gregory', 'Huels', 'Senior Metrics Consultant8741', 0),
(331353, 'Demarcus', 'Adams', 'National Division Producer', 3819),
(351615, 'Sylvan', 'Gislason', 'District Accounts Agent', 0),
(352507, 'Marlee', 'Fadel', 'Future Mobility Orchestrator', 0),
(355059, 'Gerry', 'Kemmer', 'Principal Branding Orchestrator8243', 0),
(413467, 'Eva', 'Herman', 'Internal Response Director', 0),
(420116, 'Lamont', 'Pouros', 'Central Branding Specialist6210', 0),
(431232, 'Rachelle', 'Gulgowski', 'Customer Usability Facilitator8354', 0),
(475668, 'Tyrese', 'Reichert', 'Senior Division Facilitator8551', 0),
(507659, 'Arnoldo', 'Kemmer', 'Senior Markets Producer', 0),
(513996, 'Marc', 'Robel', 'Lead Accountability Assistant', 0),
(524413, 'Cooper', 'Ernser', 'Human Markets Director', 0),
(538857, 'Vivien', 'Kulas', 'International Functionality Technician', 0),
(550499, 'Hollis', 'Kemmer-Yundt', 'Product Web Designer7739', 0),
(569888, 'Elmore', 'Ward', 'Forward Mobility Officer', 0),
(571672, 'Rosella', 'Abbott', 'Global Solutions Facilitator1677', 0),
(583656, 'Tressie', 'Reinger', 'Central Factors Strategist', 0),
(585638, 'Elsa', 'Pagac', 'Chief Accounts Planner', 0),
(587061, 'Zaria', 'Glover', 'International Marketing Coordinator', 0),
(588866, 'Steve', 'Walter', 'Future Group Administrator7828', 0),
(627559, 'Ali', 'Harris', 'Senior Accounts Consultant4254', 0),
(657268, 'Coty', 'Bruen', 'Product Group Orchestrator4458', 0),
(693830, 'Edgar', 'Lind-Nikolaus', 'Customer Operations Orchestrator', 0),
(721641, 'Alejandrin', 'Hane', 'Chief Quality Producer8260', 0),
(749383, 'Justyn', 'Herzog', 'Chief Applications Analyst', 0),
(812914, 'Kennedi', 'Harber', 'Lead Functionality Director', 0),
(830303, 'Francesca', 'Grady', 'Lead Identity Planner', 0),
(854836, 'Margaretta', 'Borer', 'Product Interactions Producer', 0),
(880923, 'Helmer', 'Boehm', 'Legacy Tactics Manager', 0),
(908333, 'Willie', 'Christiansen', 'Product Identity Analyst3790', 0),
(910485, 'Rodrick', 'Quigley', 'Senior Security Specialist', 0),
(919307, 'Pauline', 'Hansen', 'Regional Solutions Designer', 0),
(923496, 'Hilda', 'Crona', 'Customer Mobility Facilitator4315', 0),
(938125, 'Mitchel', 'Beier', 'Customer Program Executive', 0),
(946327, 'Saul', 'Hettinger-Hickle', 'Corporate Security Assistant', 0),
(950816, 'Lori', 'Greenholt', 'Regional Branding Facilitator', 0),
(962108, 'Lina', 'Schulist', 'Product Usability Liaison', 0),
(973769, 'Ryley', 'Haley', 'Central Tactics Assistant3257', 0),
(982289, 'Noelia', 'Koepp', 'Corporate Assurance Planner7719', 0),
(999988, 'Alejandra', 'Connelly-Tremblay', 'International Optimization Orchestrator', 0),
(999989, 'Conner', 'Abshire', 'Corporate Optimization Architect', 5269),
(999990, 'Easton', 'Swaniawski', 'National Response Liaison', 2602),
(999991, 'Walton', 'Treutel', 'Dynamic Accountability Director', 2348),
(999992, 'Eleanore', 'Runte', 'Chief Markets Director', 4929),
(999993, 'Edward', 'Jerde', 'Human Quality Associate', 5106),
(999994, 'Constance', 'Labadie-Paucek', 'Internal Branding Engineer', 4150),
(999995, 'Arlie', 'Pouros', 'District Optimization Executive', 8492),
(999996, 'Hoyt', 'Dickinson', 'Regional Branding Specialist', 5527),
(999997, 'Hailee', 'Thompson', 'Chief Accounts Technician', 6768),
(999998, 'Elyssa', 'Donnelly', 'Direct Metrics Administrator', 1117),
(999999, 'Casper', 'Dare', 'International Research Facilitator', 2322),
(1000000, 'Eldridge', 'Marvin', 'Internal Intranet Facilitator', 3889),
(1000001, 'Daren', 'Legros', 'Regional Directives Agent', 8533),
(1000002, 'Rebekah', 'Hammes', 'Chief Assurance Coordinator', 5690),
(1000003, 'Chadrick', 'Lesch', 'Dynamic Factors Manager', 9207),
(1000004, 'Lois', 'Stanton', 'Central Branding Executive', 1815),
(1000005, 'Nellie', 'Parisian', 'Customer Functionality Producer', 8348),
(1000006, 'Jaida', 'Botsford', 'Forward Data Technician', 1657),
(1000007, 'Michale', 'Bednar', 'Investor Accountability Officer', 3199);

-- --------------------------------------------------------

--
-- Structure de la table `employees2`
--

CREATE TABLE `employees2` (
  `ID` int(6) NOT NULL,
  `FIRSTNAME` varchar(255) NOT NULL,
  `SURNAME` varchar(255) NOT NULL,
  `JOB` varchar(255) NOT NULL,
  `CITY` varchar(255) DEFAULT NULL,
  `SALARY` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `employees2`
--

INSERT INTO `employees2` (`ID`, `FIRSTNAME`, `SURNAME`, `JOB`, `CITY`, `SALARY`) VALUES
(143260, 'Orion', 'Douglas', 'Future Marketing Producer', 'Yostberg', 4869),
(160344, 'Immanuel', 'Ebert', 'Legacy Response Agent', 'Emileland', 2441),
(171085, 'Kendrick', 'Bruen', 'Direct Data Consultant', 'Burbank', 9482),
(177330, 'Nora', 'Klein', 'Dynamic Quality Supervisor', 'Great Falls', 4473),
(178540, 'Agnes', 'Schaden', 'Corporate Solutions Specialist', 'Lake Jeradfurt', 8385),
(195302, 'Delaney', 'Jacobs', 'Human Identity Planner', 'North Myriam', 7236),
(216162, 'Cayla', 'Crooks', 'International Interactions Representative', 'Camillefurt', 4732),
(245684, 'Drew', 'Denesik', 'Corporate Accounts Assistant', 'West Scottieshire', 6904),
(254271, 'Jeanette', 'Wuckert', 'Product Data Analyst', 'Faefield', 9135),
(330927, 'Jana', 'Ward', 'Corporate Security Agent', 'Chetland', 5419),
(332085, 'Lucile', 'Kuhic', 'Central Response Manager', 'Bauchfield', 3660),
(385964, 'Fidel', 'Rodriguez', 'Lead Data Consultant', 'Buffalo Grove', 2717),
(393028, 'Annabell', 'Kunde', 'Customer Marketing Agent', 'Rippinton', 4387),
(413018, 'Devonte', 'Kertzmann', 'Central Data Facilitator', 'Hyattborough', 6905),
(436844, 'Kimberly', 'Schmitt', 'Future Division Agent', 'Corkeryhaven', 2579),
(444027, 'Floy', 'Fay', 'Legacy Applications Administrator', 'South Felipe', 2228),
(452868, 'Eriberto', 'Wilderman', 'Dynamic Division Officer', 'Elizabury', 5342),
(490472, 'Nya', 'Lind', 'International Operations Analyst', 'Purdycester', 9765),
(512945, 'Ila', 'Greenfelder', 'Direct Assurance Supervisor', 'Cletusboro', 3962),
(545350, 'Elian', 'Jacobson', 'Senior Usability Architect', 'East Florencioside', 9034),
(587022, 'Clare', 'Pacocha', 'Forward Creative Consultant', 'East Ernestofield', 4715),
(598382, 'Aracely', 'Bernier', 'National Interactions Designer', 'Isaacville', 4733),
(647608, 'Burley', 'Gutmann', 'Corporate Web Associate', 'New Rudolph', 2443),
(656059, 'Joaquin', 'VonRueden', 'Senior Optimization Consultant', 'North Selina', 7488),
(718874, 'Nikolas', 'Weber', 'Forward Communications Orchestrator', 'Hayesport', 8111),
(742307, 'Raven', 'Ruecker', 'Direct Optimization Planner', 'Rachaelboro', 5016),
(751602, 'Erling', 'Fahey', 'Human Quality Agent', 'Hiramcester', 6820),
(783294, 'Claudia', 'Streich', 'Future Marketing Coordinator', 'Hintzworth', 1189),
(794882, 'Kamryn', 'Howell', 'Customer Applications Director', 'Rutherfordstead', 7475),
(805510, 'Zetta', 'Bins', 'Legacy Brand Orchestrator', 'Port Mohamed', 7970),
(809182, 'Annette', 'Pfeffer', 'Chief Program Specialist', 'Turnertown', 2043),
(829014, 'Archibald', 'Durgan', 'Regional Interactions Director', 'Port Winona', 7650),
(843442, 'Everett', 'Mraz', 'Investor Usability Analyst', 'Caesarborough', 4529),
(860687, 'Adam', 'Lesch', 'Internal Division Specialist', 'Wesley Chapel', 7755),
(909370, 'Lucie', 'Connelly', 'International Communications Engineer', 'Cronaview', 8864),
(912838, 'Laverne', 'Greenholt', 'Forward Brand Analyst', 'Fort Harmonshire', 5923),
(922088, 'Dustin', 'Hayes', 'Lead Interactions Assistant', 'Burien', 8530),
(960131, 'Jaiden', 'Wisozk', 'International Quality Officer', 'Taunton', 5769);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`ID`);

--
-- Index pour la table `employees2`
--
ALTER TABLE `employees2`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `employees`
--
ALTER TABLE `employees`
  MODIFY `ID` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1000008;

--
-- AUTO_INCREMENT pour la table `employees2`
--
ALTER TABLE `employees2`
  MODIFY `ID` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1000024;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
