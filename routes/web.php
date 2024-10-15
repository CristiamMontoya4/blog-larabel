<?php
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\PageController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
/**     
 * Route::get      |  Consultar
 * Route::post     |  Guardar
 * Route::delete   |  Eliminar
 * Route::put      |  Actualizar
 */


 Route::controller(PageController::class)->group(function () {
    Route::get('/',           'home')->name('home');
    Route::get('blog/{post:slug}', 'post')->name('post');
});


Route::redirect('dashboard', 'posts')->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

//Realiza todas las rutas, con excepcion de show
Route::resource('posts', PostController::class)->middleware(['auth', 'verified'])->except(['show']);

require __DIR__.'/auth.php';
