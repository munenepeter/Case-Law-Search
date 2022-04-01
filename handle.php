<?php
include_once 'src/bootstrap.php';

if (isset($_POST['btn'])) {

   

    $case_no  = validate($_POST['case_no']);
    $date_of_delivery = validate($_POST['date_of_delivery']);
    $court  = validate($_POST['court']);
    $case_parties  = validate($_POST['case_parties']);
    $case_doc  = validate($_POST['case_doc']);
    $created_at  = date('Y-m-d H:i:s', time());;
    $updated_at = date('Y-m-d H:i:s', time());;



    try {
        $DB->query("
    INSERT INTO cases (case_no, date_of_delivery, court, case_parties, case_doc, created_at, updated_at )
    VALUES ('$case_no', '$date_of_delivery', '$court', '$case_parties', '$case_doc', '$created_at', '$updated_at');
    ");
        header("Location:{$_SERVER['HTTP_REFERER']}");
    } catch (\PDOException $e) {
        echo $e->getMessage();
    }
}
