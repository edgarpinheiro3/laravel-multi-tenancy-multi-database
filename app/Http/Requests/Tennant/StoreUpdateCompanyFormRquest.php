<?php

namespace App\Http\Requests\Tennant;

use Illuminate\Foundation\Http\FormRequest;

class StoreUpdateCompanyFormRquest extends FormRequest
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

        $id = $this->id;

        return [
            'name' => 'required',
            'domain' => "required|unique:companies, domain, {$id}.domain",
            'db_database' => 'required|unique:companies,',
            'db_hostname' => 'required|min:3|max:100',
            'db_username' => 'required|min:3|max:100',
            'db_password' => 'required|min:3|max:35',
        ];

    }
}
