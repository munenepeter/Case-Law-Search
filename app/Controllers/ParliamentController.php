<?php

namespace App\Controllers;

use Tabel\Controllers\MainController;

class ParliamentController extends MainController {
    public function index() {
        // TODO: Fetch parliamentary overview
        return view('parliament/index');
    }

    public function calendar() {
        // TODO: Fetch parliament calendar
        return view('parliament/calendar');
    }

    public function hearings() {
        // TODO: Fetch upcoming hearings
        return view('parliament/hearings');
    }
}
