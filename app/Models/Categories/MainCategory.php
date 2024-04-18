<?php

namespace App\Models\Categories;

use Illuminate\Database\Eloquent\Model;

class MainCategory extends Model
{
    const UPDATED_AT = null;
    const CREATED_AT = null;
    protected $fillable = [
        'main_category',
        'main_category_id'
    ];

    public function subCategory(){
        // リレーションの定義
        //belongsToMany('関係するモデル', '中間テーブルのテーブル名', '中間テーブルで関係しているカラム', '第3引数で書かれたカラムと関係しているカラム
    {
        return $this->hasMany('App\Models\Categories\subCategory','main_category_id', 'id');
    }
}

}
