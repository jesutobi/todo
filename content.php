 <?php


    ?>
 <!-- list of things to do -->

 <div class="mt-5 p-2">
     <div class="grid  md:grid-cols-5 sm:grid-cols-6 gap-2">
         <?php foreach ($_SESSION['todo_conv_result'] as $todo) : ?>
             <!-- content-card -->
             <div class="shadow-md p-2 bg-slate-50  h-40 relative rounded-xl">
                 <!-- title -->
                 <div>
                     <h3 class="font-semibold text-xl text-[#fbc72e]"><?php echo htmlspecialchars($todo['task']); ?></h3>
                 </div>
                 <!-- date -->
                 <div class="text-gray-500 py-1 text-xs">
                     <span><?php echo htmlspecialchars($todo['task_date']) ?></span>
                 </div>

                 <!-- content
                <div>
                    <p class="antialiased font-medium text-sm py-1">
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Molestiae sed assumenda aspernatur ratione! Debitis sint reiciendis nisi obcaecati, cupiditate deleniti?
                    </p>

                </div> -->
                 <!-- delete and edit icon -->
                 <div class="absolute bottom-0">
                     <div class="flex justify-between  cursor-pointer my-2">
                         <div title="preview">
                             <a href="previewPage.php?id=<?php echo $todo['id']; ?>">
                                 <svg width="20px" height="20px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                     <path d="M9 12H15" stroke="#323232" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                     <path d="M9 15H15" stroke="#323232" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                     <path d="M17.8284 6.82843C18.4065 7.40649 18.6955 7.69552 18.8478 8.06306C19 8.4306 19 8.83935 19 9.65685L19 17C19 18.8856 19 19.8284 18.4142 20.4142C17.8284 21 16.8856 21 15 21H9C7.11438 21 6.17157 21 5.58579 20.4142C5 19.8284 5 18.8856 5 17L5 7C5 5.11438 5 4.17157 5.58579 3.58579C6.17157 3 7.11438 3 9 3H12.3431C13.1606 3 13.5694 3 13.9369 3.15224C14.3045 3.30448 14.5935 3.59351 15.1716 4.17157L17.8284 6.82843Z" stroke="#323232" stroke-width="2" stroke-linejoin="round" />
                                 </svg>
                             </a>
                         </div>
                         <div class="flex ">
                             <!-- edit -->
                             <div class="px-1" title="edit">
                                 <a href="update.php?id=<?php echo $todo['id']; ?>">
                                     <svg width="20px" height="20px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                         <path d="M11 2H9C4 2 2 4 2 9V15C2 20 4 22 9 22H15C20 22 22 20 22 15V13" stroke="#292D32" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                         <path d="M16.04 3.02001L8.16 10.9C7.86 11.2 7.56 11.79 7.5 12.22L7.07 15.23C6.91 16.32 7.68 17.08 8.77 16.93L11.78 16.5C12.2 16.44 12.79 16.14 13.1 15.84L20.98 7.96001C22.34 6.60001 22.98 5.02001 20.98 3.02001C18.98 1.02001 17.4 1.66001 16.04 3.02001Z" stroke="#292D32" stroke-width="2" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
                                         <path d="M14.91 4.1499C15.58 6.5399 17.45 8.4099 19.85 9.0899" stroke="#292D32" stroke-width="2" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
                                     </svg>
                                 </a>
                             </div>
                             <!-- delete-->
                             <div class="px-1" title="delete">
                                 <a href="content.php?id=<?php echo $todo['id']; ?>">
                                     <svg width="21px" height="21px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                         <path d="M10 12V17" stroke="black" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" />
                                         <path d="M14 12V17" stroke="black" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" />
                                         <path d="M4 7H20" stroke="black" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" />
                                         <path d="M6 10V18C6 19.6569 7.34315 21 9 21H15C16.6569 21 18 19.6569 18 18V10" stroke="black" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                         <path d="M9 5C9 3.89543 9.89543 3 11 3H13C14.1046 3 15 3.89543 15 5V7H9V5Z" stroke="black" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                     </svg>
                                 </a>
                             </div>
                         </div>

                     </div>

                 </div>

             </div>
         <?php endforeach; ?>
     </div>
 </div>