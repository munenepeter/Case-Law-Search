<?php

namespace CaseLaw\Controllers;



class MigrationController {

    public function index() {
        $migrations = $this->getMigrations();

        return view('migrations', [
            'migrations' => $migrations
        ]);
    }

    public function getMigrations(bool $all = false): array {

        // foreach ( as $file) {
        //     echo $file . PHP_EOL;
        // }

        return glob(APP_ROOT . "Database/migrations/*");
    }
}
