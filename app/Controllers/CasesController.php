<?php

namespace App\Controllers;

use Tabel\Controllers\MainController;

class CasesController extends MainController {
    public function index() {
        // TODO: Fetch all cases with pagination
        return view('cases/index');
    }

    public function latest() {
        // TODO: Fetch latest cases
        return view('cases/latest');
    }

    public function mostViewed() {
        // TODO: Fetch most viewed cases
        return view('cases/most-viewed');
    }

    public function show($id) {
        // TODO: Fetch specific case details
        return view('cases/show');
    }

    public function courtCalendar() {
        // TODO: Fetch court calendar
        return view('cases/calendar');
    }

    public function recentJudgments() {
        // TODO: Fetch recent judgments
        return view('cases/judgments');
    }
}
