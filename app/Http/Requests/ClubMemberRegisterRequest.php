<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClubMemberRegisterRequest extends FormRequest
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
            'name' => 'required|string|max:255',
            'surname' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|max:5|confirmed',
            'phone_number' => 'required|string|max:255|unique:users',
            'gender' => 'required|string|in:Male,Female,Others',
            'date_of_birth' => 'required|date',
            'country_of_origin' => 'required|string|max:255',
            'nationality' => 'required|string|max:255',
        ];
    }
}
