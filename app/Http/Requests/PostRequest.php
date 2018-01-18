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
                    "category"=>"required|exists:categories,id",
                    "title"=>"required|max:255",
                    "content"=>"required|max:1000",
                    "slug"=>"required|max:255|alpha_dash|unique:posts,slug"
                ];
            }
            case 'PUT': {
                return ["category"=>"required|exists:categories,id",
                    "title"=>"required|max:255",
                    "content"=>"required|max:1000",
                    "slug"=>"required|max:255|alpha_dash|unique:posts,slug,".$this->segment(2)];
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
