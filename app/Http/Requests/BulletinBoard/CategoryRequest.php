<?php

namespace App\Http\Requests\BulletinBoard;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */

    public function rules(){
      return [
        'main_category_name' => 'required|string|max:100|unique:main_categories,main_category',
        'main_category_id' => 'required|exists:main_categories,id',
        'sub_category_name' => 'required|string|max:100|unique:sub_categories,sub_category'
      ];
    }

    public function messages(){
    return [
        'main_category_name.required' => 'メインカテゴリーは必須項目です。',
        'main_category_name.string' => 'メインカテゴリーは文字列で入力してください。',
        'main_category_name.max' => 'メインカテゴリーは100文字以内で入力してください。',
        'main_category_name.unique' => '既に同じ名前のメインカテゴリーが存在します。',
        'main_category_id.required' => 'メインカテゴリーは必須項目です。',
        'main_category_id.exists' => '選択されたメインカテゴリーは登録されていません。',
        'sub_category_name.required' => 'サブカテゴリーは必須項目です。',
        'sub_category_name.string' => 'サブカテゴリーは文字列で入力してください。',
        'sub_category_name.max' => 'サブカテゴリーは100文字以内で入力してください。',
        'sub_category_name.unique' => '既に同じ名前のサブカテゴリーが存在します。'
    ];
  }


}
