<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class userRequest extends FormRequest
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
        if($this->route('user') == null){
            return [
                'name' => 'required|max:255',
                'username' => 'required|max:255|unique:users',
                'password' => 'required|min:4|confirmed',
            ];
        }
        else
        {
            return [
                'name' => 'required|max:255',
                'username' => 'required|max:255',
                'password' => 'required|min:4|confirmed',
            ];
        }
        
    }
}
