<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SignupRequest extends FormRequest
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
    public function rules()
    {
        return [
            'name'=>'bail|required|min:3|max:15',
            'email'=>'bail|required|email',
            'password'=>'bail|required|min:3',
            'repeat-password'=>'bail|required',
        ];
    }
    public function messages()
    {
       return [
           'name.required'=>"tai khoan khong duoc de trong",
           'name.min'=>"tai khoan it nhat 6 ky tu",
           'name.max'=>"tai khoan toi da 10 ky tu",
           'email.required'=>"email khong duoc de trong",
           'emai.email'=>"sai định dạng email",
           'password.required'=>"mat khau khong duoc de trong",


       ];
    }
}
