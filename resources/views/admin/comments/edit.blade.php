<!-- C:\xampp\htdocs\recipe-roulette\resources\views\admin\comments\edit.blade.php -->
@extends('layouts.app')
<link href="{{ asset('css/edit.css') }}" rel="stylesheet">

@section('content')
<div class="container">
    <h2 class="title">コメントの編集</h2>

    <form action="{{ route('admin.comments.update', $comment) }}" method="POST" class="form">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="text" class="form-label">コメント内容</label>
            <textarea name="text" id="text" rows="4" class="form-textarea">{{ $comment->text }}</textarea>
        </div>

        <button type="submit" class="btn">更新</button>
    </form>
</div>
@endsection
