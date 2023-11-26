<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
        return [
            //
            'username' => ['required'],
            'email'=> ['required','unique:users,email'],
            'password'=> ['required'],
            'account_name' => ['sometimes'], // "sometimes" means validate if it is present, or leave it alone otherwise.
        ];
    }


    //default role 
     /**

     * Prepare the data for validation.

     */

     protected function prepareForValidation()

     {
 
         $this->merge([
 
             'account_name' => $this->account_name ?? "null", // Sets a default role of 2 if none is provided.
 
         ]);
 
     }
 
     /**
 
      * Get all of the input and files for the request.
 
      * Including the default value for 'role' if it is missing.
 
      * 
 
      * @return array
 
      */
 
     public function all($keys = null)
 
     {
 
         $data = parent::all();
 
         $data['id_role'] = $data['id_role'] ?? 2; // Provide default role if it's not set.
 
         return $data;
 
     }
 
}
