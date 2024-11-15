<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return ['Laravel' => 'some st'];
});

require __DIR__.'/auth.php';
