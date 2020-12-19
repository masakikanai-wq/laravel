@extends('layout')
@section('title', '記事一覧')

@section('post')
    <div class="bbs">
        <h2 class="content-header">さぁ、最新のニュースをシェアしましょう！</h2>
        <!-- エラーメッセージ表示 -->
        @if (session('err_msg'))
            <div class="flash_message bg-success text-center py-3 my-0">
                <p class="text-danger">{{ session('err_msg')}}</p>
            </div>
        @endif
        <!-- 投稿フォーム -->
        <!-- actionのところに書くルーティングはこれで合っているか確認する -->
        <form action="{{ route('create') }}" method="post" onsubmit="return submitChk()">
        @csrf
            <div>
                @if ($errors->has('title'))
                    <p>{{ $errors->first('title') }}</p>
                @endif
                <label for="view_name">タイトル</label>
                <input id="view_name" type="text" name="title" value="{{ old('title') }}">
            </div>
            <div>
                @if ($errors->has('content'))
                    <p>{{ $errors->first('content') }}</p>
                @endif
                <label for="message">記事</label>
                <textarea name="content" id="message" cols="30" rows="10">{{ old('content')}}</textarea>
            </div>
            <div class="input-submit">
                <input class="btn" type="submit" name="btn_submit" value="送信">
            </div>
        </form>
    </div>
@endsection

@section('showArticle')
    <!-- 記事内容表示 -->
    <div class="container-articles">
    @foreach($articles as $article)
        <article>
            <div class="info">
                <h2>{{ $article->title}}</h2>
            </div>
            <p>{{ $article->content }}</p>
            <p class="routing"><a href="/article/{{ $article->id }}">記事全文・コメントを見る</a></p>
        </article>
        <hr>
    @endforeach
    </div>
    {{ $articles->links('pagination::default') }}
@endsection