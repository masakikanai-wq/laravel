<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    // テーブル名
    protected $table = 'articles';

    // 可変項目
    protected $fillable = 
    [
        'title',
        'content'
    ];

    // ここの記述の意味調べる
    public function comments()
    {
        return $this->hasMany('App\Models\Comment');
    }
}
