<?php

use App\Http\Controllers\AdminstraionController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CoursesController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DashboardController
;
use App\Http\Controllers\subscriptionController;

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
Route::group(['prefix' => '/'], function () {
    
    Route::get('/', [HomeController::class, 'index'])->name('home');
    Route::get('/about', function () { return view('about'); })->name('about');
    Route::get('/classes', function () { return view('courses'); })->name('class');
    Route::get('/team', function () { return view('team'); })->name('team');
    Route::get('/gallery', function () { return view('gallery'); })->name('gallery');
    Route::get('/contact', function () { return view('contact'); })->name('contact');

    Route::get('/course/{id}', [CoursesController::class, 'course_id'])->name('course');
});

Route::middleware(['auth', 'verified'])->group(function () {

    Route::get('/enroll/{id}', [CoursesController::class, 'course_join'])->name('course_join');
    Route::post('/enroll/{id}', [CoursesController::class, 'course_join_post'])->name('course_join_post');
    Route::get('/playlist/{id}', [CoursesController::class, 'playlist'])->name('playlist');

    Route::group(['prefix' => '/dashboard'], function () {

        Route::get('/', [DashboardController::class, 'dashboard'])->name('dashboard');
        
        Route::get('/content', [CoursesController::class, 'contetn_show'])->name('course_contetn_show');
        Route::get('/content', [CoursesController::class, 'contetn_add'])->name('course_contetn_add');

        Route::group(['prefix' => '/cats'], function () {

            Route::get('/', [CategoriesController::class, 'grades'])->name('categories');
            Route::post('/', [CategoriesController::class, 'grades_add'])->name('categories_add');
            Route::post('/edit/{id}', [CategoriesController::class, 'grades_edit'])->name('categories_edit');
            Route::delete('/{id}', [CategoriesController::class, 'grades_delete'])->name('categories_delete');
        });

        Route::group(['prefix' => '/courses'], function () {

            Route::get('/', [CategoriesController::class, 'courses'])->name('courses');
            Route::post('/', [CategoriesController::class, 'courses_add'])->name('courses_add');
            Route::post('/edit/{id}', [CategoriesController::class, 'courses_edit'])->name('courses_edit');
            Route::delete('/{id}', [CategoriesController::class, 'courses_delete'])->name('courses_delete');
        });

        Route::group(['prefix' => '/chapters'], function () {

            Route::get('/', [CategoriesController::class, 'chapters'])->name('chapters');
            Route::post('/', [CategoriesController::class, 'chapters_add'])->name('chapters_add');
            Route::post('/edit/{id}', [CategoriesController::class, 'chapters_edit'])->name('chapters_edit');
            Route::delete('/{id}', [CategoriesController::class, 'chapters_delete'])->name('chapters_delete');
        });

        Route::group(['prefix' => '/subscription'], function () {

            Route::get('/', [subscriptionController::class, 'index'])->name('subscriptions');
            Route::post('/{id}', [subscriptionController::class, 'approve'])->name('approve_payment');
            Route::get('/show', [subscriptionController::class, 'students'])->name('students');
            Route::post('/show/{v}/{id}', [subscriptionController::class, 'enable'])->name('student.enable');
        });

        Route::group(['prefix' => '/administration'], function () {

            Route::get('/', [AdminstraionController::class, 'index'])->name('admin');
            Route::post('/', [AdminstraionController::class, 'add_admin'])->name('create_new_user');
            
            Route::get('/show', [subscriptionController::class, 'students'])->name('students');
            Route::post('/show/{v}/{id}', [subscriptionController::class, 'enable'])->name('student.enable');
        });

    });
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require_once __DIR__.'/auth.php';
