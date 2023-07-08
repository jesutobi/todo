<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        * {
            padding: 0;
            margin: 0;
        }

        .col {
            color: #5d5398;
        }

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
    </style>
</head>

<body class="bg-[#5d5398]">

    <div class="container mx-auto">
        <!-- header -->
        <div class="mx-3">
            <?php include('./nav/header.php') ?>
        </div>

        <div class="mx-3">
            <?php
            include('form_hero.php')
            ?>
        </div>

        <!-- title -->
        <div class=" mx-3 mt-12 text-white font-semibold  ">
            <span class="sm:text-base p-2 txt-sm text-white  bg-[#fbc72e]">To-do List</span>
        </div>
        <div class="mx-3">
            <?php
            include('content.php')
            ?>
        </div>

    </div>


</body>

</html>