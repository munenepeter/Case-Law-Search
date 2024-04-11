<?php

use CaseLaw\Core\Mantle\App;
use CaseLaw\Core\Mantle\Mail;
use CaseLaw\Core\Mantle\Config;
use CaseLaw\Core\Database\Connection;
use CaseLaw\Core\Database\QueryBuilder;
use Illuminate\Database\Capsule\Manager as Capsule;

//change TimeZone
date_default_timezone_set('Africa/Nairobi'); 

//production development
define('ENV','development');
define('APP_ROOT', __DIR__."/../");

//require all files here
require 'helpers.php';
require_once __DIR__.'/../vendor/autoload.php';

//configure config to always point to env
// App::bind('config', Config::load()); 
App::bind('config', Config::load());


session_start();



// Bind the Database credentials and connect to the app
App::bind('mailer', new Mail(App::get('config.mail')));


$capsule = new Capsule;

Connection::make(App::get('config.db'), $capsule);

$capsule->setAsGlobal();
$capsule->bootEloquent();
