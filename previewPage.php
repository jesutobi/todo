<?php
session_start();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @font-face {
            font-family: "Montserrat";
            src: url("../todo//assets//fonts//montserrat-v25-latin-regular.woff") format("woff");
            font-weight: normal;
            font-style: normal;
        }

        @font-face {
            font-family: "Montserratbold";
            src: url("../todo//assets//fonts//Montserrat-Bold.woff") format("woff");
            font-weight: bold;
            font-style: normal;
        }

        /* fonts class */
        body {
            font-family: "Montserrat" !important;
        }

        .font1 {
            font-family: "Montserrat" !important;
        }

        .fontbold {
            font-family: "Montserratbold" !important;
        }

        .card_length {
            width: 50rem !important;
        }
    </style>
</head>

<body class=" bg-[#5d5398] ">
    <div class="container mx-auto ">

        <!-- content -->
        <div class="">
            <div class=" m-3 flex justify-center   ">
                <div class="w-full ">
                    <div class="px-5 py-3 rounded-lg   shadow-md bg-white">
                        <?php if ($_SESSION['sql_todo_details_array']) : ?>
                            <!-- title of task -->
                            <div class="text-4xl text-[#fbc72e]">
                                <h1><?php echo $_SESSION['sql_todo_details_array']['task']; ?></h1>

                            </div>
                            <!-- created at -->
                            <div class="py-2">
                                <!-- title -->
                                <div class="py-1 text-sm font-semibold">
                                    <h6>created at</h6>
                                </div>
                                <!-- date -->
                                <div class="text-gray-500 py-1 text-xs">
                                    <span><?php echo $_SESSION['sql_todo_details_array']['task_date']; ?></span>
                                </div>
                            </div>

                            <!-- description -->
                            <div>
                                <p><?php echo $_SESSION['sql_todo_details_array']['descriptions']; ?></p>

                            </div>
                        <?php else : ?>
                            <h1>Data doesnt exist</h1>

                        <?php endif ?>
                    </div>
                </div>
            </div>
        </div>
        <!-- go back button -->
        <div class=" ">
            <?php include('./control/go_back.php') ?>
        </div>

    </div>

</body>

</html>