<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use CodeZero\UniqueTranslation\UniqueTranslationRule;

class BrandRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $data= [
            'name.*'=>['required','string','max:100' ,UniqueTranslationRule::for('brands')->ignore($this->id) ],
            "status"=>"required|in:1,0",
            "logo"=>"required|image|mimes:png,jpg",
        ];
        if($this->method() == 'PUT'){

           $data['logo']="nullable|mimes:png,jpg";
        }

        return $data;
    }
}
