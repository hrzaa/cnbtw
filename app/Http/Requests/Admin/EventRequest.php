<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class EventRequest extends FormRequest
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
            'event_name' => 'required|max:255', 
            'users_id' => 'required|exists:users,id', 
            'date_start' => 'required', 
            'date_end' => 'required', 
            'event_desc_id' => 'required', 
            'event_desc_en' => 'required', 
            'address' => 'required', 
            'address_link' => 'required', 
        ];
    }
}
