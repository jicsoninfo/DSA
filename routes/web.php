<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('dsa.ll.linklist');
});

Route::get('/jsq', function () {
    return view('dsa.queue.js.queuejs');
});

Route::get('/jstrees', function () {
    return view('dsa.trees.js.treesjs');
});


Route::get('/logics', function () {
    return view('logical.logical');
});

Route::get('/logics/test', function () {
    return view('logical.test');
});



// git init
// git add .
// git commit -m "Add existing project files to Git"
// git remote add origin https://github.com/cameronmcnz/example-website.git
// git push -u -f origin master


