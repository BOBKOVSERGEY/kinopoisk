<?php

use App\Models\Movie;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    Movie::query()->create([
        'title' => 'ccccccccccccccccccc',
        'overview' => 'ccccccccccccccccccc',
       'release_date' => '2023-12-24',
        'language_id' => '01hay621eaxxnxzacfbr4w7fnw'
    ]);
});
