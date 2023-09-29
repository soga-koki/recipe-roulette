<!-- resources/views/admin/recipes/create.blade.php -->

@extends('layouts.app')

@section('content')
<div class="container">
    <h1>レシピ投稿</h1>

    <form action="{{ route('admin.recipes.store') }}" method="post">
        @csrf

        <div class="mb-3">
            <label for="title" class="form-label">タイトル</label>
            <input type="text" class="form-control" id="title" name="title" required>
        </div>

        <div class="mb-3">
            <label for="category" class="form-label">カテゴリー</label>
            <select class="form-control" id="category" name="category" required>
                <option value="">--選択してください--</option>
                <option value="そば">そば</option>
                <option value="うどん">うどん</option>
                <option value="パスタ">パスタ</option>
                <option value="どんぶり">どんぶり</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="ingredients" class="form-label">材料</label>
            <textarea class="form-control" id="ingredients" name="ingredients" rows="3" required></textarea>
        </div>

        <div class="mb-3">
            <label for="instructions" class="form-label">説明</label>
            <textarea class="form-control" id="instructions" name="instructions" rows="3" required></textarea>
        </div>
        
        <button type="submit" class="btn btn-primary">投稿</button>
    </form>
</div>
@endsection
