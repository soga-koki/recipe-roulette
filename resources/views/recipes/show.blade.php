@extends('layouts.app')
<link href="{{ asset('css/show.blade.css') }}" rel="stylesheet">

<div class="flex-center">
    <div class="content">
        @section('content')
        <!-- ユーザーダッシュボードに遷移するボタン -->
        @if(auth()->check())  <!-- ログインしている場合のみ表示 -->
            <div class="user-dashboard-button">
                <a href="{{ route('user_dashboard') }}">ユーザーダッシュボードへ</a>
            </div>
        @endif
        <!-- もう一度ランダムに表示 -->
        <div class="random-again-button">
            <a href="{{ route('recipes.random', ['category' => $recipe->category]) }}">もう一度ランダムに表示</a>
        </div>
        
        <div class="recipe-detail">
            <h2 class="recipe-title">{{ $recipe->title }}</h2>
            
            <div class="recipe-ingredients">
                <h3>材料</h3>
                <ul>
                @foreach(explode('、', $recipe->ingredients) as $ingredient)
                    <li>・{{ trim($ingredient) }}</li>
                @endforeach
                </ul>
            </div>
            
            <div class="recipe-instructions">
                <h3>手順</h3>
                <ol>
                @foreach(explode('。', $recipe->instructions) as $instruction)
                    @if(trim($instruction) != '')
                        <li>{{ trim($instruction) }}</li>
                    @endif
                @endforeach
                </ol>
            </div>
        </div>

        @if(Auth::check())
            <!-- コメントフォーム -->
            <form id="comment-form">
                @csrf
                <textarea name="text"></textarea>
                <button type="submit">コメントする</button>
            </form>
        @endif
        
        <h3>コメント</h3>
        <div id="comments">  
            @foreach($recipe->comments as $comment)
                <div>
                    <strong>{{ $comment->user->name }}</strong>・ {{ $comment->text }}
                </div>
            @endforeach
        </div>
    </div>
</div>

<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- JavaScript -->
<script>
$(document).ready(function() {
    $('#comment-form').submit(function(e) {
        e.preventDefault();
        
        const formData = {
            text: $('textarea[name="text"]').val(),
            _token: '{{ csrf_token() }}'
        };
        
        $.ajax({
            url: '{{ route("comments.store", $recipe->id) }}',
            type: 'POST',
            data: formData,
            success: function(response) {
                $('#comments').append('<div><strong>' + response.user + '</strong>・ ' + response.comment + '</div>');
                $('textarea[name="text"]').val('');
            }
        });
    });
});
</script>

@endsection
