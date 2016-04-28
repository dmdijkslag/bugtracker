<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;
use App\User;

class UserRequest extends Request
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
        switch($this->method())
        {
            case 'GET':
            case 'DELETE':
            {
                return [];
            }
            case 'POST':
            {
                return [
                    'name' => 'required|min:3',
                    'email'      => 'required|email|unique:users,email',
                    'password'   => 'required|confirmed',
                    'project_id' => 'required',
                ];
            }
            case 'PUT':
            case 'PATCH':
            {
                return [
                    'name' => 'required|min:3',
                    'email'      => 'required|email|unique:users,email,'.$this->segment(2).',user_id',
                    'project_id' => 'required',
                ];
            }
            default:break;
        }        
    }

    public function messages()
    {
        return [
            'name.required' => 'Geef de naam op van de gebruiker!',
            'email.required' => 'E-mailadres is verplicht!',
            'email.unique' => 'E-mailadres is al in gebruik!',
            'password.required' => 'Wachtwoord is verplicht!',
            'password.same' => 'Wachtwoorden komen niet overeen!',
            'project_id.required' => 'Selecteer minimaal 1 project!',
        ];
    }    
}
