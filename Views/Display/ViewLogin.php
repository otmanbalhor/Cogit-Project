<body>
    <h2>Login</h2>
    <?php

    $msg = $login;
   
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
    if ($msg) {
    ?>
        <p><?php echo $msg ?></p>
    <?php
    }
    ?>

</body>