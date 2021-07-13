<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Facades\DB;

class UniquePair implements Rule
{

    public $table,$SisterAttribute,$SisterValue;
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct($table,$SisterAttribute,$SisterValue) 
    { 
        // 
        $this->table=$table; 
        $this->SisterAttribute=$SisterAttribute; 
        $this->SisterValue=  $SisterValue; 
 
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value) 
    { 
        // 
        $isUniquePair=DB::table($this->table)->where($attribute,$value)->where($this->SisterAttribute,$this->SisterValue)->doesntExist(); 
        return $isUniquePair; 
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message() 
    { 
        return 'The combination of :attribute and his sister key is not unique'; 
    }
}
