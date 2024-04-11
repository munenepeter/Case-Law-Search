<?php

namespace CaseLaw\Models;

use Illuminate\Database\Eloquent\Model as Eloquent;


class Act extends Eloquent {

    protected $fillable = [
        'name', 'link', 'content_downloaded'
    ];
}
