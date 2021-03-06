<?php

namespace App\Http\Requests;

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
    public function rules()
    {
        $method=$this->method();
        switch($method)
        {
            case 'POST': {
                return [
                    "name"=>"required|max:255"
                    ];
            }



            case 'PUT': {
                return ["name"=>"required|max:255"];
            }
            default:return[];
        }

    }

    public function messages()
    {
        return[
            "name.required"=>"Name field cannot be empty.", "id.required"=>"Id field cannot be empty."
        ];
    }
}
