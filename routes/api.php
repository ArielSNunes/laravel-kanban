<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/boards', function () {
    return [
        'data' => [
            'name' => 'Projeto 01'
        ]
    ];
});
