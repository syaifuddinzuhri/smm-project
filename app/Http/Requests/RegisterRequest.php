<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
            'username'                  => 'required|string|unique:members',
            'password'                  => 'required|string|min:6|confirmed',
            'password_confirmation'     => 'required|string|min:6'
        ];
    }

    public function messages()
    {
        return [
            'username.required'                 => 'Username tidak boleh kosong!',
            'username.unique'                   => 'Username sudah terdaftar!',
            'password.required'                 => 'Password tidak boleh kosong!',
            'password.confirmed'                => 'Password tidak sama!',
            'password.min'                      => 'Password minimal 6 karakter!',
            'password_confirmation.required'    => 'Konfirmasi password tidak boleh kosong.!',
            'password_confirmation.min'         => 'Konfirmasi password minimal 6 karakter!',
        ];
    }
}