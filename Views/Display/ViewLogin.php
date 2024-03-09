<body>
    <h2>Login</h2>
    <?php

    $erroMsg = "";
    try {
        $database = new PDO(
            "mysql:host=localhost;dbname=cogip;charset=utf8",
            'root',
            ''
        );
        $database->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        echo 'Erreur :' . $e->getMessage();
    }
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $email = $_POST["email"];
        $password = $_POST["password"];

        if ($email != "" && $password != "") {
            $req = $database->prepare("SELECT * FROM signup WHERE email = :email");
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

                    header('Location: ViewDashboard.php');
                    exit();
                } else {
                    $erroMsg = "Email or password wrong!";
                }
            } else {
                $erroMsg = "Email or password wrong!";
            }
        }
    }
    ?>
    <form action="" method="POST">
        <div>
            <label for="email">E-mail</label>
            <input type="email" placeholder="Email" name="email" required>
        </div>
        <div>
            <label for="password">Password</label>
            <input type="password" placeholder="Password" name="password" required>
        </div>
        <div>
            <input type="submit" value="Sign in" name="signin">
        </div>
    </form>
    <?php
    if ($erroMsg) {
    ?>
        <p><?php echo $erroMsg ?></p>
    <?php
    }
    ?>

</body>