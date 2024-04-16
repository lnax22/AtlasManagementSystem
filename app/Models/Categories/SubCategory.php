<?php

namespace App\Models\Categories;

use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    const UPDATED_AT = null;
    const CREATED_AT = null;
    protected $fillable = [
        'main_category_id',
        'sub_category',
    ];
    public function mainCategory(){
        // リレーションの定義
        {
         return $this->belongsTo('App\Models\Categories\mainCategory','sub_categories','main_category_id','sub_category');
        }
    }

    public function posts(){
        // リレーションの定義
    {
        return $this->hasMany('App\Models\posts\post');
    }
}
}
