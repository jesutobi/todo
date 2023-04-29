<?php
session_start();
if (isset($_SESSION["user"])) {
    header("Location:../index.php");
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="../main.css">
</head>

<body class="relative bodydivide">
   
    <div class="grid grid-cols-12 ">
        <div class="col-span-6">
            <?php include('authSlider.php') ?>

        </div>
        <div class="col-span-6 py-20">
            <div class="">
                <div class="  w-8/12   mx-auto  py-7  rounded-lg">
                    <div class="">
                        <div class="text-center">
                            <!-- title -->
                            <div class="pt-3">
                                <h4 class="font-bold text-lg ">Login into your account</h4>
                            </div>
                            <div class="text-sm">
                                <span>Its free and easy</span>
                            </div>
                        </div>
                        <!-- forms -->
                        <div class="px-10 py-5">
                            <form action="../api//api-login-todo.php" method="POST">
                                <!--first name -->
                                <div class="py-3">
                                    <div class="text-sm font-bold py-2">
                                        <label for="">Enter your email address</label>
                                    </div>
                                    <div>
                                        <input type="email" placeholder="Email address" name="email" class="w-full text-sm p-3 rounded-md border ">
                                    </div>
                                    <!--email  error -->
                                    <div>
                                        <span class="text-red-600 text-sm">
                                            <?php if (isset($_SESSION["errors"]["email_addressEr_login"]))
                                                echo $_SESSION["errors"]["email_addressEr_login"];
                                            ?>
                                        </span>
                                    </div>
                                </div>

                                <!--password -->
                                <div class="py-3">
                                    <div class="text-sm font-bold py-2">
                                        <label for="">Enter your passsword</label>
                                    </div>
                                    <div>
                                        <input type="password" class="w-full text-sm p-3 rounded-md border" value="" name="password" placeholder="password">
                                    </div>
                                    <!--password  error -->
                                    <div>
                                        <span class="text-red-600 text-sm">
                                            <?php if (isset($_SESSION["errors"]["passwordEr_login"]))
                                                echo $_SESSION["errors"]["passwordEr_login"];
                                            ?>
                                        </span>
                                    </div>
                                </div>

                                <!-- register button -->
                                <div class="flex justify-center my-3">
                                    <button name="login" value="login" class="rounded-md bg-[#5d5398] w-40  p-2 text-white font-bold">
                                        Login
                                    </button>
                                </div>
                                <!-- login -->
                                <div class="flex align-center text-xs justify-center">
                                    <div>
                                        <span>Don't have an account?</span>
                                    </div>
                                    <div class="px-1">
                                        <a class="" href="register.php">Register</a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>
</body>

</html>