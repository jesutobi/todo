<!-- input space-->
<div class="grid md:grid-cols-3  mt-7  md:mt-20">
    <div class="sm:p-2">
        <div class="text-5xl  md:text-[3rem] lg:text-7xl text-[#fbc72e] mt-5">
            <div>
                <h1>Good</h1>
            </div>
            <div>
                <h1 id="greeting"></h1>
            </div>
        </div>
        <!-- intro text -->
        <div class="my-4 sm:px-2 px-1 font-semibold w-100 text-white text-sm">
            <h1>You might forget , but <span class="text-[#fbc72e] ">TUDU</span> wont!!</h1>
        </div>
        <!-- day -->
        <div class="flex   content-center px-2 mt-5">
            <div class="text-white">
                <h1>Today's</h1>
            </div>
            <div class="px-1 font-semibold text-[#fbc72e]">
                <h1 id="day"></h1>
            </div>
        </div>
        <!--todays date -->
        <div class="px-2 py-2">
            <h1 class="text-xs sm:text-sm text-gray-500 text-white" id="date"></h1>
        </div>

    </div>
    <div class="md:col-span-2 mt-7 sm:mt-0    shadow-md p-2 sm:p-5 rounded-lg  bg-slate-50">
        <!-- title -->
        <div class="p-1">
            <div class="py-2 text-xs sm:text-sm">
                <label for="" class="font-semibold  text-black">Task title</label>
            </div>
            <div class="">
                <input type="text" maxlength="10" name="todo_title" id="todo_title" name="task" class="border border-black-500 w-full rounded-md outline-1 outline-[#fbc72e] p-2 text-sm" name="todo_title" value="" placeholder="input the task">
            </div>
            <!-- error -->
            <div>
                <span class="titlealert">

                </span>

            </div>
        </div>
        <!-- content -->
        <div class="p-1">
            <div class="py-2 text-xs sm:text-sm">
                <label for="" class="font-semibold text-black">Description</label>
            </div>
            <div>
                <textarea vlaue="" name="todo_decription" id="todo_decription" cols="30" rows="3" class="border outline-1 outline-[#fbc72e] border-black-500 w-full rounded-md p-2 text-xs sm:text-sm" placeholder="whats your plan"></textarea>

            </div>
            <!-- error -->
            <div>
                <span class="descriptionalert">

                </span>
            </div>
        </div>
        <div class="my-2 mx-1 float-right">
            <button name="submitTodo" onclick="submitTodo()" class="cursor-pointer px-3 py-2 hover:bg-[#5d5398] hover:text-[#fbc72e] bg-[#fbc72e] font-semibold text-black rounded-md">submit</button>
        </div>
    </div>
</div>
<script src="js/index.js"></script>
<script src="js/addTodo.js"></script>