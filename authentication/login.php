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
                <div class="  sm:w-8/12   mx-auto  py-7  rounded-lg">
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
                            <!-- <form > -->
                            <!--first name -->
                            <div class="py-3">
                                <div class="text-sm font-bold py-2">
                                    <label for="">Enter your email address</label>
                                </div>
                                <div>
                                    <input type="email" placeholder="Email address" id="email" name="email" class="w-full outline-1 outline-[#5d5398] text-sm p-3 rounded-md border ">
                                </div>
                                <!--email  error -->
                                <div>
                                    <span id="emailerrorAlert">

                                    </span>
                                </div>
                                <div>
                                    <span id="emailsuccessAlert">

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
                                <div>
                                    <span id="passworderrorAlert">

                                    </span>
                                </div>
                                <!--success -->
                                <div>
                                    <span id="passwordSu_login">

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