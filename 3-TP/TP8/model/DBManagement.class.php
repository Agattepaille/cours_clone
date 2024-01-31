<?php

abstract class DBManagement
{
    // Propriétés

    // Constructeur
    public function __construct() {

    }

    // méthodes

    // Made by @Dylan
    // inscription d'un nouvel utilisateur -> utiliser cette fonction dans la classe User pour instancier un nouvel objet User
    public static function addUserToDB(User $newUser): void{
        $bdd = new PDO('mysql:host=localhost;dbname=dbswearjar;charset=utf8mb4', 'root', '');
        $sql = "INSERT INTO users (name,firstname,tel,mail,login,password,address) VALUES (?,?,?,?,?,?,?);";
        $stmt= $bdd->prepare($sql);
        $name = $newUser->getName();
        $firstname = $newUser->getFirstname();
        $tel = $newUser->getTel();
        $mail = $newUser->getMail();
        $login = $newUser->getLogin();
        $password = $newUser->getPassword();
        $address = $newUser->getAddress();
        $stmt->execute([$name, $firstname, $tel, $mail, $login, $password,$address]);
    }

// Made by @Amelie
    // Get the informations of a user
    public static function getInfoUserFromDB($info,$value): User {
        $bdd = new PDO('mysql:host=localhost;dbname=dbswearjar;charset=utf8mb4', 'root', '');
        $sql = "SELECT * FROM users WHERE $info = ?;";
        $stmt = $bdd->prepare($sql);
        $stmt->execute([$value]);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        $user = new User($result['name'],$result['firstname'],$result['tel'],$result['mail'],$result['login']," ",$result['address']);
        $user->setUser_ID($result['user_ID']);
        return $user;
    }


    // Made by @Amelie
    // reset password when a user is already connected (using User class)
    public static function resetUserPassword(User $user,String $newPassword): void{
        $bdd = new PDO('mysql:host=localhost;dbname=dbswearjar;charset=utf8mb4', 'root', '');
        // Hash the new password before updating the database
        $hashedPassword = password_hash($newPassword, PASSWORD_BCRYPT);
        $userMail = $user->getMail();
        $sql = "UPDATE users SET password = ? WHERE mail = ?";
        $stmt = $bdd->prepare($sql);
        $stmt->execute([$hashedPassword, $userMail]);
    }

    /*
    login function
    Author  @Abdelkarim / @Dylan
    */
    public static function checkValidLoginFromDB($login, $password): bool {
        $bdd = new PDO('mysql:host=localhost;dbname=dbswearjar;charset=utf8mb4', 'root', '');

        $sql = "SELECT password FROM users WHERE login = ?";
        $stmt = $bdd->prepare($sql);
        $stmt->execute([$login]);
        $hashedPasswordFromDB = $stmt->fetchColumn();
        if ($hashedPasswordFromDB !== false) {
            if (password_verify($password, $hashedPasswordFromDB)) {
                session_start();
                return true;
            } else {
                header('Location: ../view/login.php');
                return false;
            }
        } else {
            header('Location: ../view/login.php');
            return false;
        }
    }


// Made by @Dylan
    // displays Users list, using class User
    public static function readUsers(): array{
        $bdd = new PDO('mysql:host=localhost;dbname=dbswearjar;charset=utf8mb4', 'root', '');
        $sql = "SELECT * FROM `users`;";
        $stmt= $bdd->prepare($sql);
        $stmt->execute();
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $users = [];
        foreach ($results as $result) {
            $user = new User(
                $result['name'],
                $result['firstname'],
                $result['tel'],
                $result['mail'],
                $result['login'],
                " ",
                $result['address'],
            );
            $user->setUser_ID($result['user_ID']);
            // $user->setTotalDebt($result['total_debt']);
        $users[] = $user;
        }
        return $users;
    }

    // Made by @Amelie
    // supprime un utilisateur
    public static function deleteUser($user_ID): void{
        $bdd = new PDO('mysql:host=localhost;dbname=dbswearjar;charset=utf8mb4', 'root', '');
        $sql = "DELETE FROM users WHERE user_ID = ?;";
        $stmt= $bdd->prepare($sql);
        $stmt->execute([$user_ID]);
    }





    /*
    made by @Dylan
    */
    public static function getPenalities(): array {
        $bdd = new PDO('mysql:host=localhost;dbname=dbswearjar;charset=utf8mb4', 'root', '');
        $sql = "SELECT * FROM penality";
        $stmt = $bdd->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

       /*
    made by @Dylan
    */
    public static function addPenalityInsult($user_ID, $penalityType): void{
        $bdd = new PDO('mysql:host=localhost;dbname=dbswearjar;charset=utf8mb4', 'root', '');
        // Récupérer la dernière valeur de insult_Number, aggressive_Behavior et inadequate_Behavior
        $lastValues = self::getLastPenalityValues($user_ID);
        // Définir la valeur de insult_Number, aggressive_Behavior et inadequate_Behavior en fonction du type de pénalité
        $insultNumber = ($penalityType === 'Agressive behavior' || $penalityType === 'Inadequate behavior') ? $lastValues['insult_Number'] : $lastValues['insult_Number'] + 1;
        $aggressiveBehavior = $penalityType === 'Agressive behavior' ? $lastValues['aggressive_Behavior'] + 1 : $lastValues['aggressive_Behavior'];
        $inadequateBehavior = $penalityType === 'Inadequate behavior' ? $lastValues['inadequate_Behavior'] + 1 : $lastValues['inadequate_Behavior'];
        // Récupérer la dernière valeur de delay_number
        $delay_Number = self::getDelayNumber($user_ID);
        $snitchid = $_COOKIE["user_id"];
        $snitchname = $_COOKIE["user_firstname"];
        // Insérer la nouvelle pénalité avec le nombre d'occurrences actuel
        $sql = "INSERT INTO infraction (user_ID, delay_Number, insult_Number, aggressive_Behavior, inadequate_Behavior, snitch_ID, snitch_name, penality_Type) VALUES (?, ?, ?, ?, ?, ?, ?, ?);";
        $stmt = $bdd->prepare($sql);
        $stmt->execute([$user_ID, $delay_Number, $insultNumber, $aggressiveBehavior, $inadequateBehavior, $snitchid, $snitchname, $penalityType]);
    }

    /*
    made by @Dylan
    */
    public static function addDelay($user_ID, $selectedDelay): void {
        $bdd = new PDO('mysql:host=localhost;dbname=dbswearjar;charset=utf8mb4', 'root', '');
        // Récupérer la dernière valeur de insult_Number, aggressive_Behavior, inadequate_Behavior et delay_Number
        $lastValues = self::getLastPenalityValues($user_ID);
        // Définir la valeur de insult_Number, aggressive_Behavior, inadequate_Behavior en fonction du type de pénalité
        $insultNumber = $lastValues['insult_Number'];
        $aggressiveBehavior = $lastValues['aggressive_Behavior'];
        $inadequateBehavior = $lastValues['inadequate_Behavior'];

        // Récupérer la dernière valeur de delay_Number, l'incrémenter de 1
        $delay_Number = self::getDelayNumber($user_ID) + 1;
        $snitchid = $_COOKIE["user_id"];
        $snitchname = $_COOKIE["user_firstname"];
        // Insérer la nouvelle pénalité avec le nombre d'occurrences actuel
        $sql = "INSERT INTO infraction (user_ID, delay_Number, insult_Number, aggressive_Behavior, inadequate_Behavior, snitch_ID, snitch_name, penality_Type) VALUES (?, ?, ?, ?, ?, ?, ?, ?);";
        $stmt = $bdd->prepare($sql);
        $stmt->execute([$user_ID, $delay_Number, $insultNumber, $aggressiveBehavior, $inadequateBehavior, $snitchid, $snitchname, $selectedDelay]);
    }


    public static function getPenalityLibelle(int $infraction_ID): string {
        $bdd = new PDO('mysql:host=localhost;dbname=dbswearjar;charset=utf8mb4', 'root', '');
        $sql = "SELECT penality_type FROM `infraction` WHERE infraction_ID = ?;";
        $stmt = $bdd->prepare($sql);
        $stmt->bindValue(1, $infraction_ID, PDO::PARAM_INT);
        $stmt->execute();
        $result = $stmt->fetchColumn();
        return $result;
    }


    /*
    made by @Dylan
    */
    // Fonction pour récupérer la dernière valeur de delay_Number
    public static function getDelayNumber($user_ID) {
        $bdd = new PDO('mysql:host=localhost;dbname=dbswearjar;charset=utf8mb4', 'root', '');
        $sql = "SELECT COALESCE(MAX(delay_Number), 0) as 'Max Delay' FROM infraction WHERE user_ID = ?;";
        $stmt = $bdd->prepare($sql);
        $stmt->execute([$user_ID]);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result ? $result['Max Delay'] : 0;
    }

    /*
    made by @Dylan
    */
    // Fonction pour récupérer les dernières valeurs de insult_Number, aggressive_Behavior et inadequate_Behavior
    private static function getLastPenalityValues($user_ID) {
        $bdd = new PDO('mysql:host=localhost;dbname=dbswearjar;charset=utf8mb4', 'root', '');
        // Récupérer la dernière valeur de insult_Number, aggressive_Behavior et inadequate_Behavior
        $sql = "SELECT insult_Number, aggressive_Behavior, inadequate_Behavior FROM infraction WHERE user_ID = ? ORDER BY infraction_ID DESC LIMIT 1";
        $stmt = $bdd->prepare($sql);
        $stmt->execute([$user_ID]);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result ? $result : ['insult_Number' => 0, 'aggressive_Behavior' => 0, 'inadequate_Behavior' => 0];
    }

    /*
    made by @Amelie
    */
    // displays all the infractions of a user, using class Infraction
    public static function readPersonalHistory($user_ID): array{
        $bdd = new PDO('mysql:host=localhost;dbname=dbswearjar;charset=utf8mb4', 'root', '');
        $sql = "SELECT infraction.* FROM infraction WHERE user_ID = ? ORDER BY infraction_ID DESC;";
        $stmt = $bdd->prepare($sql);
        $stmt->execute([$user_ID]);
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $infractions = [];
        foreach ($results as $result) {
            $infraction = new Infraction(
                $result['user_ID'],
                $result['delay_Number'],
                $result['insult_Number'],
                $result['aggressive_Behavior'],
                $result['inadequate_Behavior'],
                $result['payment_Status'],
                $result['total_to_pay'],
                $result['penality_type'],
                $result['date_Infraction'],
                $result['snitch_ID'],
                $result['snitch_name']
            );
            $infraction->setInfraction_ID($result['infraction_ID']);
        $infractions[] = $infraction;
        }
        return $infractions;
    }


    /*
    made by @Amelie
    */
    // validate the payment of an infraction
    public static function validatePayment($infraction_ID): bool {
        $bdd = new PDO('mysql:host=localhost;dbname=dbswearjar;charset=utf8mb4', 'root', '');
        $sql = "UPDATE infraction SET payment_Status = true, total_to_pay = 0 WHERE infraction_ID = ?;";
        $stmt = $bdd->prepare($sql);
        $stmt->execute([$infraction_ID]);
        return true;
    }

    /*
    made by @Amelie
    */
    // cancel the payment of an infraction
    public static function cancelPayment($penalityAmount,$infraction_ID): bool {
    $bdd = new PDO('mysql:host=localhost;dbname=dbswearjar;charset=utf8mb4', 'root', '');
    // Mettre à jour la colonne payment_Status et total_to_pay
    $sql = "UPDATE infraction SET payment_Status = false, total_to_pay = ? WHERE infraction_ID = ?;";
    $stmt = $bdd->prepare($sql);
    $stmt->execute([$penalityAmount, $infraction_ID]);
    return true;
    }

    /*
    made by @Amelie
    */
    // returns the number of insults said by one user
    public static function insultCount(): int{
        $bdd = new PDO('mysql:host=localhost;dbname=dbswearjar;charset=utf8mb4', 'root', '');
        $sql = "SELECT COUNT(*) AS insultCount FROM infraction WHERE user_ID = ?;";
        $stmt= $bdd->prepare($sql);
        $stmt->execute([]);
        // Récupérer le résultat de la requête sous forme de tableau
        $listInfractions = $stmt->fetch(PDO::FETCH_ASSOC);
        // retourne la valeur "insult_Number" du tableau
        return $listInfractions['insult_Number'];
    }

    /*
    made by @Amelie
    */
    // returns the number of delays of one user
    public static function delayCount(): int{
        $bdd = new PDO('mysql:host=localhost;dbname=dbswearjar;charset=utf8mb4', 'root', '');
        $sql = "SELECT COUNT(*) AS delayCount FROM infraction WHERE user_ID = ?;";
        $stmt= $bdd->prepare($sql);
        $stmt->execute([]);
        // Récupérer le résultat de la requête sous forme de tableau
        $listInfractions = $stmt->fetch(PDO::FETCH_ASSOC);
        // retourne la valeur "delay_Number" du tableau
        return $listInfractions['delay_Number'];
    }

    /*
    made by @Amelie
    */
    // returns the number of aggressive behaviors of one user
    public static function aggressiveBehaviorCount(): int{
        $bdd = new PDO('mysql:host=localhost;dbname=dbswearjar;charset=utf8mb4', 'root', '');
        $sql = "SELECT COUNT(*) AS aggressiveBehaviorCount FROM infraction WHERE user_ID = ?;";
        $stmt= $bdd->prepare($sql);
        $stmt->execute([]);
        // Récupérer le résultat de la requête sous forme de tableau
        $listInfractions = $stmt->fetch(PDO::FETCH_ASSOC);
        // retourne la valeur "aggressive_Behavior" du tableau
        return $listInfractions['aggressive_Behavior'];
    }

    /*
    made by @Amelie
    */
    // returns the number of inadequate behaviors of one user
    public static function inadequateBehaviorCount(): int{
        $bdd = new PDO('mysql:host=localhost;dbname=dbswearjar;charset=utf8mb4', 'root', '');
        $sql = "SELECT COUNT(*) AS inadequateBehaviorCount FROM infraction WHERE user_ID = ?;";
        $stmt= $bdd->prepare($sql);
        $stmt->execute([]);
        // Récupérer le résultat de la requête sous forme de tableau
        $listInfractions = $stmt->fetch(PDO::FETCH_ASSOC);
        // retourne la valeur "inadequate_Behavior" du tableau
        return $listInfractions['inadequate_Behavior'];
    }

    // compte le montant total dû par l'utilisateur
    // author : @lorena
    public static function totalToPay($user_ID):mixed{
        $bdd = new PDO('mysql:host=localhost;dbname=dbswearjar;charset=utf8mb4', 'root', '');
        $sql = "SELECT total_debt FROM users WHERE user_ID=?;";
        $stmt= $bdd->prepare($sql);
        $stmt->execute([$user_ID]);
        $total = $stmt->fetchColumn();
        return $total;
    }

    // compte le total de dette à régler de toute la classe
    // made by @lorena
    public static function totalAllDebt():mixed{
        $bdd = new PDO('mysql:host=localhost;dbname=dbswearjar;charset=utf8mb4', 'root', '');
        $sql = "SELECT SUM(total_to_pay) FROM infraction;";
        $stmt= $bdd->prepare($sql);
        $stmt->execute([]);
        $total = $stmt->fetchColumn();
        return $total;
    }

    // compte le total d'insultes dit par toute la classe
    // made by @lorena
    public static function totalAllInsults():mixed{
        $bdd = new PDO('mysql:host=localhost;dbname=dbswearjar;charset=utf8mb4', 'root', '');
        $sql = "SELECT SUM(total_insults) AS sum_of_max_insults
        FROM (
            SELECT MAX(insult_number) AS total_insults
            FROM infraction
            GROUP BY user_ID
        ) AS max_insults;";
        $stmt= $bdd->prepare($sql);
        $stmt->execute([]);
        $total = $stmt->fetchColumn();
        return $total;
    }


    // enregistre le nouveau mot de passe
    // author : @lorena
    public static function resetPassword($password, $user_id): void {
        $bdd = new PDO('mysql:host=localhost;dbname=dbswearjar;charset=utf8mb4', 'root', '');
        $sql = "UPDATE users SET password = :password WHERE user_ID = :id";
        $stmt = $bdd->prepare($sql);
        $stmt->bindValue(':password', $password, PDO::PARAM_STR);
        $stmt->bindValue(':id', $user_id, PDO::PARAM_INT);
        $stmt->execute();
    }

    // vérifie si le mot de passe rentré par l'utilisateur correspond au mot de passe en base de données
    // made by @lorena
    public static function verifPassword($pas1, $pas2): bool {
        if ($pas1==$pas2) {
            return true;
        }else{
            return false;
        }
    }

    // retourne l'utilisateur avec le moins d'infractions à son actif
    // Made by @Lorena
    public static function findMRP():mixed{
        $bdd = new PDO('mysql:host=localhost;dbname=dbswearjar;charset=utf8mb4', 'root', '');
        $sql = "SELECT u.firstname
        FROM users u
        LEFT JOIN (
            SELECT
                user_ID,
                COALESCE(MAX(insult_number), 0) + COALESCE(MAX(delay_number), 0) + COALESCE(MAX(aggressive_Behavior), 0) + COALESCE(MAX(inadequate_Behavior), 0) AS total_sum
            FROM infraction
            GROUP BY user_ID
        ) i ON u.user_ID = i.user_ID
        ORDER BY i.total_sum ASC
        LIMIT 1;";
        $stmt= $bdd->prepare($sql);
        $stmt->execute([]);
        $result = $stmt->fetchColumn();
            return $result;
    }


// displays the best 10 Snitches
    // author @lorena &  @Amelie
    public static function readSnitches():array{
        $bdd = new PDO('mysql:host=localhost;dbname=dbswearjar;charset=utf8mb4', 'root', '');
        $sql = "SELECT i.snitch_ID, COUNT(snitch_ID) as count ,u.name, u.firstname, u.mail, u.tel FROM users u JOIN infraction i ON u.user_id = i.snitch_ID GROUP BY snitch_ID ORDER BY count DESC LIMIT 10";
        $stmt = $bdd->prepare($sql);
        $stmt->execute();
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $snitches = [];
        foreach ($results as $result) {
            $snitch = new User(
                $result['name'],
                $result['firstname'],
                $result['tel'],
                $result['mail'],
                " ",
                " ",
                $result['address']
            );
            $snitch->setUser_ID($result['snitch_ID']);
            $snitches[] = $snitch;
        }

        return $snitches;
    }


    // displays the best Snitch
    // author @lorena
    public static function readBestSnitch(): User {
        $bdd = new PDO('mysql:host=localhost;dbname=dbswearjar;charset=utf8mb4', 'root', '');
            $sql = " SELECT *
            FROM users
            WHERE user_ID = (
                SELECT snitch_ID
                FROM (
                    SELECT snitch_ID, COUNT(snitch_ID) as count
                    FROM infraction
                    GROUP BY snitch_ID
                    ORDER BY count DESC
                    LIMIT 1
                ) AS top_snitches
            );
                ";
        $stmt = $bdd->prepare($sql);
        $stmt->execute();
        $results = $stmt->fetch(PDO::FETCH_ASSOC);
        $bestSnitch = new User(
                $results['name'],
                $results['firstname'],
                $results['tel'],
                $results['mail'],
                $results['login'],
                "",
                $results['address']
        );
        return $bestSnitch;
    }

    //Renvoie le nombre d'insulte total pour best snitches
    // author @lorena
    public static function totalInsultSnitches():mixed{
        $bdd = new PDO('mysql:host=localhost;dbname=dbswearjar;charset=utf8mb4', 'root', '');
        $sql = "SELECT SUM(total_sum) AS sum_of_max_insults
        FROM (
            SELECT user_ID, MAX(insult_number) + MAX(delay_number) + MAX(aggressive_Behavior) + MAX(inadequate_Behavior) AS total_sum
            FROM infraction
            WHERE user_ID IN (
                SELECT snitch_ID
                FROM (
                    SELECT snitch_ID, COUNT(snitch_ID) AS count
                    FROM infraction
                    GROUP BY snitch_ID
                    ORDER BY count DESC
                    LIMIT 10
                ) AS top_insult_snitch
            )
            GROUP BY user_ID
        ) AS max_insults";
        $stmt= $bdd->prepare($sql);
        $stmt->execute();
        $total = $stmt->fetchColumn();
        return $total;
    }

    //A revoir avec ID de session
    // author @lorena
    public static function totalPersonalInsult($user_ID){
        $bdd = new PDO('mysql:host=localhost;dbname=dbswearjar;charset=utf8mb4', 'root', '');
        $sql = "SELECT MAX(insult_Number) AS total_insults FROM infraction WHERE user_ID = ?";
        $stmt= $bdd->prepare($sql);
        $stmt->execute([$user_ID]);
        $total = $stmt->fetchColumn();
        return $total;
    }

    //renvoie la différence de délits entre le user et MRP. A revoir avec ID de session
    // author @lorena
    public static function howFarFromMRP($user_ID){
        $bdd = new PDO('mysql:host=localhost;dbname=dbswearjar;charset=utf8mb4', 'root', '');
        $sql = "SELECT
        (SELECT MAX(insult_Number) + MAX(delay_Number) + MAX(aggressive_Behavior) + MAX(inadequate_Behavior) AS total_sum
        FROM infraction
        WHERE user_ID = ?) -
        COALESCE(
            (SELECT COALESCE(MIN(i.total_sum), 0) AS lowest_total_sum
                FROM users u
                LEFT JOIN (
                    SELECT
                        user_ID,
                        COALESCE(MAX(insult_number), 0) + COALESCE(MAX(delay_number), 0) + COALESCE(MAX(aggressive_Behavior), 0) + COALESCE(MAX(inadequate_Behavior), 0) AS total_sum
                    FROM infraction
                    GROUP BY user_ID
                ) i ON u.user_ID = i.user_ID
                WHERE NOT EXISTS (
                    SELECT 1
                    FROM infraction
                    WHERE user_ID = u.user_ID
                )
                ORDER BY lowest_total_sum ASC
                LIMIT 1), 0
        ) AS difference;";

        $stmt= $bdd->prepare($sql);
        $stmt->execute([$user_ID]);
        $total = $stmt->fetchColumn();
        return $total;
    }


    // get Penalities list from DB using class Penality
    // author @Amelie
    public static function readPenalities(): array {
        $bdd = new PDO('mysql:host=localhost;dbname=dbswearjar;charset=utf8mb4', 'root', '');
        $sql = 'SELECT * FROM `penality`;';
        $stmt = $bdd->prepare($sql);
        $stmt->execute();
        // Fetch all rows as associative arrays
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        // Initialize an array to store Penality instances
        $penalities = [];
        // Create a Penality instance for each row in the result set
        foreach ($results as $result) {
            $penality = new Penality($result['penality_type'], $result['fee'], $result['notes']);
            $penalities[] = $penality;
        }
        return $penalities;
    }


    // author @lorena
    public static function totalStudents(): int{
        $bdd = new PDO('mysql:host=localhost;dbname=dbswearjar;charset=utf8mb4', 'root', '');
        $sql = "SELECT COUNT(*) AS total_rows FROM users;";
        $stmt = $bdd->prepare($sql);
        $stmt->execute();
        $total = $stmt->fetchColumn();
        return $total;
    }

    //renvoie la date et l'heure de la dernière insulte
    // author @lorena
    public static function lastInsultCheckedDate():String{
        $bdd = new PDO('mysql:host=localhost;dbname=dbswearjar;charset=utf8mb4', 'root', '');
        $sql = "SELECT date_Infraction AS last_hourDate
                FROM infraction
                WHERE insult_Number IS NOT NULL AND insult_Number != 0
                ORDER BY date_Infraction DESC
                LIMIT 1;";
        $stmt = $bdd->prepare($sql);
        $stmt->execute();
        $total = $stmt->fetchColumn();
        return $total;
    }
    //renvoie la date et l'heure de la dernière infraction
    // author @lorena
    public static function lastInfractionCheckedDate():String{
        $bdd = new PDO('mysql:host=localhost;dbname=dbswearjar;charset=utf8mb4', 'root', '');
        $sql = "SELECT MAX(date_Infraction) AS last_hourDate FROM infraction;";
        $stmt = $bdd->prepare($sql);
        $stmt->execute();
        $lastInfractionDate = $stmt->fetchColumn();

        // Convertir la date en objet DateTime
        $dateTime = new DateTime($lastInfractionDate);
        $currentDate = new DateTime();

        // Calculer la différence entre les deux dates
        $interval = $currentDate->diff($dateTime);

        // Formater la date en fonction de la différence
        if ($interval->days == 0) {
            $formattedDate = "Today, " . $dateTime->format('H:i');
        } elseif ($interval->days == 1) {
            $formattedDate = "Yesterday, " . $dateTime->format('H:i');
        } else {
            $formattedDate = $interval->days . " days ago";
        }

        return $formattedDate;
    }
    /*
    vérifie si un e-mail existe dans la base de donnée
    Author  @Amelie
    */
    public static function doesMailExist($mail): bool {
        $bdd = new PDO('mysql:host=localhost;dbname=dbswearjar;charset=utf8mb4', 'root', '');
        $sql = "SELECT mail FROM users WHERE mail= ?";
        $stmt = $bdd->prepare($sql);
        $stmt->execute([$mail]);
        $mail = $stmt->fetch();
        if ($mail) {
            return true;
        } else {
            return false;
        }
    }

    /** Made by @Amelie
     *
     * @param int $length      How many characters do we want?
     * @param string $keyspace A string of all possible characters
     *                         to select from
     */
    public static function random_password($length, $keyspace = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ'): String {
        $str = '';
        $max = mb_strlen($keyspace, '8bit') - 1;
        if ($max < 1) {
            throw new Exception('$keyspace must be at least two characters long');
        }
        for ($i = 0; $i < $length; ++$i) {
            $str .= $keyspace[random_int(0, $max)];
        }
        return $str;
    }

    /* Anti-doublon lors de l'inscriptions
    Author  @Abdelkarim */

    public static function doesAccountExist($mail,$login): bool {
        $bdd = new PDO('mysql:host=localhost;dbname=dbswearjar;charset=utf8mb4', 'root', '');
        $sql1 = "SELECT mail,login FROM users WHERE mail = ? AND login = ? ";

        $stmt = $bdd->prepare($sql1);
        $stmt->execute([$mail,$login]);
        $login = $stmt->fetch();
        $mail = $stmt->fetch();
        if ($mail && $login) {
            return true;
        } else {
            return false;
        }

    }

    // Made by @Dylan
    // get the user role
    public static function updateUser($user_ID): void {
        $bdd = new PDO('mysql:host=localhost;dbname=dbswearjar;charset=utf8mb4', 'root', '');
        $sql = "SELECT `rank` FROM `users` WHERE user_ID = ?";
        $stmt = $bdd->prepare($sql);
        $stmt->execute([$user_ID]);
        $userRank = $stmt->fetchColumn();
    }

    public static function userRole($user_ID) {
        $bdd = new PDO('mysql:host=localhost;dbname=dbswearjar;charset=utf8mb4', 'root', '');
        $sql = "SELECT rank FROM users WHERE user_id = ?";
        $stmt = $bdd->prepare($sql);
        $stmt->execute([$user_ID]);
        $result = $stmt->fetchColumn();
        if ($result === false) {
            // Handle the case where user_id is not found
            return "Unknown Role";
        }
        switch ($result) {
            case 100:
                return "Admin";
            case 10:
                return "Moderator";
            case 5:
                return "Auditor";
            default:
                return "User";
        }
    }


}

?>
