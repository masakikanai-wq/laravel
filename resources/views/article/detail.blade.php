@extends('layout')
@section('title', '記事詳細')

@section('detail')
    <!-- 記事詳細表示 -->
    <article>
        <div class="info">
            <h2>{{ $article->title}}</h2>
        </div>
        <p>{{ $article->content }}</p>
        <p class="routing"><a href="/">一覧に戻る</a></p>
        <p class="routing"><a href="{{ route('article.edit', $article->id) }}">編集</a></p>
        <form method="POST" action="{{ route('article.destroy', $article->id) }}">
            @csrf
            @method('DELETE')
            <button class="btn-submit-delete">この記事を削除する</button>
        </form>
    </article>
@endsection

@section('commentForm')
    <section id="comment-submit-wrapper">
        <div class="container">
            <!-- エラーメッセージの表示 -->
            @if (session('err_msg'))
                <p class="text-danger">{{ session('err_msg')}}</p>
            @endif
            <div class="comment-submit">
                <form action="{{ route('comment.store') }}" method="post">
                @csrf
                    @if ($errors->has('body'))
                        <p>{{ $errors->first('body') }}</p>
                    @endif
                    <input type="hidden" name="post_id" value="{{ $article->id }}">
                    <div class="input-body">
                        <textarea name="body" id="body" class="post-it post-it-blue"></textarea>
                        <input class="btn-submit" type="submit" name="btn_submit" value="コメントを書く">
                        <div class="input-submit">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection

@section('commentShow')
  <!-- コメント表示部分 -->
    <div class="comment-display">
        <h3>コメント一覧</h3>
        <hr>
        <div class="comment-display-area">
            @csrf
            <div class="comment-input-body">
            @forelse($comments as $comment)
                    <div class="comment-input-posts">
                        <p class="post-it post-it-blue">{{ $comment->body}}</p>
                        <div class="delete-submit">
                            <form method="POST" action="{{ route('comment.destroy', $comment->id) }}">
                                @csrf
                                @method('DELETE')
                                <button class="btn-submit-delete">コメントを消す</button>
                            </form>
                            <!-- <input type="hidden" name="del" value="<?php print $comment['id'] ?>"/>
                            <input class="btn-submit-delete" type="submit" name="btn_submit" value="コメントを消す" onclick="return confirm('コメントを削除しますか？')"> -->
                        </div>
                    </div>
            @empty
                <p>コメントはまだありません</p>
            @endforelse
            </div>
        </div>
    </div>
@endsection

