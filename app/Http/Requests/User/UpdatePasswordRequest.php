<?php

namespace App\Http\Requests\User;

use App\Rules\MatchOldPassword;
use App\Rules\CheckSamePassword;
use Illuminate\Foundation\Http\FormRequest;

class UpdatePasswordRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'current_password' => ['required', new MatchOldPassword],
            'password' => ['required','confirmed','min:6', new CheckSamePassword]
        ];
    }
}
