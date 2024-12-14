<?php

use App\Services\NewsImportService;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $data = [
        'title' => 'Home',
    ];
    return view('welcome', compact('data'));
});


Route::get('/import-news', function () {
    $newsImportService = new NewsImportService();
//    $newsImportService->import();
//    donwload images for first 100
    $newsImportService->downloadImagesForNews();

});
