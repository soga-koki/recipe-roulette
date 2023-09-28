<!-- resources/views/dashboard.blade.php -->

@extends('layouts.app')
<link href="{{ asset('css/dashboard.css') }}" rel="stylesheet">

@section('content')
<div class="container">
    <!-- ヘッダー部分 -->
    <header class="header">
        <h1>ようこそ、{{ Auth::user()->name }}さん</h1>
        
        <!-- ログアウトボタンをヘッダーに移動 -->
        <form method="POST" action="{{ route('logout') }}" style="margin-left: auto;">
            @csrf
            <button type="submit" class="btn btn-danger">ログアウト</button>
        </form>
    </header>

    <!-- メインコンテンツ部分 -->
    <main class="main-content">
        <section>
            <h2>プロフィール情報</h2>
            <p><strong>ユーザー名:</strong> {{ Auth::user()->name }}</p>
            <p><strong>メールアドレス:</strong> {{ Auth::user()->email }}</p>
        </section>

        <section class="main-content">
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
        </section>
    </main>
</div>

@endsection
