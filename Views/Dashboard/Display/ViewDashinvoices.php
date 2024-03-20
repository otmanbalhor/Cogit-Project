<div class="w-full bg-white m-4 ">
    <div class="relative flex flex-col m-8">
        <div class="max-w-xl min-w-full mx-auto p-4">
    <span class="relative inline-block m-4">
        <span class="absolute inset-y-10 right-0 w-1/2 h-1/2 bg-[#f87171]"></span>
        <span class="relative z-10 text-6xl font-extrabold leading-14 tracking-wide text-left">NEW INVOICE</span>
    </span>
    
    </div>
<div class="flex text-2xl font-bold max-w-xl min-w-full mx-auto bg-gray-200 rounded-lg p-4">
    <?php
    session_start();

    $username = '';

    if (isset($_SESSION["username"])){
        $username = $_SESSION["username"];
        echo "Welcome back " . $username;
    } else {
        header("Location: ViewLogin.php");
        exit();
    }
    ?>
   </div> 
   <img class="absolute right-0 w-1/8 rounded-full"src="Assets/img/dash_petit.jpg" alt="">
    </div>
    <div class="grid grid-cols-1 m-8">
    <div class="max-w-xl min-w-full mx-auto bg-gray-200 rounded-lg p-4 m-8">
    <div class="mb-4">
        <input type="text" name="ref" placeholder="Reference" required class="w-full px-3 py-2 border rounded-md ">
    </div>
    <div class="mb-4">
        <input type="text" name="price" placeholder="Price" required class="w-full px-3 py-2 border rounded-md">
    </div>
    <div class="mb-4">
        <input type="text" name="company_name" placeholder="Company name" required class="w-full px-3 py-2 border rounded-md">
    </div>
    
    <input type="submit" name="ok" value="Save" required class="transition ease-in-out delay-150 bg-blue-500 hover:-translate-y-1 hover:scale-110 hover:bg-blue-700 duration-100 text-white font-bold py-2 px-4 rounded">
    </div>
    </div>
</form>
