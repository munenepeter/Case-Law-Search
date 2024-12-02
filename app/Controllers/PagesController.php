<?php

namespace App\Controllers;

use Tabel\Controllers\MainController;

class PagesController extends MainController {

    public function __construct() {
        //   $this->middleware('auth');
    }
    public function index() {
        return view('index');
    }

    public function search() {
        $query = $this->request()->get('q');
        
        // TODO: Implement actual search logic
        $results = []; // This will be replaced with actual database queries
        
        return view('search', [
            'query' => $query,
            'results' => $results
        ]);
    }
}