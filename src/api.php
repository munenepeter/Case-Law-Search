<?php
use App\Database\Database;


include "database/Database.php";

$DB = new Database("database/database.sqlite");

$cases = $DB->query('SELECT * FROM `cases` ORDER BY `created_at` DESC');

echo json_encode($cases);
