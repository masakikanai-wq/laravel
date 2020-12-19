@extends('layout')
@section('title', '記事編集')

@section('postEdit')
    <div class="bbs">
        <!-- エラーメッセージ表示 -->
        @if (session('err_msg'))
            <div class="flash_message bg-success text-center py-3 my-0">
                <p class="text-danger">{{ session('err_msg')}}</p>
            </div>
        @endif
        <!-- 編集画面 -->
        <form action="{{ route('article.update', $article->id) }}" method="post" onsubmit="return submitChk()">
        @csrf
        @method('PUT')
            <div>
                @if ($errors->has('title'))
                    <p>{{ $errors->first('title') }}</p>
                @endif
                <label for="view_name">タイトル</label>
                <input id="view_name" type="text" name="title" value="{{ old('title') ?: $article->title }}">
            </div>
            <div>
                @if ($errors->has('content'))
                    <p>{{ $errors->first('content') }}</p>
                @endif
                <label for="message">記事</label>
                <textarea name="content" id="message" cols="30" rows="10">{{ old('content') ?: $article->content }}</textarea>
            </div>
            <button type="submit">保存する</button>
        </form>
    </div>
@endsection