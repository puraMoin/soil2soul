<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardsController;
use App\Http\Controllers\SegmentsController;
use App\Http\Controllers\CountriesController;
use App\Http\Controllers\StatesController;
use App\Http\Controllers\CitiesController;
use App\Http\Controllers\RolesRightsController;
use App\Http\Controllers\MenuLinkController;
use App\Http\Middleware\CheckSession;


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

/*Registration*/
Route::get('/register', [AuthController::class, 'singUp'])->name('register');
Route::post('/register', [AuthController::class, 'register'])->name('register');

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware([CheckSession::class])->group(function () {

/*MenuLinks*/
Route::prefix('menulink')->group(function () {
    Route::get('/index', [MenuLinkController::class, 'index'])->name('menulink.index');
    Route::get('/add', [MenuLinkController::class, 'add'])->name('menulink.add');
    Route::post('/store', [MenuLinkController::class, 'store'])->name('menulink.store');
    Route::get('/edit/{id}', [MenuLinkController::class, 'edit'])->name('menulink.edit');
    Route::post('/update/{id}', [MenuLinkController::class, 'update'])->name('menulink.update');
    Route::get('/view/{id}', [MenuLinkController::class, 'view'])->name('menulink.view');
});

Route::get('/get-methods-for-controller', function(Request $request) {
    $controller = $request->input('controller');
    $methods = (new MenuLinkController)->getMethodsForController($controller);

    return response()->json(['methods' => $methods]);
})->name('get.methods.for.controller');

Route::post('/get-route-name', [MenuLinkController::class, 'getRouteName'])->name('get.route.name');

Route::get('/dashboard', [DashboardsController::class, 'index'])->name('dashboards.index');

/*Segment Master*/
Route::prefix('segments')->group(function () {
    Route::get('/index', [MenuLinkController::class, 'index'])->name('segments.index');
    Route::get('/add', [MenuLinkController::class, 'add'])->name('segments.add');
    Route::post('/store', [MenuLinkController::class, 'store'])->name('segments.store');
    Route::get('/edit/{id}', [MenuLinkController::class, 'edit'])->name('segments.edit');
    Route::post('/update/{id}', [MenuLinkController::class, 'update'])->name('segments.update');
    Route::get('/view/{id}', [MenuLinkController::class, 'view'])->name('segments.view');
});

/*Countries Master*/
Route::prefix('countries')->group(function () {
    Route::get('/index', [CountriesController::class, 'index'])->name('countries.index');
    Route::get('/add', [CountriesController::class, 'add'])->name('countries.add');
    Route::post('/store', [CountriesController::class, 'store'])->name('store');
    Route::get('/edit/{id}', [CountriesController::class, 'edit'])->name('countries.edit');
    Route::post('/update/{id}', [CountriesController::class, 'update'])->name('update'); 
    Route::get('/show/{id}', [CountriesController::class, 'show'])->name('countries.show');
});

  Route::resource('states', StatesController::class);
  Route::resource('cities', CitiesController::class);
  

  Route::get('/get-states/{countryId}', [StatesController::class, 'getStates']);
  Route::resource('roles-rights', RolesRightsController::class);

});



Route::get('/', function () {return view('auth.login');});

