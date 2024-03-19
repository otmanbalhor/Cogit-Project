<?php

class Database
{

    private static $_database;

    //
    //INSTANCIE LA CONNEXION A LA DATABASE
    //
    protected static function setDatabase()
    {

        self::$_database = new PDO(
            "mysql:host=localhost;dbname=cogip;charset=utf8",
            'root',
            ''
        );

        self::$_database->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
    }


    //
    //RECUPERE LA CONNEXION A LA DATABASE
    //
    protected function getDatabase()
    {

        if (self::$_database === null) {
            self::setDatabase();
        }

        return self::$_database;
    }


    //
    //FONCTION POUR RECUPERER CHAQUE TABLES AVEC COMME PARAM LE NOM DU TABLEAU ET LA CLASSE A CREER POUR AFFICHER LES DATAS
    //
    protected function getTable($ratio, $elemPerPage, $select, $table, $obj, $join, $column, $order)
    {

        $tab = [];

        $page = '';

        if (isset($_GET['page'])) {
            $page = max(1, intval($_GET['page']));
        } else {
            $page = 1;
        }

        $ratio = round(($page - 1) * $elemPerPage);

        $req = self::$_database->prepare('SELECT ' . $select . ' FROM ' . $table . ' ' . $join . ' ORDER BY ' . $column . ' ' . $order . ' LIMIT :ratio, :elemPerPage');
        $req->bindParam(':ratio', $ratio, PDO::PARAM_INT);
        $req->bindParam(':elemPerPage', $elemPerPage, PDO::PARAM_INT);
        $req->execute();
        while ($data = $req->fetch(PDO::FETCH_ASSOC)) {

            //
            //crée une nouvelle instance de l'objet invoices
            //
            $tab[] = new $obj($data);
        }

        return $tab;
        $req->closeCursor();
    }

    protected function postSignup($table)
    {
        if (isset($_POST['ok'])) {

            $firstname = $_POST["firstname"];
            $lastname = $_POST["lastname"];
            $email = $_POST["email"];
            $password = $_POST["password"];
            $phone = $_POST["phone"];
            $city = $_POST["city"];
            $country = $_POST["country"];
            $zip = $_POST["zip"];

            $req = self::$_database->prepare("INSERT INTO " . $table . " VALUES (0, :firstname, :lastname, :email, :password, :phone, :city, :country, :zip,null)");

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

    protected function login($table)
    {

        $erroMsg = "";
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $email = $_POST["email"];
            $password = $_POST["password"];

            if ($email != "" && $password != "") {
                $req = self::$_database->prepare("SELECT * FROM $table WHERE email = :email");
                $req->execute(array(
                    "email" => $email
                ));

                $resp = $req->fetchAll(PDO::FETCH_ASSOC);

                if (!empty($resp)) {
                    $user = $resp[0];

                    $hashedPwd = md5($password);

                    if ($user['password'] == $hashedPwd) {

                        session_start();

                        $_SESSION['username'] = $user['firstname'];

                        header('Location: dashboard');
                        exit();
                    } else {
                        $erroMsg = "Email or password wrong!";
                    }
                } else {
                    $erroMsg = "Email or password wrong!";
                }

                return $erroMsg;
            }
        }
    }

    public function getTotal($table)
    {
        $query = "SELECT COUNT(*) AS total FROM $table";
        $result = self::$_database->query($query);
        $total = $result->fetch(PDO::FETCH_ASSOC)['total'];
        return $total;
    }

    protected function createElemDashin($table)
    {

        session_start();

        $username = $_SESSION['username'];

        $requ = self::$_database->prepare("SELECT * FROM signup WHERE firstname = '$username' ");
        $requ->execute();

        $respo = $requ->fetchAll(PDO::FETCH_ASSOC);

        if (!empty($respo)) {
            $user = $respo[0];

            $_SESSION['role'] = $user['role'];


            if ($_SESSION['role'] != 'admin') {

                header('Location: dashboard');
                exit();
            } else {

                if (isset($_POST['ok'])) {

                    $ref = $_POST["ref"];
                    $created_at = date("Y-m-d H:i:s");
                    $price = $_POST["price"];
                    $company_name = $_POST["company_name"];

                    $request = self::$_database->prepare("
            SELECT invoices.*, companies.id AS id_company, companies.name AS company_name
            FROM $table
            INNER JOIN companies ON invoices.id_company = companies.id
            WHERE companies.name = :companyName
        ");

                    $request->execute(array(':companyName' => $company_name));

                    $invoices = $request->fetchAll(PDO::FETCH_ASSOC);

                    if (!empty($invoices)) {

                        $updated_at = date("Y-m-d H:i:s");

                        $req = self::$_database->prepare("
                    INSERT INTO $table (ref, created_at, update_at, id_company, price)
                    VALUES (:ref, :created_at, :update_at, :id_company, :price)
                ");

                        $company_id = $invoices[0]['id_company'];

                        $req->execute(array(
                            "ref" => $ref,
                            "created_at" => $created_at,
                            "update_at" => $updated_at,
                            "id_company" => $company_id,
                            "price" => $price
                        ));

                        $resp = $req->fetchAll(PDO::FETCH_ASSOC);
                    } else {

                        echo "Aucune entreprise trouvée avec le nom fourni.";
                    }
                }
            }
        }
    }

    protected function createElemDashcont($table)
    {

        session_start();

        $username = $_SESSION['username'];

        $requ = self::$_database->prepare("SELECT * FROM signup WHERE firstname = '$username' ");
        $requ->execute();

        $respo = $requ->fetchAll(PDO::FETCH_ASSOC);

        if (!empty($respo)) {
            $user = $respo[0];

            $_SESSION['role'] = $user['role'];


            if ($_SESSION['role'] != 'admin') {

                header('Location: dashboard');
                exit();
            } else {

                if (isset($_POST['ok'])) {

                    $name = $_POST["name"];
                    $company_name = $_POST["company_name"];
                    $request = self::$_database->prepare("
                    SELECT contacts.*, companies.id AS company_id, companies.name AS company_name
                    FROM $table
                    INNER JOIN companies ON contacts.company_id = companies.id
                    WHERE companies.name = :companyName
                ");


                    $request->execute(array(':companyName' => $company_name));

                    $contacts = $request->fetchAll(PDO::FETCH_ASSOC);


                    if (!empty($contacts)) {

                        $email = $_POST["email"];

                        $phone = $_POST["phone"];

                        $created_at = date("Y-m-d H:i:s");

                        $updated_at = date("Y-m-d H:i:s");


                        $req = self::$_database->prepare("
                            INSERT INTO $table (name,company_id,email,phone,created_at,update_at)
                            VALUES (:name, :company_id,:email,:phone,:created_at,:update_at)
                        ");

                        $company_id = $contacts[0]['company_id'];

                        $req->execute(array(
                            "name" => $name,
                            "company_id" => $company_id,
                            "email" => $email,
                            "phone" => $phone,
                            "created_at" => $created_at,
                            "update_at" => $updated_at
                        ));

                        $resp = $req->fetchAll(PDO::FETCH_ASSOC);
                    } else {

                        echo "Aucune entreprise trouvée avec le nom fourni.";
                    }
                }
            }
        }
    }

    protected function createElemDashcomp($table)
    {

        session_start();

        $username = $_SESSION['username'];

        $requ = self::$_database->prepare("SELECT * FROM signup WHERE firstname = '$username' ");
        $requ->execute();

        $respo = $requ->fetchAll(PDO::FETCH_ASSOC);

        if (!empty($respo)) {
            $user = $respo[0];

            $_SESSION['role'] = $user['role'];


            if ($_SESSION['role'] != 'admin') {

                header('Location: dashboard');
                exit();
            } else {

                if (isset($_POST['ok'])) {

                    $name = $_POST["name"];
                    $type = $_POST["type"];
                    $request = self::$_database->prepare("
                    SELECT companies.*, types.id AS type_id, types.name AS type_name
                    FROM $table
                    INNER JOIN types ON companies.type_id = types.id
                    WHERE types.name = :typeName
                ");


                    $request->execute(array(':typeName' => $type));

                    $companies = $request->fetchAll(PDO::FETCH_ASSOC);


                    if (!empty($companies)) {

                        $country = $_POST["country"];

                        $tva = $_POST["tva"];

                        $created_at = date("Y-m-d H:i:s");

                        $updated_at = date("Y-m-d H:i:s");


                        $req = self::$_database->prepare("
                            INSERT INTO $table (name,type_id,country,tva,created_at,update_at)
                            VALUES (:name,:type_id,:country,:tva,:created_at,:update_at)
                        ");

                        $type_id = $companies[0]['type_id'];

                        $req->execute(array(
                            "name" => $name,
                            "type_id" => $type_id,
                            "country" => $country,
                            "tva" => $tva,
                            "created_at" => $created_at,
                            "update_at" => $updated_at
                        ));

                        $resp = $req->fetchAll(PDO::FETCH_ASSOC);
                    } else {

                        echo "Aucune entreprise trouvée avec le nom fourni.";
                    }
                }
            }
        }
    }
}
