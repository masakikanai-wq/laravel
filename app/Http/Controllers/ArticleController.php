<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// ここでArticleモデルを呼び出す
use App\Models\Article;
use App\Models\Comment;
use App\Http\Requests\ArticleRequest;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */

    public function index()
    {
        // Articleモデルを使用してallでdbから全てのデータを取得できる
        $articles = Article::paginate(5);
        // 配列の形で$articlesをindex.blade.phpに受け渡す
        return view('article.index', ['articles'=>$articles]);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create(ArticleRequest $request)
    {
        // リクエストされた情報を全て受け取る処理
        $inputs = $request->all();

        \DB::beginTransaction();
        try {
            // 記事を登録する
            Article::create($inputs);
            \DB::commit();
        } catch(\Throwable $e) {
            \DB::rollback();
            abort(500);
        }

        // 記事が登録されたときのフラッシュを表示
        \Session::flash('err_msg', '記事を登録しました');

        return redirect(route('articles'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {
        //
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
        $article = Article::find($id);
        $comments = Comment::where('post_id', $id)->get();

        if (is_null($article)){
            \Session::flash('err_msg', 'データがありません');
            return redirect(route('articles'));
        }
        return view('article.detail', ['article'=>$article], ['comments'=>$comments]);
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //
        $article = Article::findOrFail($id);
        return view('article.edit', ['article' => $article]);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update(ArticleRequest $request)
    {
        //
        // リクエストされた情報を全て受け取る処理
        $inputs = [
            'id' => $request->id,
            'title' => $request->title,
            'content' => $request->content,
        ];

        $article = Article::findOrFail($request->id);
        $article->fill($inputs)->save();

        // 記事が登録されたときのフラッシュを表示
        \Session::flash('err_msg', '記事を更新しました');

        return redirect(route('articles'));

    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy(Request $request)
    {
        //
        $request = Article::findOrFail($request->id);
        $request->delete();

        return redirect(route('articles'));
    }
}
