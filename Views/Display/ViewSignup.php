<body>

    <div class="flex items-center justify-center m-4">
        <div class="bg-gray-200 rounded shadow-md w-3/4 p-4">
            <h2 class="text-2xl font-bold text-center mb-6">SIGN UP</h2>

            <form class="flex flex-col" action="" method="POST">

                <div class="flex flex-row mb-6">
                    <div class="mb-3 space-y-2 w-full mr-2">
                        <label for="firstname">First Name <span class="text-red-500">*</span></label>
                        <input type="text" name="firstname" placeholder="First" required class="border rounded px-3 py-2 w-full focus:outline-none focus:ring focus:border-blue-300">
                    </div>
                    <div class="mb-3 space-y-2 w-full">
                        <label for="lastname">Last Name <span class="text-red-500">*</span></label>
                        <input type="text" name="lastname" placeholder="Last" required class="border rounded px-3 py-2 w-full focus:outline-none focus:ring focus:border-blue-300">
                    </div>
                </div>


                <div class="flex flex-row mb-6">
                    <div class="mb-3 space-y-2 w-full mr-2">
                        <label for="email">E-mail <span class="text-red-500">*</span></label>
                        <input type="email" name="email" placeholder="Email" required class="border rounded px-3 py-2 w-full focus:outline-none focus:ring focus:border-blue-300">
                    </div>
                    <div class="mb-3 space-y-2 w-full">
                        <label for="password">Password <span class="text-red-500">*</span></label>
                        <input type="password" name="password" placeholder="Password" required class="border rounded px-3 py-2 w-full focus:outline-none focus:ring focus:border-blue-300">
                    </div>
                </div>

                <div class="mb-6">
                    <label for="phone">Phone <span class="text-red-500">*</span></label>
                    <input type="text" name="phone" placeholder="Phone" required class="border rounded px-3 py-2 w-full focus:outline-none focus:ring focus:border-blue-300">
                </div>

                <div class="flex flex-col mb-6">
                    <div class="mb-3 space-y-2 w-full">
                        <label for="city">City</label>
                        <input type="text" name="city" placeholder="City" class="border rounded px-3 py-2 w-full focus:outline-none focus:ring focus:border-blue-300">
                    </div>
                    <div class="mb-3 space-y-2 w-full">
                        <label for="country">Country</label>
                        <input type="text" name="country" placeholder="Country" class="border rounded px-3 py-2 w-full focus:outline-none focus:ring focus:border-blue-300">
                    </div>
                    <div class="mb-3 space-y-2 w-full">
                        <label for="zip">Zip Code</label>
                        <input type="text" name="zip" placeholder="Zip Code" class="border rounded px-3 py-2 w-full focus:outline-none focus:ring focus:border-blue-300">
                    </div>
                </div>
                <div class="flex justify-center">
                    <input type="submit" name="ok" value="Submit" class="bg-blue-500 font-bold text-white px-4 py-2 rounded hover:bg-blue-700 focus:outline-none focus:ring focus:border-blue-300">
                </div>

            </form>
        </div>
    </div>

</body>