@extends('layouts.app')
<link href="{{ asset('css/edit.css') }}" rel="stylesheet">
@section('head')

@endsection

@section('content')
<div class="container">
    <h2 class="title">レシピの編集</h2>

    <form action="{{ route('admin.recipes.update', $recipe) }}" method="POST" class="form">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="title" class="form-label">タイトル</label>
            <input type="text" name="title" id="title" value="{{ $recipe->title }}" required class="form-input">
        </div>

        <div class="form-group">
            <label for="category" class="form-label">カテゴリー</label>
            <select name="category" id="category" required class="form-select">
                <option value="そば" {{ $recipe->category == 'そば' ? 'selected' : '' }}>そば</option>
                <option value="うどん" {{ $recipe->category == 'うどん' ? 'selected' : '' }}>うどん</option>
                <option value="パスタ" {{ $recipe->category == 'パスタ' ? 'selected' : '' }}>パスタ</option>
                <option value="どんぶり" {{ $recipe->category == 'どんぶり' ? 'selected' : '' }}>どんぶり</option>
                <!-- 他のカテゴリーを追加 -->
            </select>
        </div>

        <div class="form-group">
            <label for="ingredients" class="form-label">材料</label>
            <textarea name="ingredients" id="ingredients" rows="5" required class="form-textarea">{{ $recipe->ingredients }}</textarea>
        </div>

        <div class="form-group">
            <label for="instructions" class="form-label">手順</label>
            <textarea name="instructions" id="instructions" rows="5" required class="form-textarea">{{ $recipe->instructions }}</textarea>
        </div>

        <button type="submit" class="btn">更新</button>
    </form>
</div>
@endsection