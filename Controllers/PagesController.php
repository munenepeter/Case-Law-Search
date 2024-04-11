<?php

namespace CaseLaw\Controllers;

use CaseLaw\Controllers\Controller;

class PagesController extends Controller {

    public function __construct() {
        //   $this->middleware('auth');
    }
    public function index() {
        return view('index');
    }
}