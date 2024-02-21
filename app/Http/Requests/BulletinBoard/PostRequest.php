<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
{

  /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */

    //認可と呼ばれるもので、そのユーザーがこのリクエストを通す権利を持っているかどうかを判定する際に使用
    public function authorize()
    {
        //"true"を返すことで常に許可することができる
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
      return[
        'post_category_id' =>'required|string|in:1,2,3,4',
        'post_title' =>'required|string|max:100',
        'post_body' =>'required|string|max:5000',

      ];
    }

}
