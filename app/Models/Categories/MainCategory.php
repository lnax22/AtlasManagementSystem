<?php

namespace App\Models\Categories;

use Illuminate\Database\Eloquent\Model;

class MainCategory extends Model
{
    const UPDATED_AT = null;
    const CREATED_AT = null;
    protected $fillable = [
        'main_category',
        'main_category_id',
        'sub_category'
    ];

    public function subCategory(){
        // リレーションの定義
        return $this->hasMany(SubCategory::class);
    }
}
