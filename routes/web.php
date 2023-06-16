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

Route::get('/csll', function () {
    return view('dsa.ll.CircularSinglyLL');
});

Route::get('/singlylljs', function () {
    return view('dsa.ll.lljs.singlylljs');
});

Route::get('/jsq', function () {
    return view('dsa.queue.js.queuejs');
});

Route::get('/phpq', function () {
    return view('dsa.queue.queuephp');
});

Route::get('/phpstack', function () {
    return view('dsa.stack.stackphp');
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




// git status
//git add .
//git commit -m "message"
//git branch
//git push origin master