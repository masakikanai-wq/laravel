<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// ここでCommentモデルを呼び出す
use App\Models\Comment;
use App\Http\Requests\CommentRequest;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */

    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }
    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(CommentRequest $request)
    {
        //
        $comment = new Comment;
        $input = $request->only($comment->getFillable());
        // dd($input);
        $comment = $comment->create($input);

        return redirect()->action('ArticleController@show', ['id' => $request->post_id]);
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
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id)
    {
        //
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
        $comment = Comment::findOrFail($id);
        $comment->delete();

        // return redirect(route('articles'));
        return redirect()->action('ArticleController@show', ['id' => $comment->post_id]);
    }
}
