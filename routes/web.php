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


//=======================================
Route::get('/', function () {
    return view('dsa.ll.linklist');
});

Route::get('/csll', function () {
    return view('dsa.ll.CircularSinglyLL');
});
Route::get('/dll', function () {
    return view('dsa.ll.DoublyLL');
});
Route::get('/cdll', function () {
    return view('dsa.ll.CircularDoublyLL');
});
//=======================================

//=======================================
Route::get('/singlylljs', function () {
    return view('dsa.ll.lljs.singlylljs');
});
//=======================================


//=======================================
Route::get('/jsq', function () {
    return view('dsa.queue.js.queuejs');
});
//=======================================

//=======================================
Route::get('/phpq', function () {
    return view('dsa.queue.queuephp');
});

Route::get('/phpstack', function () {
    return view('dsa.stack.stackphp');
});
//=========================================

//=======================================
//route for BST
Route::get('/jsbstree', function () {
    return view('dsa.trees.bstree.js.bstreejs');
});
Route::get('/bstree', function () {
    return view('dsa.trees.bstree.bstreephp');
});

Route::get('/bstreecreate', function () {
    return view('dsa.trees.bstree.01bstreephp');
});
//=======================================


//=======================================
//route for avl tree
Route::get('/avltree', function () {
    return view('dsa.trees.AVLTree.01avltreecreate');
});
//=======================================




//=======================================

Route::get('/phpgraph', function () {
    return view('dsa.graphs.graphphp');
});
//=======================================

//=======================================
Route::get('/logics', function () {
    return view('logical.logical');
});

Route::get('/logics/test', function () {
    return view('logical.test');
});

Route::get('/logics/prac', function () {
    return view('logical.prac');
});
//=======================================

//=======================================
Route::get('/search/linear', function () {
    return view('search.linear.linear');
});

Route::get('/search/binary', function () {
    return view('search.binary.binary');
});
//=======================================

//=======================================
Route::get('/sort/bubble', function () {
    return view('sort.bubble.bubble');
});

//=======================================

// git init
// git add .
// git commit -m "Add existing project files to Git"
// git remote add origin https://github.com/cameronmcnz/example-website.git
// git push -u -f origin master


// git remote -v
//git checkout -B master
//git config --global user.name "Inforavibhushan"
//git pull orign main



//git status
//git add .
//git commit -m "message"
//git branch
//git push origin master

//https://www.photowall.se/
//https://creator.nightcafe.studio/
//https://www.alphacodingskills.com/php/php-data-structures.php

////_rureir_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_eerrtrxfsdfsdfg

//git config --global user.name "FIRST_NAME LAST_NAME"
//git config --global user.email "your email id"

