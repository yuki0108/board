<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    public function comments() {
        // １つの投稿は複数のコメントを所有する
        return $this->hasMany('App\Comment');
    }

    public function Category() {
        // １つの投稿は1つのカテゴリーに所属する
        return $this->belongsTo('App\Category');
    }
}
