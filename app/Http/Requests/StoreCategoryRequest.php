<?php

namespace App\Http\Requests;

use App\Models\Category;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreCategoryRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('principal_create');
    }

    public function rules()
    {

        return [
            'principal_name' => [
                'required',
                'string',
                'unique:principals',
                'max:30'
            ],

        ];
    }
}
