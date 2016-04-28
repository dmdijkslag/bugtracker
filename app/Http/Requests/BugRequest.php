<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class BugRequest extends Request
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
            'subject' => 'required|min:3',
            'description' => 'required',
            'published_at' => 'required|date',
            'file_attachment' => 'max:5000'
        ];
    }

    public function messages()
    {
        return [
            'subject.required' => 'Geef het onderwerp op!',
            'description.required' => 'Geef een zo goed mogelijke omschrijving van de fout of wijziging.',
        ];
    }    
}
