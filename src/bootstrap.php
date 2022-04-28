<?php

use App\Database\Database;


include "database/Database.php";


$DB = new Database();

function validate($value) {
    $errors = [];
    if (empty($value)) {
        $errors[] = "{$value} is empty! Please try again";
        exit;
    }
    if (!isset($value)) {
        $errors[] = "{$value} was not submitted! Please try again";
        exit;
    }
    if (!empty($errors)) {
        echo json_encode($errors);
        exit;
    }
    $validatedValue = htmlspecialchars(trim($value));
    return $validatedValue;
}
// Highlight words in text
function highlightWords($text, $word){
    $text = preg_replace('#'. preg_quote($word) .'#i', '<span class="font-bold text-red-500">\\0</span>', $text);
    return $text;
}

function time_ago($datetime, $full = false) {
    $now = new DateTime;
    $ago = new DateTime($datetime);
    $diff = $now->diff($ago);

    $diff->w = floor($diff->d / 7);
    $diff->d -= $diff->w * 7;

    $string = array(
        'y' => 'year',
        'm' => 'month',
        'w' => 'week',
        'd' => 'day',
        'h' => 'hour',
        'i' => 'minute',
        's' => 'second',
    );
    foreach ($string as $k => &$v) {
        if ($diff->$k) {
            $v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? 's' : '');
        } else {
            unset($string[$k]);
        }
    }

    if (!$full) $string = array_slice($string, 0, 1);
    return $string ? implode(', ', $string) . ' ago' : 'just now';
}

function upload() {
    $target_dir = __DIR__ . "/docs/";
    $target_file = $target_dir . basename($_FILES["case_doc"]["name"]);
    $uploadOk = 1;
    $fileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));


    // Check if file already exists
    if (file_exists($target_file)) {
        echo "Sorry, file already exists.";
        $uploadOk = 0;
        return;
    }

    // Check file size
    if ($_FILES["case_doc"]["size"] > 500000) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
        return;
    }

    // Allow certain file formats
    if ($fileType != "doc" && $fileType != "docx") {
        echo "Sorry, only docs & docx files are allowed.";
        $uploadOk = 0;
        return;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
        return;
        // if everything is ok, try to upload file
    } else {
        if (!move_uploaded_file($_FILES["case_doc"]["tmp_name"], $target_file)) {
            echo "Sorry, there was an error uploading your file.";
        }
    }
}
