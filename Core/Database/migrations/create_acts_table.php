<?php

use Illuminate\Database\Capsule\Manager as Capsule;

Capsule::schema()->create('acts', function ($table) {
    $table->increments('id');
    $table->string('name')->unique();
    $table->string('link')->unique();
    $table->boolean('content_downloaded')->default(false);
    $table->timestamps();
});
