<?php
include_once 'src/bootstrap.php';

if (isset($_GET['case_id'])) {

    $case_id = htmlspecialchars(trim($_GET['case_id']));

   $case = $DB->query("SELECT
 `case_no`,`case_parties`,`court`,`case_doc`,`date_of_delivery`, `updated_at`
  FROM `cases`
   WHERE `case_id` = $case_id");
} else {
    echo "This is not Authorized!! ";
    exit;
}
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
        <h2 class="font-bold text-xl">View Case No: <?= $case[0]['case_no'];?> </h2>
    </div>
    <br> <a class="ml-2 text-blue-600 hover:underline hover:text-blue-700" href="upload.php">Upload a case</a>
    <div class="h-full bg-gray-200 text-gray-800 p-4 lg:p-8 border">
        <div class="flex flex-col max-w-screen-md max-h-screen mx-auto p-4 border rounded-lg bg-white">
            <div class="w-full py-4 px-6 text-gray-800 flex flex-col justify-between">
                <div class="flex justify-between">
                    <h3 class="font-semibold text-lg leading-tight truncate"><?= $case[0]['case_no'];?> </h3>
                    <span><b>Date of Delivery:</b> <span><?= $case[0]['date_of_delivery'];?></span></span>
                </div>
                <p class="mt-2"><?= $case[0]['case_parties'];?></p>
                <p class="mt-2 border border-t p-2 "><?= $case[0]['case_doc'];?></p>
                <div class="flex justify-between">
                    <p class="text-sm text-gray-700 uppercase tracking-wide font-semibold mt-2"><?= $case[0]['court'];?></p>
                    <span><b>Updated:</b> <span><?= $case[0]['updated_at'];?></span></span>
                </div>
            </div>
        </div>
    </div>
</body>

</html>