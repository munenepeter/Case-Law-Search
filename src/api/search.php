<?php

include_once '../bootstrap.php';

$searchKeyword = $whrSQL = '';
if(isset($_GET['search'])){
    $searchKeyword = $_GET['search'];
    if(!empty($searchKeyword)){
        // SQL query to filter records based on the search term
        $whrSQL = "WHERE (`case_no` LIKE '%".$searchKeyword."%' OR `case_parties` LIKE '%".$searchKeyword."%')";
    }
}


$results = $DB->query("SELECT * FROM cases $whrSQL ORDER BY case_id DESC");

$searchResults = []; 

$searchResults['total'] = count($results);

if(count($results) === 0){
    $searchResults['noresults'] = count($results) . " results found for $searchKeyword";
}
foreach ($results as $result) {
    $searchResults['search'][] = highlightWords($result, $searchKeyword);
}



echo json_encode($searchResults);