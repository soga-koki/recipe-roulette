<!-- resources/views/welcome.blade.php -->

@extends('layouts.app')
<link href="{{ asset('css/welcome.css') }}" rel="stylesheet">

@section('content')
<div class="container">
    <!-- ヘッダー部分 -->
    <header class="header">
        <h1>レシピルーレット</h1>
        <nav>
            <ul>
                <li><a href="{{ route('login') }}">会員ログイン</a></li>
                <li><a href="{{ route('admin.login') }}">管理者ログイン</a></li>
                <li><a href="{{ route('register') }}">新規登録</a></li>
            </ul>
        </nav>
    </header>

   <!-- メインコンテンツ部分 -->
    <main class="main-content">
        <h2>レシピカテゴリから選ぶ</h2>
        <ul class="recipe-category-list">
            <li>
                <a href="{{ route('recipes.random', ['category' => 'そば']) }}">
                <img src="{{ asset('image/soba.png') }}" alt="そばのレシピ" class="recipe-image" />
                    <span class="recipe-label">そばのランダムレシピ</span>
                </a>
            </li>
            <li>
                <a href="{{ route('recipes.random', ['category' => 'うどん']) }}">
                    <img src="{{ asset('image/udon.png') }}" alt="うどんのレシピ" class="recipe-image" />
                    <span class="recipe-label">うどんのランダムレシピ</span>
                </a>
            </li>
            <li>
                <a href="{{ route('recipes.random', ['category' => 'パスタ']) }}">
                    <img src="{{ asset('image/spaghetti.png') }}" alt="パスタのレシピ" class="recipe-image" />
                    <span class="recipe-label">パスタのランダムレシピ</span>
                </a>
            </li>
            <li>
                <a href="{{ route('recipes.random', ['category' => 'どんぶり']) }}">
                    <img src="{{ asset('image/donburi.png') }}" alt="どんぶりのレシピ" class="recipe-image" />
                    <span class="recipe-label">どんぶりのランダムレシピ</span>
                </a>
            </li>
        </ul>
    </main>
</div>
@endsection