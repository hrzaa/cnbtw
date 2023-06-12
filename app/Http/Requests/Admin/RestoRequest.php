<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class RestoRequest extends FormRequest
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
            'resto_name' => 'required|max:255',
            'users_id' => 'required|exists:users,id',
            'culiner_id' => 'required|exists:culiners,id',
            'price' => 'required|integer',
            'address' => 'required',
            'address_link' => 'required',
        ];
    }
}
