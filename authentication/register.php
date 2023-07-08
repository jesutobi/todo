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
        <div class="col-span-6 pt-8">
            <div class="">
                <div class="w-full sm:w-8/12 mx-auto  py-4  rounded-lg">
                    <div class="">
                        <div class="text-center">
                            <!-- title -->
                            <div class="pt-3">
                                <h4 class="font-bold text-base">Create your account</h4>
                            </div>
                            <div class="text-sm">
                                <span>Its free and easy</span>
                            </div>
                        </div>
                        <!-- forms -->
                        <div class="px-4 sm:px-10 py-5">

                            <!--username -->
                            <div class="py-3">
                                <div class=" font-bold py-2">
                                    <label for="" class="text-sm">Username</label>
                                </div>
                                <div>
                                    <input type="text" placeholder="Enter your firstname" class="w-full outline-1 outline-[#5d5398] text-sm p-3 rounded-md border " id="username" name="username">
                                </div>
                                <!--username  error -->
                                <div>
                                    <span class="text-[0.1rem]  py-2" id="userNameAlert">

                                    </span>
                                </div>
                            </div>

                            <!--email address -->
                            <div class="py-3">
                                <div class="text-sm font-bold py-2">
                                    <label for="">Email address</label>
                                </div>
                                <div>
                                    <input type="email" placeholder="Enter your email@address" class="w-full text-sm p-3 outline-1 outline-[#5d5398] rounded-md border" id="email" name="email">
                                </div>
                                <!-- email address error -->
                                <div>
                                    <span id="emailAlert" class="text-xs sm:text-sm py-2">

                                    </span>

                                </div>
                            </div>

                            <!--password -->
                            <div class="py-3">
                                <div class="text-sm font-bold py-2">
                                    <label for="">Enter your passsword</label>
                                </div>
                                <div>
                                    <input type="password" class="w-full text-sm p-3 outline-1 outline-[#5d5398] rounded-md border" placeholder="password" id="password" name="password">
                                </div>
                                <!--password  error -->
                                <div>
                                    <span id="passwordAlert" class="text-xs sm:text-sm py-2">

                                    </span>
                                </div>
                            </div>

                            <!-- confirm password -->
                            <div class="py-3">
                                <div class="text-sm font-bold py-2">
                                    <label for="">Confirm your passsword</label>
                                </div>
                                <div>
                                    <input type="password" class="w-full text-sm p-3 outline-1 outline-[#5d5398] rounded-md border" id="confirmpassword" placeholder="confirm password" name="confirmPassword">
                                </div>
                                <!-- <!-confirm password  error -->
                                <div>
                                    <span id="confirmpasswordAlert" class="text-xs sm:text-sm py-2">

                                    </span>


                                </div>
                            </div>
                            <!-- register button -->
                            <div class="flex justify-center my-3">
                                <button onclick="submit()" class="rounded-md hover:text-[#fbc72e] bg-[#5d5398] w-40  p-2 text-white font-bold">
                                    Register
                                </button>


                            </div>

                            <!-- login -->
                            <div class="flex align-center text-xs justify-center">
                                <div>
                                    <span>Already have an account?</span>
                                </div>
                                <div class="px-1">
                                    <a class="text-[#5d5398] font-semibold" href=" login.php">Login</a>
                                </div>
                            </div>

                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>
    <script src="../js//register.js"></script>
</body>

</html>