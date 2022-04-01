<?php
include_once 'src/bootstrap.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Laws Search</title>
    <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
</head>

<body class="bg-gray-100 px-3 font-sans leading-normal tracking-normal">
    <div class=" mt-4  max-w-screen-md max-h-screen mx-auto p-4 text-center">
        <h2 class="font-bold text-xl">Upload Case Metadata</h2>
    </div>
    <div class="mx-auto p-5 w-1/2">
        <!-- date of delivery & Court -->
        <div class="p-4 bg-white border rounded-lg  ">

            <form action="handle.php" method="post" class="bg-white container flex flex-col mx-auto">
                <div class="mt-2">
                    <label class="text-sm font-medium text-gray-900" for="case_no" class="text-sm">Case Number</label>
                    <input id="case_no" name="case_no" type="text" placeholder="Case Number" class="p-3 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full">
                </div>
                <div class="mt-2">
                    <label class="text-sm font-medium text-gray-900" for="case_parties" class="text-sm">Case Parties</label>
                    <input id="case_parties" name="case_parties" type="text" placeholder="Case Parties" class="p-3 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full">
                </div>
                <div class="mt-2">
                    <label class="text-sm font-medium text-gray-900" for="date_of_delivery" class="text-sm">Date of Delivery</label>
                    <input id="date_of_delivery" name="date_of_delivery" type="date" placeholder="Date of Delivery" class="p-3 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full">
                </div>
                <div class="mt-2">
                    <label class="text-sm font-medium text-gray-900" for="court" class="text-sm">Court</label>
                    <input id="court" name="court" type="text" placeholder="Court" class="p-3 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full">
                </div>
                <div class="mt-2">
                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300" for="user_avatar">Upload file</label>
                    <input name="case_doc" class="block w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 cursor-pointer" type="file">
                    <!-- <div class="mt-1 text-sm text-gray-500 dark:text-gray-300" id="user_avatar_help">A profile picture is useful to confirm your are logged into your account</div> -->
                </div>

                <!-- https://codepen.io/smashingmag/pen/vYOJaMb?editors=1000 -->
                <div class="col-span-full sm:col-span-3 mt-4">
                    <input type="submit" name="btn" class="bg-blue-500 text-white text-sm font-medium px-6 py-2 rounded capitalize cursor-pointer" value="Upload Metadata">
                    <br> <a class="ml-2 text-blue-600 hover:underline hover:text-blue-700" href="javascript:history.back()">Go back</a>
                </div>




            </form>
        </div>
    </div>
    </div>
    
</body>

</html>