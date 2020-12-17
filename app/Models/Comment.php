<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    //
    protected $fillable = [
        'post_id',
        'body',
    ];

    // テーブル間のリレーションの設定をしている記述
    // 投稿は複数のコメントを持ち、コメントは一つの投稿に従属するという意味
    public function articles()
    {
        return $this->belongsTo('App\Models\Article');
    }
}
