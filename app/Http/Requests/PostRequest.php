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
                    "id"=>"required|max:255"
                ];
            }
            case 'POST': {
                return ["title"=>"required|max:255"];
            }
            default:return[];
        }

    }

    public function messages()
    {
        return [
            "id.required"=>"Id field is empty", "title.required"=>"Title field is empty"
        ];
    }
}
