<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
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
            'email' => 'required|string|email|max:191|unique:users,email,' . $this->user->id,
            'name' => ['required', 'string', 'max:191'],
            'last_name' => ['required', 'string', 'max:191'],
            'role' => ['required'],
            'age' => ['required'],
            'password' => ['sometimes', 'string', 'min:8'],
        ];
    }
}
