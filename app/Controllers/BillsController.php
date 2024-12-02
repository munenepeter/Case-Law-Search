<?php

namespace App\Controllers;

use Tabel\Controllers\MainController;

class BillsController extends MainController {
    public function index() {
        // TODO: Fetch all bills with pagination
        return view('bills/index');
    }

    public function newBills() {
        // TODO: Fetch recently introduced bills
        return view('bills/new');
    }

    public function ongoingBills() {
        // TODO: Fetch bills currently in parliament
        return view('bills/ongoing');
    }

    public function show($id) {
        // TODO: Fetch specific bill details
        return view('bills/show');
    }
}
