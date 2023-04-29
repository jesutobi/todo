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

<body class="relative font1 bodydivide">
    <div>

    </div>
    

    <div class="grid grid-cols-12 ">
        <div class="col-span-6">
            <?php include('authSlider.php') ?>
        </div>
        <div class="col-span-6 pt-8">
            <div class="">
                <div class=" w-8/12   mx-auto  py-4  rounded-lg">
                    <div class="">
                        <div class="text-center">
                            <!-- title -->
                            <div class="pt-3">
                                <h4 class="font-bold text-lg">Create your account</h4>
                            </div>
                            <div class="text-sm">
                                <span>Its free and easy</span>
                            </div>
                        </div>
                        <!-- forms -->
                        <div class="px-10 py-5">
                            <form action="../api//api-registeration-todo.php" method="POST">
                                <!--username -->
                                <div class="py-3">
                                    <div class="text-sm font-bold py-2">
                                        <label for="">Username</label>
                                    </div>
                                    <div>
                                        <input type="text" placeholder="Enter your firstname" class="w-full text-sm p-3 rounded-md border " name="username">
                                    </div>
                                    <!--username  error -->
                                    <div>
                                        <span class="text-red-600 text-sm">
                                            <?php if (isset($_SESSION["errors"]["usernameEr"]))
                                                echo $_SESSION["errors"]["usernameEr"];
                                            ?>
                                        </span>


                                    </div>
                                </div>

                                <!--email address -->
                                <div class="py-3">
                                    <div class="text-sm font-bold py-2">
                                        <label for="">Email address</label>
                                    </div>
                                    <div>
                                        <input type="email" placeholder="Enter your email@address" class="w-full text-sm p-3 rounded-md border" name="email">
                                    </div>
                                    <!-- email address error -->
                                    <div>
                                        <span class="text-red-600 text-sm">
                                            <?php if (isset($_SESSION["errors"]["email_addressEr"])) {
                                                echo $_SESSION["errors"]["email_addressEr"];
                                            }
                                            ?>
                                            </ span>

                                    </div>
                                </div>

                                <!--password -->
                                <div class="py-3">
                                    <div class="text-sm font-bold py-2">
                                        <label for="">Enter your passsword</label>
                                    </div>
                                    <div>
                                        <input type="password" class="w-full text-sm p-3 rounded-md border" placeholder="password" name="password">
                                    </div>
                                    <!--password  error -->
                                    <div>
                                        <span class="text-red-600 text-sm">
                                            <?php if (isset($_SESSION["errors"]["passwordEr"])) {
                                                echo $_SESSION["errors"]["passwordEr"];
                                            }
                                            ?>
                                        </span>

                                    </div>
                                </div>

                                <!-- confirm password -->
                                <div class="py-3">
                                    <div class="text-sm font-bold py-2">
                                        <label for="">Confirm your passsword</label>
                                    </div>
                                    <div>
                                        <input type="password" class="w-full text-sm p-3 rounded-md border" placeholder="confirm password" name="confirmPassword">
                                    </div>
                                    <!-- <!-confirm password  error -->
                                    <div>
                                        <span class="text-red-600 text-sm">
                                            <?php if (isset($_SESSION["errors"]["passwordRepeatEr"])) {
                                                echo $_SESSION["errors"]["passwordRepeatEr"];
                                            }
                                            ?>
                                        </span>

                                    </div>
                                </div>
                                <!-- register button -->
                                <div class="flex justify-center my-3">
                                    <button name="submit" value="submit" class="rounded-md bg-[#5d5398] w-40  p-2 text-white font-bold">
                                        Register
                                    </button>


                                </div>
                                <div class="text-center">
                                    <!-- alert -->
                                    <div class="px-1">
                                        <span class="text-green-600 text-sm "><?php if (isset($_SESSION['success']['success_register'])) {
                                                                                    echo $_SESSION['success']['success_register'];
                                                                                } ?></span>
                                    </div>
                                    <div class="px-1">
                                        <span class="text-red-600 text-sm "><?php if (isset($_SESSION['errors']['failed_register'])) {
                                                                                echo $_SESSION['errors']['failed_register'];
                                                                            } ?></span>
                                    </div>
                                </div>
                                <!-- login -->
                                <div class="flex align-center text-xs justify-center">
                                    <div>
                                        <span>Already have an account?</span>
                                    </div>
                                    <div class="px-1">
                                        <a class="" href=" login.php">Login</a>
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