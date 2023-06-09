<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="main.css">
    <style>
        /* this is to hide the dropdown */
        .hide-dropdown {
            display: none;


        }

        /* this is to show the dropdown */
        .show-dropdown:hover .hide-dropdown {
            display: block !important;
            /* width: 100% !important; */
            position: absolute;
            /* left: 0rem !important; */
            right: 0rem !important;
        }

        /* z-index */
        .zed {
            z-index: 10000 !important;
        }
    </style>
</head>

<body>
    <div class="flex justify-between items-center relative">
        <!-- logo -->
        <div class="">
            <h2 class="pokfontbold text-5xl text-[#fbc72e] ">TUDU</h2>
        </div>

        <!-- user icon that users can click to logout,upload profile picture and also see their profile-->
        <div role="button" class=" ">
            <div class=" show-dropdown  ">
                <div style="width:55px;height:55px " class="z-[80] pt-3">
                    <svg xmlns=" http://www.w3.org/2000/svg" viewBox="0 0 48 48" width="50px" height="50px">
                        <path fill="#0277BD" d="M31,7c-1.7-1.3-2.9-3-7-3s-5.3,1.8-7,3s-6,1.5-6,5s3,4,3,4h10h10c0,0,3-0.5,3-4S32.7,8.3,31,7z" />
                        <path fill="#FFA726" d="M14,22c0,1.7-1.3,3-3,3s-3-1.3-3-3s1.3-3,3-3S14,20.3,14,22z M37,19c-1.7,0-3,1.3-3,3s1.3,3,3,3s3-1.3,3-3S38.7,19,37,19z" />
                        <path fill="#FFB74D" d="M11,24c0-8.1,5.8-14,13-14h0c8,0,13,5.9,13,14v4H11V24z" />
                        <path fill="#424242" d="M41 31l2-1c0 0-4.3-6-11.1-6h-4.1c-.4 1.7-2 3-3.9 3s-3.4-1.3-3.9-3h-4.4C9.3 24 5 30 5 30l2 1-2 2.5L7 34l-1 3.5L8 38v3h2l2 2 2-1 2 2 2-1 1.9 1 2.1-1 2 1 2-1 1.9 1 2.1-1 1.9 1 2.1-2 2 1 2-2h2v-3h2l-1-4 2-.4L41 31zM24 10c-3.3 0-6.3 1.2-8.5 3.3 1.8 1.6 4.9 2.7 8.5 2.7 3.7 0 7-1.1 8.7-2.8C30.5 11.2 27.6 10 24 10z" />
                        <path fill="#EFEBE9" d="M32.5,38c-1.5,0-4.1-1-8.5-1s-6.9,1-8.5,1S13,36.9,13,35.5v-5c0-1.4,1.1-2.5,2.5-2.5s3.3,1,8.5,1s7.3-1,8.5-1s2.5,1.1,2.5,2.5v5C35,36.9,34,38,32.5,38z" />
                        <path fill="#D7CCC8" d="M19,36h-2v-7.8c0.5,0.1,1.2,0.3,2,0.4V36z M29,28.6V36h2v-7.8C30.5,28.4,29.8,28.5,29,28.6z M25,29c-0.3,0-0.7,0-1,0c-0.3,0-0.7,0-1,0v7h2V29z" />
                        <path fill="#FF8A80" d="M32.5,38c-1.5,0-4.1-1-8.5-1s-6.9,1-8.5,1S13,36.9,13,35.5V34c0,0,0.6,2,2,2s3.8-2,9-2s7.8,2,9,2s2-2,2-2v1.5C35,36.9,34,38,32.5,38z" />
                        <path fill="#784719" d="M27,20.5c0-0.8,0.7-1.5,1.5-1.5s1.5,0.7,1.5,1.5S29.3,22,28.5,22S27,21.3,27,20.5 M18,20.5c0,0.8,0.7,1.5,1.5,1.5s1.5-0.7,1.5-1.5S20.3,19,19.5,19S18,19.7,18,20.5" />
                        <path fill="#FF8F00" d="M26.3,18.4C26,19,25.5,20.1,25,19.8c-0.1-0.3-0.4-0.6-0.9-0.6c0,0,0,0-0.1,0c0,0,0,0,0,0s0,0,0,0c0,0,0,0-0.1,0c-0.5,0-0.8,0.3-0.9,0.6c-0.5,0.3-1.1-0.9-1.3-1.4c-0.3-0.5-0.5-0.9-0.3,0.2c0.1,0.5,0.2,0.2,0.3,0.8c0.1,0.3,0.2,1.4,0.3,1.7c0.1,0.1,0.2,0.3,0.3,0.5c0.1,0.1,0.1,0.2,0.4,0.3C23,22,23,22,23.1,22l0.2,0l0,0l0.1,0c0.1,0,0.1,0,0.2,0c0.1,0,0.2,0,0.3-0.1c0.1,0,0.1-0.1,0.2-0.1c0.1,0,0.1,0.1,0.2,0.1c0.1,0,0.2,0.1,0.3,0.1c0.1,0,0.1,0,0.2,0l0.1,0l0,0l0.2,0c0.1,0,0.1,0,0.3-0.1c0.2-0.1,0.3-0.2,0.4-0.3c0.1-0.2,0.2-0.3,0.3-0.5c0.1-0.3,0.2-1.4,0.3-1.7c0.1-0.5,0.2-0.2,0.3-0.8C26.8,17.5,26.6,17.9,26.3,18.4z" />
                        <path fill="#3E2723" d="M30.2,17.6C30.2,17.6,30.2,17.6,30.2,17.6c0-0.1-0.1-0.1-0.1-0.2c-0.1-0.1-0.3-0.3-0.5-0.5c-0.1-0.1-0.2-0.1-0.4-0.2c-0.1-0.1-0.3-0.1-0.4-0.1c-0.1,0-0.3,0.1-0.5,0.2c-0.2,0.1-0.4,0.2-0.6,0.4c-0.7,0.6-1.2,1.5-1.5,2.2c-0.1,0.4-0.2,0.7-0.2,0.9c0,0.2-0.1,0.4-0.1,0.4s0-0.1,0-0.4c0-0.2,0-0.6,0-1c0.1-0.8,0.3-1.9,1-2.9c0.2-0.2,0.4-0.5,0.6-0.7c0.2-0.2,0.5-0.4,0.8-0.5c0.4-0.1,0.7-0.1,1-0.1c0.3,0,0.6,0.1,0.8,0.2c0.5,0.2,0.8,0.4,1.1,0.6c0.1,0.1,0.2,0.2,0.3,0.2c0.1,0.1,0.1,0.1,0.1,0.1c0.4,0.4,0.4,1,0,1.4c-0.4,0.4-1,0.4-1.4,0C30.4,17.8,30.3,17.8,30.2,17.6L30.2,17.6z M16.2,16.4c-0.4,0.4-0.3,1,0.1,1.4c0.4,0.4,1,0.3,1.4-0.1l0.1-0.1c0,0,0,0,0,0c0,0,0.1-0.1,0.1-0.1c0.1-0.1,0.3-0.3,0.5-0.5c0.1-0.1,0.2-0.1,0.4-0.2c0.1-0.1,0.3-0.1,0.4-0.1c0.1,0,0.3,0.1,0.5,0.2c0.2,0.1,0.4,0.2,0.6,0.4c0.7,0.6,1.2,1.5,1.5,2.2c0.1,0.4,0.2,0.7,0.2,0.9c0,0.2,0.1,0.4,0.1,0.4s0-0.1,0-0.4c0-0.2,0-0.6,0-1c-0.1-0.8-0.3-1.9-1-2.9c-0.2-0.2-0.4-0.5-0.6-0.7c-0.2-0.2-0.5-0.4-0.8-0.5c-0.4-0.1-0.7-0.1-1-0.1c-0.3,0-0.6,0.1-0.8,0.2c-0.5,0.2-0.8,0.4-1.1,0.6c-0.1,0.1-0.2,0.2-0.3,0.2C16.3,16.3,16.2,16.4,16.2,16.4C16.2,16.4,16.2,16.4,16.2,16.4z" />
                    </svg>
                </div>
                <!-- dropdown that shows user name, email, logout button and also allows users to upload their pictures -->
                <div class="hide-dropdown w-1/2 md:w-1/4  z-[80]">
                    <div class="rounded-lg bg-[#fbc72e] p-2 zed ">
                        <!-- change profile picture -->
                        <div class="flex justify-between items-center">
                            <!-- display picture -->
                            <div>
                                <img src="../../todo//assets/icons//icons8-brutus.svg" alt="">
                            </div>
                            <!--  -->

                        </div>
                        <!-- username -->
                        <div class="py-1">
                            <div>
                                <span class="text-xs font-semibold">Username</span>
                            </div>
                            <div>
                                <span><?php echo $_SESSION['todo_user'] ?></span>
                            </div>
                        </div>
                        <!-- email -->
                        <div class="py-1">
                            <div>
                                <span class="text-xs font-semibold">Email</span>
                            </div>
                            <div>
                                <span><?php echo $_SESSION['todo_email'] ?></span>
                            </div>
                        </div>
                        <!-- LOGOUT -->
                        <div>
                            <a href="../todo/authentication/logout.php"><span class="font-bold"> Logout</span></a>
                        </div>

                    </div>

                </div>
            </div>

        </div>

    </div>
</body>

<script>

</script>

</html>