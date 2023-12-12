<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryFormRequest extends FormRequest
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
        $rules= [
            'name'=>[
                "required",
                "string",
                "max:200"

            ],
            'slug'=>[
            
               
                
            ],
            'description'=>["required"
        ],
            'image'=>[
                "required",
                "mimes:jpeg,jpg,png"
            ],
            'title'=>[
                "required",
                "string",
                "max:200"
          
            
               
            ],
            'status'=>[
                "nullable",
                
            ]


           
                     ];
                     return $rules;
    }
}
