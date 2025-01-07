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
    return view('dsa.ll.sll.linklist');
});

Route::get('/links', function () {
    return view('pagelinks.01links');
});


Route::get('/csll', function () {
    return view('dsa.ll.csll.CircularSinglyLL');
});
Route::get('/dll', function () {
    return view('dsa.ll.dll.DoublyLL');
});
Route::get('/dll01', function () {
    return view('dsa.ll.dll.01Doublyll');
});
Route::get('/cdll', function () {
    return view('dsa.ll.cdll.CircularDoublyLL');
});
//=======================================

//=======================================
Route::get('/singlylljs', function () {
    return view('dsa.ll.lljs.slljs.singlylljs');
});
//=======================================


//=======================================
Route::get('/jsq', function () {
    return view('dsa.queue.js.queuejs');
});
//=======================================

//=======================================
Route::get('/phpq', function () {
    return view('dsa.queue.q.01queuephp');
});

Route::get('/phpcq', function () {
    return view('dsa.queue.cq.01circularqphp');
});

Route::get('/phppq', function () {
    return view('dsa.queue.pq.01priorityqphp');
});


Route::get('/phpdq', function () {
    return view('dsa.queue.dq.01doubleendedqphp');
});

Route::get('/phpinputrestrictdq', function () {
    return view('dsa.queue.dq.02inputrestrictdqphp');
});

Route::get('/phpoutputrestrictdq', function () {
    return view('dsa.queue.dq.03outputrestrictdqphp');
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
Route::get('/avlsearchdelete', function () {
    return view('dsa.trees.AVLTree.02avlSearchDelete');
});
//=======================================


//=======================================
//route for Red Blaack tree
Route::get('/rbtree', function () {
    return view('dsa.trees.RBTree.01rbtree');
});

Route::get('/rbtsearchdelete', function () {
    return view('dsa.trees.RBTree.02rbtree');
});


//=======================================






//=======================================

Route::get('/phpgraph', function () {
    return view('dsa.graphs.adjancylist.01graphphp');
});
//=======================================

//=======================================
Route::get('/logics', function () {
    return view('logical.logical.01logical');
});

Route::get('/logics/test', function () {
    return view('logical.test');
});

Route::get('/logics/prac', function () {
    return view('logical.practice.01practice');
});

//route for hacker rank problems solving
Route::get('/logics/hacker', function () {
    return view('logical.hacker.01hacker');
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

