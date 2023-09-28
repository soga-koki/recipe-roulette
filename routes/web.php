<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RecipeController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;

// ルート URL のルーティング
Route::get('/', function () {
    return view('welcome');
});

// ランダムなレシピを表示
Route::get('/recipes/random/{category}', [RecipeController::class, 'random'])->name('recipes.random');


// 認証が必要なルーティング
Route::middleware(['auth'])->group(function () {
    // ダッシュボード
    Route::get('/dashboard', [UserController::class, 'dashboard'])->name('user_dashboard')->middleware(['verified']);

    // レシピ関連のルーティング
    Route::resource('recipes', RecipeController::class);

    // コメント関連のルーティング
    // Route::post('/comments', [CommentController::class, 'store'])->name('comments.store');
    Route::post('/comments/{recipeId}', [CommentController::class, 'store'])->name('comments.store');
});

// ゲストユーザーのみアクセス可能なルーティング
Route::middleware('guest')->group(function () {
    // 管理者ログインフォーム
    Route::get('/admin/login', [AdminController::class, 'showLoginForm'])->name('admin.login.form');
    // 管理者ログイン処理
    Route::post('/admin/login', [AdminController::class, 'login'])->name('admin.login');
});

// 認証と管理者権限が必要なルーティング
Route::middleware(['auth', 'ensureUserIsAdmin'])->prefix('admin')->name('admin.')->group(function () {
    // 管理者ダッシュボード
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
    // ユーザー関連のルーティング（詳細ページを除く）
    Route::resource('users', UserController::class)->except('show');
    // レシピ関連のルーティング（詳細ページを除く）
    Route::resource('recipes', RecipeController::class)->except('show');
    // コメント関連のルーティング（詳細ページを除く）
    Route::resource('comments', CommentController::class)->except('show');
    // ... (その他の管理者ルート)
    Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');

    
});
require __DIR__.'/auth.php';
