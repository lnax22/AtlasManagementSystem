<?php

namespace App\Http\Requests\BulletinBoard;

use Illuminate\Foundation\Http\FormRequest;

class PostFormRequest extends FormRequest
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
        'main_category_name'=>'required|string|max:100|unique:main_categories,main_category',
        'main_category_id'=>'required|in:1,2,3,4',
        'sub_category_name'=>'required|string|max:100|unique:sub_categories,sub_category'
      ];
    }

    

}
