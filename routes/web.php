<?php
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeeController;
use App\Http\Livewire\Students;

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
    return view('welcome');
});

Route::group(['prefix' => LaravelLocalization::setLocale(), 'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']], function () {


    Route::get('/dashboard', function () {
        return view('dashboard');
    })->middleware(['auth'])->name('dashboard');

    Route::get('/Summary', function () {
        return view('Summary');
    })->middleware(['auth'])->name('Summary');

    Route::get('/crudajax', function () {
        return view('crudajax');
    })->middleware(['auth'])->name('crudajax');

    // Route::get('/students', function () {
    //     return view('students');
    // })->middleware(['auth'])->name('students');

    // Route::livewire('students','students');
    Route::get('/fetch-all',[EmployeeController::class,'fetchAll'])->name('fetchAll');
    Route::post('/delete',[EmployeeController::class,'delete'])->name('delete');
    Route::post('/update',[EmployeeController::class,'update'])->name('update');
    Route::get('/edit',[EmployeeController::class,'edit'])->name('edit');
    Route::post('/store', [EmployeeController::class,'store'])->name('store');




      Route::get('/students',Students::class);





    Route::get('/add', function () {
        return view('add');
    })->middleware(['auth'])->name('add');

    Route::post('/create-post', [PostController::class, 'createPost'])->name('post.create');
    Route::get('/delete-post/{id}', [PostController::class, 'deletepost']);
    Route::get('/edit-post/{id}', [PostController::class, 'editPost']);
    Route::post('/update-post',[PostController::class,'updatepost'])->name('post.update');
});

require __DIR__ . '/auth.php';
