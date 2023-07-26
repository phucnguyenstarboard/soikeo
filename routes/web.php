<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;

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

Route::get('login', [AuthController::class, 'index'])->name('login');
Route::post('post-login', [AuthController::class, 'postLogin'])->name('login.post'); 
Route::get('registration', [AuthController::class, 'registration'])->name('register');
Route::post('post-registration', [AuthController::class, 'postRegistration'])->name('register.post'); 
Route::get('logout', [AuthController::class, 'logout'])->name('logout');
Route::get('dashboard', [AuthController::class, 'dashboard'])->name('dashboard')->middleware('auth');
Route::get('tournaments', [AuthController::class, 'tour'])->name('tour')->middleware('auth');
Route::get('tournaments/{id}', [AuthController::class, 'tourEdit'])->name('tour_edit')->middleware('auth');
Route::post('tournaments/{id}', [AuthController::class, 'postTourEdit'])->name('edit_tour.post')->middleware('auth');
Route::get('match/{id}', [AuthController::class, 'matchEdit'])->name('match_edit')->middleware('auth');
Route::post('match/{id}', [AuthController::class, 'postMatchEdit'])->name('match_edit.post')->middleware('auth');

Route::get('info', [AuthController::class, 'info'])->name('info')->middleware('auth');
Route::post('info', [AuthController::class, 'postInfo'])->name('info.post')->middleware('auth');

Route::get('tournaments-add', [AuthController::class, 'tourAdd'])->name('tour_add')->middleware('auth');
Route::post('tournaments-add', [AuthController::class, 'postTourAdd'])->name('tour_add.post')->middleware('auth');

Route::get('match-add', [AuthController::class, 'matchAdd'])->name('match_add')->middleware('auth');
Route::post('match-add', [AuthController::class, 'postMatchAdd'])->name('match_add.post')->middleware('auth');

Route::post('del-match', [AuthController::class, 'postMatchDel'])->name('match_delete.post')->middleware('auth');



Route::get('/', function () {
    $user = \DB::table('users')->where('id', 1)->first();
    return view('home', compact('user'));
});

route::get('/detail', [HomeController::class, 'detail'])->name('detail');

route::get('/getSdtjList', [HomeController::class, 'getSdtjList'])->name('getSdtjList');
route::get('/getWdList', [HomeController::class, 'getWdList'])->name('getWdList');
route::get('/getAllMatchList', [HomeController::class, 'getAllMatchList'])->name('getAllMatchList');
route::get('/getBgcList', [HomeController::class, 'getBgcList'])->name('getBgcList');
route::get('/getBifenList', [HomeController::class, 'getBifenList'])->name('getBifenList');
route::get('/getQcList', [HomeController::class, 'getQcList'])->name('getQcList');
route::get('/getSaikuangList', [HomeController::class, 'getSaikuangList'])->name('getSaikuangList');
route::get('/getGaoBeiList', [HomeController::class, 'getGaoBeiList'])->name('getGaoBeiList');

route::get('/getDetailYcChartsInfo', [HomeController::class, 'getDetailYcChartsInfo'])->name('getDetailYcChartsInfo');
route::get('/getDetailLeftLists', [HomeController::class, 'getDetailLeftLists'])->name('getDetailLeftLists');

route::get('/download', [HomeController::class, 'index'])->name('index');

