<?php

use Tabel\Core\Router;
use App\Controllers\PagesController;
use App\Controllers\BillsController;
use App\Controllers\CasesController;
use App\Controllers\GazettesController;
use App\Controllers\ParliamentController;
use Tabel\Controllers\SystemController;

// Main pages
Router::get('', [PagesController::class, 'index']);
Router::get('search', [PagesController::class, 'search']);

// Bills & Legislation
Router::get('bills', [BillsController::class, 'index']);
Router::get('bills/new', [BillsController::class, 'newBills']);
Router::get('bills/ongoing', [BillsController::class, 'ongoingBills']);
Router::get('bills/{id}', [BillsController::class, 'show']);

// Cases
Router::get('cases', [CasesController::class, 'index']);
Router::get('cases/latest', [CasesController::class, 'latest']);
Router::get('cases/most-viewed', [CasesController::class, 'mostViewed']);
Router::get('cases/{id}', [CasesController::class, 'show']);

// Gazettes
Router::get('gazettes', [GazettesController::class, 'index']);
Router::get('gazettes/latest', [GazettesController::class, 'latest']);
Router::get('gazettes/{id}', [GazettesController::class, 'show']);

// Parliamentary Business
Router::get('parliament', [ParliamentController::class, 'index']);
Router::get('parliament/calendar', [ParliamentController::class, 'calendar']);
Router::get('parliament/hearings', [ParliamentController::class, 'hearings']);

// Quick access routes
Router::get('latest-updates', [CasesController::class, 'latest']);
Router::get('court-calendar', [CasesController::class, 'courtCalendar']);
Router::get('judgments', [CasesController::class, 'recentJudgments']);

//logs
Router::get('system/logs', [SystemController::class, 'index']);
Router::post('system/logs/delete', [SystemController::class, 'deleteLogs']);
