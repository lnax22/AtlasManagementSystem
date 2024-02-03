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
            'mail_address' =>'required|email:rfc,dns|unique:users,mail_address|max:100',
            'sex' =>'required|in:1,2,3',
            'old' => 'required_with:old_month,old_day,old_year|after_or_equal:2000-01-01|date',
            'role'=>'required|in:1,2,3,4',
            'password'=>'required|min:8|max:30|confirmed',
        ];
    }

    public function getValidatorInstance()
    {
        if ($this->input('old_day') && $this->input('old_month') && $this->input('old_year'))
        {
            $birthDate = implode('-', $this->only(['old_year', 'old_month', 'old_day']));
            $this->merge([
            'old' => $birthDate,
            ]);
        }

        return parent::getValidatorInstance();
    }

}
