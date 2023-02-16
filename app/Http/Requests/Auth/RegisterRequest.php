<?php

namespace App\Http\Requests\Auth;

use Sourcetoad\RuleHelper\Rule;
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
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'state.name' => [Rule::required(), Rule::string()],
            'state.email' => [Rule::required(), Rule::string(), Rule::email(), Rule::unique("users", 'email')],
            'state.password' => [Rule::required(), Rule::string(), Rule::min(8), Rule::same('state.passwordConfirmation')],
        ];
    }
}
