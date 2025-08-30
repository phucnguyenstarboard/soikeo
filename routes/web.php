<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ContactController;

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

Route::get('/', [HomeController::class, 'home'])->name('home');
Route::get('/join', [HomeController::class, 'join'])->name('join');
Route::get('/login', [LoginController::class, 'getLogin'])->name('login');
Route::post('/login', [LoginController::class, 'postLogin'])->name('post_login');
Route::get('/register', [LoginController::class, 'getRegister'])->name('get_register');
Route::post('/register', [LoginController::class, 'postRegister'])->name('post_register');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
Route::post('/last-session', [HomeController::class, 'lastSession'])->name('last_session');
Route::post('/form-bet', [HomeController::class, 'postBet'])->name('form_bet');

Route::get('/profile', [ProfileController::class, 'profile'])->name('profile');
Route::get('/deposit', [ProfileController::class, 'deposit'])->name('deposit');
Route::get('/withdraw', [ProfileController::class, 'withdraw'])->name('withdraw');
Route::get('/history-bet', [ProfileController::class, 'historyBet'])->name('history_bet');
Route::get('/history-transaction', [ProfileController::class, 'historyTransaction'])->name('history_transaction');
Route::get('/bank', [ProfileController::class, 'bank'])->name('bank');
Route::get('/password-fund', [ProfileController::class, 'passwordFund'])->name('password_fund');

Route::get('/notifications', [ProfileController::class, 'notifications'])->name('notify');

Route::post('/profile', [ProfileController::class, 'postProfile'])->name('post_profile');
Route::post('/deposit', [ProfileController::class, 'postDeposit'])->name('post_deposit');
Route::post('/withdraw', [ProfileController::class, 'postWithdraw'])->name('post_withdraw');
Route::post('/history-bet', [ProfileController::class, 'postHistoryBet'])->name('post_history_bet');
Route::post('/history-transaction', [ProfileController::class, 'postHistoryTransaction'])->name('post_history_transaction');
Route::post('/bank', [ProfileController::class, 'postBank'])->name('post_bank');
Route::post('/password-fund', [ProfileController::class, 'postPasswordFund'])->name('post_password_fund');

Route::post('/form-notice', [HomeController::class, 'postNotice'])->name('form_notice');

Route::get('/contact', [ContactController::class, 'index'])->name('contact');
Route::get('/chat', [ContactController::class, 'chat'])->name('chat');
Route::post('/chat', [ContactController::class, 'postChat'])->name('post_chat');

Route::get('/history-chat', [ContactController::class, 'historyChat'])->name('history_chat');
Route::post('/history-chat', [ContactController::class, 'postHistoryChat'])->name('post_history_chat');
