<!-- input space-->
<div class="grid md:grid-cols-3   mt-20">
    <div class="p-2">
        <div class="text-5xl  md:text-[3rem] lg:text-7xl text-[#fbc72e] mt-5">
            <div>
                <h1>Good</h1>
            </div>
            <div>
                <h1><?php
                    // time zone Nigeria
                    date_default_timezone_set('Africa/Lagos');
                    // 24-hour format of an hour without leading zeros (0 through 23)
                    $Hour = date('G');
                    if ($Hour >= 5 && $Hour <= 11) {
                        echo " Morning";
                    } else if (
                        $Hour >= 12 && $Hour <= 17
                    ) {
                        echo " Afternoon";
                    } else if (
                        $Hour >= 17 || $Hour <= 24
                    ) {
                        echo " Evening";
                    } else if (
                        $Hour >= 24 || $Hour <= 5
                    ) {
                        echo " Morning";
                    }
                    ?></h1>
            </div>
        </div>
        <!-- intro text -->
        <div class="p-2 font-semibold w-100 text-white">
            <h1>You might forget , but we wont!!</h1>
        </div>
        <!-- day -->
        <div class="flex  content-center px-2 mt-5">
            <div class="text-white">
                <h1>Today's</h1>
            </div>
            <div class="px-1 font-semibold text-[#fbc72e]">
                <h1><?php echo date("l") ?></h1>
            </div>
        </div>
        <!--todays date -->
        <div class="px-2 py-2">
            <h1 class="text-sm text-gray-500 text-white"><?php echo date("M d, Y") ?></h1>
        </div>

    </div>
    <div class="md:col-span-2    shadow-md px-5 py-5 rounded-lg  bg-slate-50">
        <!-- title -->
        <div class="p-1">
            <div class="py-1">
                <label for="" class="font-semibold text-black">Task title</label>
            </div>
            <div class="">
                <input type="text" name="todo_title" id="todo_title" name="task" class="border border-black-500 w-full rounded-md outline-1 outline-[#fbc72e] p-2 text-sm" name="todo_title" value="" placeholder="input the task">
            </div>
            <!-- error -->
            <div>
                <span class="titlealert">

                </span>

            </div>
        </div>
        <!-- content -->
        <div class="p-1">
            <div class="py-1">
                <label for="" class="font-semibold text-black">Description</label>
            </div>
            <div>
                <textarea vlaue="" name="todo_decription" id="todo_decription" cols="30" rows="3" class="border outline-1 outline-[#fbc72e] border-black-500 w-full rounded-md p-2 text-sm" placeholder="whats your plan"></textarea>

            </div>
            <!-- error -->
            <div>
                <span class="descriptionalert">

                </span>
            </div>
        </div>
        <div class="my-2 mx-1 float-right">
            <button name="submitTodo" onclick="submitTodo()" class="cursor-pointer px-3 py-2  bg-[#fbc72e] font-semibold text-black rounded-md">submit</button>
        </div>
    </div>
</div>
<script src="js/addTodo.js"></script>