<?php

namespace App\Controllers;

use Tabel\Controllers\MainController;

class GazettesController extends MainController {
    public function index() {
        // TODO: Fetch all gazettes with pagination
        return view('gazettes/index');
    }

    public function latest() {
        // TODO: Fetch latest gazette notices
        return view('gazettes/latest');
    }

    public function show($id) {
        // TODO: Fetch specific gazette details
        return view('gazettes/show');
    }
}
