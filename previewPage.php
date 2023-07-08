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

<body class=" bg-[#5d5398] relative">
    <div class=" absolute top-[7rem] sm:top-[10rem] bottom-0 left-0 right-0  flex justify-center">
        <div class="m-5   sm:w-5/12">
            <div class="px-5 py-3 rounded-lg   shadow-md bg-white" id="detailsContainer">
            </div>
            <!-- go back button -->
            <div class=" my-4">
                <?php include('./control/go_back.php') ?>
            </div>

        </div>
    </div>
    <script src="js/preview.js">

    </script>
</body>

</html>