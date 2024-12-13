<?php

use App\Services\NewsImportService;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/import-news', function () {
    $newsImportService = new NewsImportService();
    $newsImportService->import();

});
