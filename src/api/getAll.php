<?php
use App\Database\Database;


include "../database/Database.php";

$DB = new Database();

$cases = $DB->query('SELECT * FROM `cases` ORDER BY `created_at` DESC');

echo json_encode($cases);