<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductFormRequest extends FormRequest
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
        'category_id'=>[
            "required",
            "integer"
        ],
        'name'=>[
            "required",
            "string",
         
        ],
        'slug'=>[
        
            
            
        ],
        'brand'=>[
        
           
            "string",
            "max:255"
            
        ],

        'description'=>[
            "required",
            "string"
                     ],
        
        'original_price'=>[
            "required",
            "string"

           ],
        'selling_price'=>[
            "required",
           "string"
                    ],

            'quantity'=>[
                    "required",
                    "string"
           
                ],


           'trending'=>["required",
          
                
        ],
        'status'=>[
            "nullable",
      
  ],
  'image'=>[
    "nullable",
    // "mimes:jpeg,jpg,png"
],
      
        


       
                 ];
                 return $rules;
}
}
