@extends('layouts.app')
<link href="{{ asset('css/edit.css') }}" rel="stylesheet">
@section('head')

@endsection

@section('content')
<div class="container">
    <h2 class="title">ユーザー情報の編集</h2>

    <form action="{{ route('admin.users.update', $user) }}" method="POST" class="form">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="name" class="form-label">ユーザー名</label>
            <input type="text" name="name" id="name" value="{{ $user->name }}" required class="form-input">
        </div>

        <div class="form-group">
            <label for="email" class="form-label">Email</label>
            <input type="email" name="email" id="email" value="{{ $user->email }}" required class="form-input">
        </div>

        <div class="form-group">
            <label for="role" class="form-label">役割</label>
            <select name="role" id="role" class="form-select">
                <option value="user" {{ $user->role == 'user' ? 'selected' : '' }}>User</option>
                <option value="admin" {{ $user->role == 'admin' ? 'selected' : '' }}>Admin</option>
            </select>
        </div>

        <button type="submit" class="btn">更新</button>
    </form>
</div>
@endsection
