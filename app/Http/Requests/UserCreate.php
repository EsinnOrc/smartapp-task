<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class UserCreate extends FormRequest
{
   
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'company_name' => 'required',
            'name' => 'required|string',
            'surname' => 'required|string',
            'email' => 'required|email|unique:users,email',
            'phone' => 'required|string|unique:users,phone',
            'password' => 'required|string',
        ];
    }

    public function messages(): array {
        return [
            'company_name.required' => 'Lütfen bir şirket adı giriniz.',
            'name.required' => "Lütfen adınızı giriniz.",
            'surname.required' => 'Lütfen soyadınızı giriniz.',
            'email.required' => 'Lütfen e-posta adresinizi giriniz.',
            'email.email' => 'Lütfen geçerli bir e-posta adresi giriniz.',
            'email.unique' => 'Bu e-posta adresi zaten kayıtlı.',
            'phone.required' => 'Telefon numarası alanı zorunludur.',
            'phone.unique' => 'Bu telefon numarası zaten kullanılıyor.',
            'password.required' => 'Parola alanı zorunludur.',
            'password.min' => 'Parolanız en az 8 karakter içermelidir.',


        ];
    }
    protected function failedValidation(Validator $validator): void
    {
        throw new HttpResponseException(response()->json([
            'success' => false,
            'message' => 'Validation failed.',
            'errors' => $validator->errors(),
        ], 422));
    }
}