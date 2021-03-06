<?php

use Illuminate\Support\Facades\Route;
use App\Models\Book;
use Illuminate\Support\Facades\DB;

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

Route::get('/', function(){
    $books = DB::table('books')->get();
    // echo '<pre>';
    // print_r($books);
    return view('book', [
        'books' => $books
    ]);
});