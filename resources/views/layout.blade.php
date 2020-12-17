<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
</head>
<body>
    <!-- データベース接続確認 -->
    <!-- この部分いらないと思うので後で削除 -->
    <?php 
        try {
            $db = new PDO('mysql:dbname=laravel_news;host=localhost;charset=utf8','root','root');
            // 接続成功の文字を出したいときはコメントアウトを解除
            // echo 'DB Connection Success!';
        } catch(PDOException $e) {
            echo 'DB接続エラー:' . $e->getMessage();
        };
    ?>
    <!-- ヘッダー -->
    <nav class="main-header">
        @include('header')
    </nav>
    <!-- 記事詳細 -->
    <section id="detail-wrapper">
        <div class="container">
            @yield('detail')
        </div>
    </section>
    <!-- 記事投稿フォーム -->
    <section id="bbs-wrapper">
        <div class="container">
            @yield('post')
        </div>
    </section>
    <!-- ラインの表示 -->
    <section>
        <div class="container">
            <hr>
        </div>
    </section>
    <!-- 記事一覧表示 -->
    <section id="message-wrapper">
        <div class="container">
            @yield('showArticle')
        </div>
    </section>
    <!-- 記事詳細/コメント投稿フォーム -->
    <section id="comment-wrapper">
        <div class="container">
            @yield('commentForm')
        </div>
    </section>
    <!-- 記事詳細/コメント表示 -->
    <section id="comment-display-wrapper">
        <div class="container">
            @yield('commentShow')
        </div>
    </section>

    <script src="script.js"></script>
</body>
</html>