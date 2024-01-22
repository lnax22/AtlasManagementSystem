<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidationRequest extends FormRequest
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
        return [
            'over_name' =>'required|string|max:10',
            'under_name' =>'required|string|max:10',
            'over_name_kana' =>'required|regex:/\A[ァ-ヴー]+\z/u|string|max:30',
            'under_name_kana' =>'required|regex:/\A[ァ-ヴー]+\z/u|string|max:30',
            'mail_address' =>'required|email:rfc,dns|unique:users,mail|max:100',
            'sex' =>'required|in:1,2,3',
            'old_year' =>'required|after_or_equal:2000-01-01|date_format:Y-m-d',
            'old_month'=>'required|after_or_equal:2000-01-01|date_format:Y-m-d',
            'old_day'=>'required|date_format:Y-m-d|date_format:Y-m-d',
            'role'=>'required,|in:1,2,3,4',
            'password'=>'required|min:8|max:30|confirmed',
        ];
    }

}
