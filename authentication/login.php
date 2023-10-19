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

<body class="relative bodydivide font1">

    <div class="md:grid grid-cols-12 ">
        <div class="col-span-6 max-[768px]:hidden">
            <?php include('authSlider.php') ?>

        </div>
        <div class="col-span-6 py-20">
            <div class="">
                <div class=" w-full  sm:w-8/12   sm:mx-auto  py-7  rounded-lg">
                    <div class="">
                        <div class="text-center">
                            <!-- title -->
                            <div class="pt-3">
                                <span class="font-bold text-base ">Login into your account</span>
                            </div>
                            <div class="text-sm">
                                <span>Its free and easy</span>
                            </div>
                        </div>
                        <!-- forms -->
                        <div class=" px-4 sm:px-10 py-5">
                            <!-- <form > -->
                            <!--first name -->
                            <div class="py-3">
                                <div class="text-sm font-bold py-2">
                                    <label for="">Enter your email address</label>
                                </div>
                                <div class="w-full">
                                    <input type="email" placeholder="Email address" id="email" name="email" class="w-full outline-1 outline-[#5d5398] text-sm p-3 rounded-md border ">
                                </div>
                                <!--email  error -->
                                <div class="text-xs sm:text-sm">
                                    <span id="emailerrorAlert" class="py-2">

                                    </span>
                                </div>
                                <div class="text-xs sm:text-sm">
                                    <span id="emailsuccessAlert" class="py-2">

                                    </span>
                                </div>
                            </div>

                            <!--password -->
                            <div class="py-3">
                                <div class="text-sm font-bold py-2">
                                    <label for="">Enter your passsword</label>
                                </div>
                                <div>
                                    <input type="password" id="password" class="w-full outline-1 outline-[#5d5398] text-sm p-3 rounded-md border" value="" name="password" placeholder="password">
                                </div>
                                <!--password  error -->
                                <div class="text-xs sm:text-sm">
                                    <span id="passworderrorAlert" class="py-2">

                                    </span>
                                </div>
                                <!--success -->
                                <div class="text-xs sm:text-sm">
                                    <span id="passwordSu_login" class="py-2">

                                    </span>
                                </div>
                            </div>

                            <!-- register button -->
                            <div class="flex justify-center my-3">
                                <button name="login" onclick="login()" class="rounded-md bg-[#5d5398] w-40 hover:text-[#fbc72e]  p-2 text-white font-bold">
                                    Login
                                </button>
                            </div>
                            <!-- login -->
                            <div class="flex align-center text-xs justify-center">
                                <div>
                                    <span>Don't have an account?</span>
                                </div>
                                <div class="px-1 ">
                                    <a href="register.php" class="text-[#5d5398] font-semibold">Register</a>
                                </div>
                            </div>
                            <!-- </form> -->
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>
    <!-- <script>
        function login() {
            alert('hello')
        }
    </script> -->
    <script src="../js/login.js"></script>
</body>

</html>