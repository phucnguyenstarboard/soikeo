<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Admin\CategoryController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [HomeController::class, 'index'])->name('home');
// Route::get('/login', [LoginController::class, 'getLogin'])->name('login');
Route::get('/login', [LoginController::class, 'getLogin'])->name('login');
Route::post('/login', [LoginController::class, 'postLogin'])->name('post_login');
Route::get('/register', [LoginController::class, 'getRegister'])->name('get_register');
Route::post('/register', [LoginController::class, 'postRegister'])->name('post_register');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
Route::post('/last-session', [HomeController::class, 'lastSession'])->name('last_session');
Route::post('/form-bet', [HomeController::class, 'postBet'])->name('form_bet');

Route::get('/profile', [AdminController::class, 'profile'])->name('profile');
Route::get('/lottery', [AdminController::class, 'lottery'])->name('lottery');
Route::get('/transaction', [AdminController::class, 'transaction'])->name('transaction');

Route::get('/setting', [AdminController::class, 'setting'])->name('setting');
Route::get('/bank', [AdminController::class, 'bank'])->name('bank');
Route::get('/bet', [AdminController::class, 'historyBet'])->name('bet');
Route::get('/deposit', [AdminController::class, 'deposit'])->name('deposit');
Route::get('/withdraw', [AdminController::class, 'withdraw'])->name('withdraw');

Route::post('/lottery', [AdminController::class, 'postLottery'])->name('post_lottery');
Route::post('/profile', [AdminController::class, 'postProfile'])->name('post_profile');


Route::post('/deposit', [AdminController::class, 'postDeposit'])->name('post_deposit');
Route::post('/confirm-deposit', [AdminController::class, 'postConfirmDeposit'])->name('confirm_deposit');

Route::post('/withdraw', [AdminController::class, 'postWithdraw'])->name('post_withdraw');
Route::post('/confirm-withdraw', [AdminController::class, 'postConfirmWithdraw'])->name('confirm_withdraw');


Route::post('/setting', [AdminController::class, 'postSetting'])->name('post_setting');

Route::post('/bet', [AdminController::class, 'postHistoryBet'])->name('post_history_bet');
Route::post('/bet-status', [AdminController::class, 'postStatusBet'])->name('update_status_bet');

Route::post('/history-transaction', [AdminController::class, 'postHistoryTransaction'])->name('post_history_transaction');
Route::post('/bank', [AdminController::class, 'postBank'])->name('post_bank');
Route::post('/update-bank', [AdminController::class, 'updateBank'])->name('update_bank');
Route::post('/password-fund', [AdminController::class, 'postPasswordFund'])->name('post_password_fund');

Route::get('/user', [UserController::class, 'index'])->name('user');
Route::post('/user-search', [UserController::class, 'search'])->name('user_search');
Route::post('/user-profile', [UserController::class, 'profile'])->name('user_profile');
Route::post('/user-change-pass', [UserController::class, 'changePass'])->name('user_password');
Route::post('/user-change-fun-pass', [UserController::class, 'changeFunPass'])->name('user_fun_pass');
Route::post('/user-balance', [UserController::class, 'updateBalance'])->name('user_balance');
Route::post('/user-delete', [UserController::class, 'delete'])->name('user_delete');
Route::post('/user-prize', [UserController::class, 'prize'])->name('user_prize');

Route::get('/product', [CategoryController::class, 'index'])->name('admin_category');
Route::get('/product/add', [CategoryController::class, 'add'])->name('admin_category_add');
Route::post('/insert-product', [CategoryController::class, 'insert'])->name('admin_insert_category');
Route::get('/product/edit/{id}', [CategoryController::class, 'edit'])->name('admin_category_edit');
Route::post('/product/edit/{id}', [CategoryController::class, 'update'])->name('admin_category_update');
Route::post('/product/delete', [CategoryController::class, 'delete'])->name('admin_category_delete');
