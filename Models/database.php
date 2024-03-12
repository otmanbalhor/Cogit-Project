<?php

class Database{

    private static $_database;

    //
    //INSTANCIE LA CONNEXION A LA DATABASE
    //
    protected static function setDatabase(){

        self::$_database = new PDO (
            "mysql:host=localhost;dbname=cogip;charset=utf8",'root',''
        );

        self::$_database->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_WARNING);
    }


    //
    //RECUPERE LA CONNEXION A LA DATABASE
    //
    protected function getDatabase(){

        if(self::$_database === null){
            self::setDatabase();
        }

        return self::$_database;
    }


    //
    //FONCTION POUR RECUPERER CHAQUE TABLES AVEC COMME PARAM LE NOM DU TABLEAU ET LA CLASSE A CREER POUR AFFICHER LES DATAS
    //
    protected function getTable($elemPerPage, $select, $table, $obj, $join, $column, $order){

        $tab = [];

        if (isset($_GET['page'])) {
            $page = max(1, intval($_GET['page']));
        } else {
            $page = 1;
        }
        $ratio = round(($page - 1) * $elemPerPage);

        $req = self::$_database->prepare('SELECT '.$select.' FROM '.$table. ' '.$join.' ORDER BY '.$column.' '.$order.' LIMIT :ratio, :elemPerPage');
        $req->bindParam(':ratio', $ratio, PDO::PARAM_INT);
        $req->bindParam(':elemPerPage', $elemPerPage, PDO::PARAM_INT);
        $req->execute();
        while($data = $req->fetch(PDO::FETCH_ASSOC)){

            //
            //crée une nouvelle instance de l'objet invoices
            //
            $tab[] = new $obj($data);

        }

        return $tab;
        $req->closeCursor();
    }

    protected function getSearch($select,$table,$obj){

        $tab = [];

        if (isset($_GET["keywords"]) && !empty($_GET["keywords"])) {

            $keywords = htmlspecialchars($_GET["keywords"]);

            $req = self::$_database->prepare('SELECT '.$select.' FROM '.$table .' WHERE '.$select.' LIKE "%'.$keywords.'%"');
            $req->execute();

            while($search = $req->fetch(PDO::FETCH_ASSOC)){

                $tab[] = new $obj($search);

                var_dump($tab);
            }

            return $tab;
        }
    }

    protected function postSignup($table){
        if(isset($_POST['ok'])){

            $firstname = $_POST["firstname"];
            $lastname = $_POST["lastname"];
            $email = $_POST["email"];
            $password = $_POST["password"];
            $phone = $_POST["phone"];
            $city = $_POST["city"];
            $country = $_POST["country"];
            $zip = $_POST["zip"];
        
            $req = self::$_database->prepare("INSERT INTO ".$table." VALUES (0, :firstname, :lastname, :email, :password, :phone, :city, :country, :zip)");
        
            $req->execute(
        
                array(
                    "firstname" => $firstname,
                    "lastname" => $lastname,
                    "email" => $email,
                    "password" => md5($password),
                    "phone" => $phone,
                    "city" => $city,
                    "country" => $country,
                    "zip" => !empty($zip) ? $zip : null
                )
            );
            $resp = $req->fetchAll(PDO::FETCH_ASSOC);
        
        } 
    }
}
