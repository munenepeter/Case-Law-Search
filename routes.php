<?php

use CaseLaw\Core\Mantle\Router;
use CaseLaw\Controllers\PagesController;
use CaseLaw\Controllers\SystemController;

Router::get('', [PagesController::class, 'index']);


//logs
Router::get(':system:/logs', [SystemController::class, 'index']);
Router::post(':system:/logs/delete', [SystemController::class, 'deleteLogs']);
//robots
Router::get('robots.txt', function () {
    return require __DIR__ . "/robots.txt";
});