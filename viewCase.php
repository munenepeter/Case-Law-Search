<?php

use LukeMadhanga\DocumentParser;

include_once 'src/bootstrap.php';
include_once 'vendor/autoload.php';

if (isset($_GET['case_id'])) {

    $case_id = htmlspecialchars(trim($_GET['case_id']));

    $case = $DB->query("SELECT
 `case_no`,`case_parties`,`court`,`case_doc`,`date_of_delivery`, `updated_at`
  FROM `cases`
   WHERE `case_id` = $case_id");


    $docsFolder = __DIR__ . "/src/docs/";
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
    <title>Laws | <?= $case[0]['case_no']; ?> </title>
    <link rel="shortcut icon" href="src/static/favicon.svg" type="image/svg">
    <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tailwindcss/typography@0.4.1/dist/typography.css">
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
</head>

<body class="bg-gray-100 px-3 font-sans leading-normal tracking-normal">
    <div class=" mt-4  max-w-screen-md max-h-screen mx-auto p-4 text-center">
        <h2 class="font-bold text-xl">View Case No: <?= $case[0]['case_no']; ?> </h2>
    </div>
    <br>
    <div class="flex">
        <a class="ml-2 text-blue-600 hover:underline hover:text-blue-700" href="index.php">All Cases</a>
    </div>

    <div class="h-full bg-gray-200 text-gray-800 p-4 lg:p-8 border">
        <div class="flex flex-col max-w-screen-md mx-auto p-4 border rounded-lg bg-white">
            <div class="w-full py-4 px-6 text-gray-800 flex flex-col justify-between">
                <div class="flex justify-between">
                    <h3 class="font-semibold text-lg leading-tight truncate"><?= $case[0]['case_no']; ?> </h3>
                    <span><b>Updated:</b> <span><?= time_ago($case[0]['updated_at']); ?></span></span>
                </div>
                <p class="mt-2 italic"><?= $case[0]['case_parties']; ?></p>
                <div class="mt-2 border border-t p-2 ">
                    <article class="prose">
                        <?php



                        // Open the DOCX file as a ZIP archive
                        use PhpOffice\PhpWord\IOFactory;


                        $phpWord = IOFactory::load('/path/to/document.docx');
                        $section = $phpWord->getSection(0);

                        $xml = '';

                        foreach ($section->getElements() as $element) {
                            $xml .= $element->getXmlWriter()->getData();
                        }


                        echo $xml;
























                        // if (!file_exists($docsFolder . $case[0]['case_doc'])) {
                        //     echo "<span class=\"text-red-500\">File does not exist for some reason!</span>";
                        // } else {
                        //     try {
                        //         echo DocumentParser::parseFromFile($docsFolder . $case[0]['case_doc']);
                        //     } catch (\Exception $e) {
                        //         echo $e->getMessage();
                        //     }
                        // }

                        ?>

                    </article>
                </div>
                <div class="flex justify-between">
                    <p class="text-sm text-gray-700 uppercase tracking-wide font-semibold mt-2"><?= $case[0]['court']; ?></p>
                    <span><b>Delivery Date:</b> <span><?= $case[0]['date_of_delivery']; ?></span></span>

                </div>
            </div>
        </div>
    </div>
</body>

</html>