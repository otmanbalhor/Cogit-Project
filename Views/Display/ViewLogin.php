<body>
    <main class="m-8">
        <span class="relative inline-block m-4">
            <span class="absolute inset-y-10 right-0 w-1/2 h-1/2 bg-blue-500"></span>
            <span class="relative z-10 text-6xl font-extrabold leading-14 tracking-wide text-left m-8">Login</span>
        </span>

        <?php

        $msg = $login;

        ?>
        <div class="flex items-center justify-center m-8">
            <div class="bg-gray-200 rounded shadow-md w-1/3 p-4 m-8">
                <form action="" method="POST">
                    <div class="flex flex-row mb-6">
                        <div class="mb-3 space-y-2 w-full mr-2">
                            <label for="email">E-mail</label>
                            <input id="email" type="email" placeholder="Email" name="email" required class="border rounded px-3 py-2 w-full focus:outline-none focus:ring focus:border-blue-300">
                        </div>
                        <div class="mb-3 space-y-2 w-full">
                            <label for="password">Password</label>
                            <input type="password" placeholder="Password" name="password" required class="border rounded px-3 py-2 w-full focus:outline-none focus:ring focus:border-blue-300">
                        </div>
                    </div>
                    <div>
                        <input type="submit" value="Sign in" name="signin" class="transition ease-in-out delay-150 bg-blue-500 hover:-translate-y-1 hover:scale-110 hover:bg-blue-700 duration-100 text-white font-bold py-2 px-4 rounded">
                    </div>

                </form>
                <?php
                if ($msg) {
                ?>
                    <p><?php echo $msg ?></p>
                <?php
                }
                ?>
            </div>
        </div>
    </main>
</body>
<span class="bg-blue-200 text-gray-800 p-4  flex justify-between items-center">
    <p class="text-6xl font-extrabold ml-20 ">WORK BETTER IN YOUR COMPANY</p>
    <img class="rounded-full w-1/4 h-1/4 m-20" src="Assets/img/logo.jpg" alt="">
</span>