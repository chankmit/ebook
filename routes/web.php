<?php

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
    $books=App\Book::all(); 
    return view('welcome',['books'=>$books]);
});

Route::get('/show/{id}', function ($id) {   
    $book=App\Book::findOrfail($id);
    return view('book.show',['book'=>$book]);
});
Route::get('/show/cat/{id}', function ($id) {   
    $books=App\Book::Where('category_id',$id)->get();
    //return $books;
    return view('welcome',['books'=>$books]);
});

Auth::routes();
Route::get('/home', 'BookController@index')->name('home');
Route::resource('/admin/book', 'BookController');
Route::resource('/admin/category', 'CategoryController');
