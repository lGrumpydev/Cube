<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use App\Rules\UniquePair;

class LikeStoreRequest extends FormRequest
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
            'postId'            =>  
            [ 
                'required', 
                'exists:posts,id', 
                'gte:0', 
                'numeric', 
                'max:9999999999', 
                 new UniquePair('likes','user_id',Auth::id()) 
            ], 
             
        ]; 
    }
}
