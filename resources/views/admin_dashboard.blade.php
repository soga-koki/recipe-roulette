<!-- resources/views/admin_dashboard.blade.php -->

@extends('layouts.app')
<link href="{{ asset('css/admin_dashboard.css') }}" rel="stylesheet">

@section('content')

<div class="container">
    <h1>管理者ダッシュボード</h1>

    <h2>ユーザー管理</h2>
    <table class="table">
        <thead>
            <tr>
                <th>ユーザー名</th>
                <th>Email</th>
                <th>役割</th>
                <th>編集</th>
                <th>削除</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->role }}</td>
                    <td><a href="{{ route('admin.users.edit', $user) }}">編集</a></td>
                    <td>
                        <form action="{{ route('admin.users.destroy', $user) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit">削除</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <h2>レシピ管理</h2>
     <!-- レシピ投稿ボタンの追加 -->
     <div class="mb-3">
        <a href="{{ route('admin.recipes.create') }}" class="btn btn-primary">レシピを投稿</a>
    </div>
    <table class="table">
        <thead>
            <tr>
                <th>レシピid</th>
                <th>タイトル</th>
                <th>カテゴリー</th>
                <th>誰が作った？</th>
                <th>編集</th>
                <th>削除</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($recipes as $recipe)
                <tr>
                    <td>{{ $recipe->id }}</td>
                    <td>{{ $recipe->title }}</td>
                    <td>{{ $recipe->category }}</td>
                    <td>{{ $recipe->user->name }}</td>
                    <td><a href="{{ route('admin.recipes.edit', $recipe) }}">編集</a></td>
                    <td>
                        <form action="{{ route('admin.recipes.destroy', $recipe) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit">削除</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>


    <h2>コメント管理</h2>
    <table class="table">
        <thead>
            <tr>
                <th>コメント</th>
                <th>ユーザーid</th>
                <th>レシピid</th>
                <th>編集</th>
                <th>削除</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($comments as $comment)
                <tr>
                    <td>{{ $comment->text }}</td>
                    <td>{{ $comment->user_id }}</td>
                    <td>{{ $comment->recipe_id }}</td>
                    <td><a href="{{ route('admin.comments.edit', $comment) }}">編集</a></td>
                    <td>
                        <form action="{{ route('admin.comments.destroy', $comment) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit">削除</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>



@endsection
