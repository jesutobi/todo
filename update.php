<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="main.css">
</head>

<body class="bg-[#5d5398] relative font1">

    <div class="absolute top-[7rem] sm:top-[10rem] bottom-0 left-0 right-0  flex justify-center">
        <div class="sm:m-0  m-2 w-full sm:w-5/12">
            <div class=" px-2 sm:px-5 py-3 rounded-lg  shadow-md bg-white">
                <!-- title -->
                <div class="p-1">
                    <div class="py-1">
                        <label for="" class="font-semibold text-black text-sm">Task title</label>
                    </div>
                    <div class="">
                        <input type="text" value="" maxlength="10" id="title" name="task" class="border border-black-500 w-full rounded-md outline-1 outline-[#fbc72e] p-2 text-sm" placeholder="input the task">
                    </div>

                </div>
                <!-- content -->
                <div class="p-1">
                    <div class="py-1">
                        <label for="" class="font-semibold text-black text-sm">Description</label>
                    </div>
                    <div>
                        <textarea type="text" name="description" value="" id="description" cols="30" rows="7" class="border outline-1 outline-[#fbc72e] border-black-500 w-full rounded-md p-2 text-xs sm:text-sm" placeholder="whats your plan"></textarea>
                    </div>
                </div>
                <div class=" mx-1 flex justify-end">
                    <button id="myButton" name="submitUpdate" onclick="submitUpdate()" class="cursor-pointer px-3 py-2  bg-[#fbc72e] font-semibold text-black rounded-md text-sm">update</button>
                </div>
            </div>
            <!-- go back button -->
            <div class="p-3 my-3">
                <?php include('./control/go_back.php') ?>
            </div>
        </div>


    </div>



    <script src="js/update.js">

    </script>
</body>

</html>