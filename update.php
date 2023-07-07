<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-[#5d5398] relative">
    <div class="">

        <div class="m-2 lg:flex justify-center ">

            <div class="lg:w-1/2  md:absolute top-52 bottom-52" ">
                <div class=" bg-slate-50 shadow-md lg:p-5 p-2 rounded-lg h-72">
                <!-- title -->
                <div class="p-1">
                    <div class="py-1">
                        <label for="" class="font-semibold text-black">Task title</label>
                    </div>
                    <div class="">
                        <input type="text" value="" maxlength="10" id="title" name="task" class="border border-black-500 w-full rounded-md outline-1 outline-[#fbc72e] p-2 text-sm" placeholder="input the task">
                    </div>

                </div>
                <!-- content -->
                <div class="p-1">
                    <div class="py-1">
                        <label for="" class="font-semibold text-black">Description</label>
                    </div>
                    <div>
                        <textarea type="text" name="description" value="" id="description" cols="30" rows="3" class="border outline-1 outline-[#fbc72e] border-black-500 w-full rounded-md p-2 text-sm" placeholder="whats your plan"></textarea>
                    </div>
                </div>
                <div class="my-2 mx-1 float-right">
                    <button id="myButton" name="submitUpdate" onclick="submitUpdate()" class="cursor-pointer px-3 py-2  bg-[#fbc72e] font-semibold text-black rounded-md">update</button>
                </div>
            </div>


        </div>

    </div>

    </div>
    <!-- go back button -->
    <div class="p-3">
        <?php include('./control/go_back.php') ?>
    </div>
    <script src="js/update.js">

    </script>
</body>

</html>