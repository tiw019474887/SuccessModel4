<?php
namespace App\Http\Requests;

use App\Http\Requests\Request;

class StoreUserPostRequest extends Request
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
        switch ($this->method()) {
            case 'GET':
            case 'DELETE': {
                return [];
            }
            case 'POST':
            {
                return [
                    'title' => 'required|max:255',
                    'firstname' => 'required|max:255',
                    'lastname' => 'required|max:255',
                    'email' => 'required|email|unique:User,email,NULL,id,deleted_at,NULL',
                    'password' => 'max:255',
                    'vpassword' => 'max:255|same:password',
                ];
            }
            case 'PUT':
            case 'PATCH':
            {
                return [
                    'title' => 'required|max:255',
                    'firstname' => 'required|max:255',
                    'lastname' => 'required|max:255',
                    'email' => 'email|required|max:255',
                    'password' => 'max:255',
                    'vpassword' => 'max:255|same:password',
                ];
            }
            default:break;
        }



    }

    public function messages()
    {
        return [
            'vpassword.same' => "Verify password and Password must match.",
        ];
    }


}
