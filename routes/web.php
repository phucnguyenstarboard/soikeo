<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

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
    return view('home');
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