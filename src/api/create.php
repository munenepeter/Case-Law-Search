<?php

include_once '../bootstrap.php';

upload();

if(isset($_FILES["case_doc"]["name"]) && isset($_POST['case_no'])){

    $case_no  = validate($_POST['case_no']);
    $date_of_delivery = validate($_POST['date_of_delivery']);
    $court  = validate($_POST['court']);
    $case_parties  = validate($_POST['case_parties']);
    $case_doc  = basename($_FILES["case_doc"]["name"]);
    $created_at  = date('Y-m-d H:i:s', time());
    $updated_at = date('Y-m-d H:i:s', time());

}else{
    echo "Nothing was submitted, Please try again";
    exit;
}

try {
    $DB->query("
    INSERT INTO cases (case_no, date_of_delivery, court, case_parties, case_doc, created_at, updated_at )
    VALUES ('$case_no', '$date_of_delivery', '$court', '$case_parties', '$case_doc', '$created_at', '$updated_at');
    ");

    echo "Successfully added a new case!";

} catch (\PDOException $e) {

    echo $e->getMessage();
}
