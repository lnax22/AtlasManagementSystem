<?php

namespace App\Models\Posts;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    const UPDATED_AT = null;
    const CREATED_AT = null;

    protected $fillable = [
        'user_id',
        'post_title',
        'post',
        'main_category_id',
        'sub_category'
    ];

    public function user(){
        return $this->belongsTo('App\Models\Users\User');
    }

    public function postComments(){
        return $this->hasMany('App\Models\Posts\PostComment');
    }

     //belongsToMany('関係するモデル', '中間テーブルのテーブル名', '中間テーブルで関係しているカラム', '第3引数で書かれたカラムと関係しているカラム

    public function subCategory(){
        // リレーションの定義
        return $this->belongsTo(SubCategory::class);
    }


    // コメント数
    public function commentCounts($post_id){
        return Post::with('postComments')->find($post_id)->postComments();
    }
}
