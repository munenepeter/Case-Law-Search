<?php

use App\Database\Database;


include "database/Database.php";

$DB = new Database();

$data = $DB->query('select * from cases');