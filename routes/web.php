<?php
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\BlogCategoryController;
use App\Http\Controllers\Admin\PortfolioController;
use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\UserController;
use App\Mail\contactUsMail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
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
    return view('welcome');
});

Auth::routes();
Route::get('/data',[UserController::class,'index']);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware(['auth','isAdmin'])->prefix('admin')->group(function() {
    // Route assigned name "admin"...
    Route::get('/', function () {
        return redirect()->route('dashboard');
    });

    // Admin Dashboard
    Route::get('/dashboard', [AdminController::class, 'index'])->name('dashboard');

    //All BlogCategory
    Route::get('/all-category', [BlogCategoryController::class, 'index'])->name('all_category');
    Route::get('/add-category', [BlogCategoryController::class, 'add'])->name('add_category');
    Route::post('/insert-category', [BlogCategoryController::class, 'insert'])->name('insert_category');
    Route::get('/edit-category/{id}', [BlogCategoryController::class, 'edit'])->name('edit_category')->where('id', '[0-9]+');
    Route::put('/update-category/{id}', [BlogCategoryController::class, 'update'])->name('update_category')->where('id', '[0-9]+');
    Route::get('/delete-category/{id}', [BlogCategoryController::class, 'delete'])->name('delete_category')->where('id', '[0-9]+');
    
    //All Blogs
    Route::get('/all-blog', [BlogController::class, 'index'])->name('all_blog');
    Route::get('/add-blog', [BlogController::class, 'add'])->name('add_blog');
    Route::post('/insert-blog', [BlogController::class, 'insert'])->name('insert_blog');
    Route::get('/edit-blog/{id}', [BlogController::class, 'edit'])->name('edit_blog')->where('id', '[0-9]+');
    Route::put('/update-blog/{id}', [BlogController::class, 'update'])->name('update_blog')->where('id', '[0-9]+');
    Route::get('/delete-blog/{id}', [BlogController::class, 'delete'])->name('delete_blog')->where('id', '[0-9]+');

    //Featured Blog
    Route::post('/featured-blog', [BlogController::class, 'featuredBlog'])->name('featured_blog');
    Route::get('/get-featured-blog',[BlogController::class,'getFeaturedBlog'])->name('get_featured_blog');

    //All Portfolio
    Route::get('/all-portfolio', [PortfolioController::class, 'index'])->name('all_portfolio');
    Route::get('/add-portfolio', [PortfolioController::class, 'add'])->name('add_portfolio');
    Route::post('/insert-portfolio', [PortfolioController::class, 'insert'])->name('insert_portfolio');
    Route::get('/edit-portfolio/{id}', [PortfolioController::class, 'edit'])->name('edit_portfolio')->where('id', '[0-9]+');
    Route::put('/update-portfolio/{id}', [PortfolioController::class, 'update'])->name('update_portfolio')->where('id', '[0-9]+');
    Route::get('/delete-portfolio/{id}', [PortfolioController::class, 'delete'])->name('delete_portfolio')->where('id', '[0-9]+');

    //All Contacts
    Route::get('/contact', [ContactController::class, 'index'])->name('contact');
    Route::get('/search', [ContactController::class, 'search'])->name('search');
    Route::get('/reply-contact/{id}', [ContactController::class, 'view'])->name('reply_contact');
    Route::get('/delete-contact/{id}', [ContactController::class, 'delete'])->name('delete_contact')->where('id', '[0-9]+');
    Route::post('/reply-contact-email', [ContactController::class, 'reply'])->name('reply_contact_email');
    Route::get('/download-file/{file}', [ContactController::class, 'download'])->name('download_file');
    Route::get('/status-contact', [ContactController::class, 'status'])->name('status_contact');


 });

 