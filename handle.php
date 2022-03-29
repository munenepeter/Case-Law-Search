<?php

if (isset($_POST['btn'])) {
    echo "<pre>";
    print_r($_POST);
    $case_no  = $_POST['btn'];
    $date_of_delivery = $_POST['btn'];
    $court  = $_POST['btn'];
    $case_parties  = $_POST['btn'];
    $case_doc  = $_POST['btn'];
    $created_at  = $_POST['btn'];
    $updated_at = $_POST['btn'];


    $DB->query("
    INSERT INTO cases (case_no, date_of_delivery, court, case_parties, case_doc, created_at, updated_at )
    VALUES ($case_no, $date_of_delivery, $court, $case_parties, $case_doc, $created_at, $updated_at);
    ");

    /*

    case_no VARCHAR NOT NULL,
    date_of_delivery DATETIME,
    court VARCHAR,
    case_parties TEXT,
    case_doc VARCHAR,
    created_at DATETIME,
    updated_at DATETIME
    */
}
