<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MedicalController;
use App\Http\Controllers\PdfController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AgenceController;
use App\Http\Controllers\FiltreController;

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

/*
Route::get('/', function () {
    return view('welcome');
});
*/

Route::get('/', function () {
    return redirect()->route('login');
});


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');


Route::get('/home', function(){
    return view('home');
});

Route::group(['middleware' => ['auth']], function() {
    Route::resource('users', UserController::class);
    Route::resource('roles', RoleController::class);
    //Route::resource('permissions', PermissionController::class);
    Route::resource('MedicalController', MedicalController::class);
    Route::resource('agence', AgenceController::class);
    Route::resource('PdfController', PdfController::class);
  });

//Route::resource('BigController', BigController::class);


require __DIR__.'/auth.php';


Route::name('dashboard.home')->get('/dashboard/home', function(){
    return view('/dashboard/home', [UserController::class, 'index']);
});


// Route::name('filtreperso')->get('/Bigcontroller/perso',[FiltreController::class, 'personnePhysique'] );
// Route::name('filtrepro')->get('/Bigcontroller/pro',[FiltreController::class, 'personneMorale'] );

// Route::name('test')->get('/test',[BigController::class, 'index1'] );


/*Route::get('/dashboard/formulaire', function(){
    return view('/dashboard/forms/index');
});

Route::get('/dashboard/addform', function(){
    return view('/dashboard/forms/create');
});

Route::post('/formpost', function(){
    dd($_POST);
})->name('formpost');*/
