<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePorjectRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            //php artisan make:request UpdateProjectRequest
            'title' => 'sometimes|required|max:255',
            // php artisan tinker
            // $u = User::find(1)
            // Task::factory() ->for ($u,'creator')->create()
        ];
    }
}