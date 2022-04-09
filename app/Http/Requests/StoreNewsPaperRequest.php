<?php

namespace App\Http\Requests;

use App\Models\Pain;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;
use Illuminate\Validation\Rule;
use App\Rules\ScriptTags;

class StoreNewsPaperRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('newspaper_create');
    }

    public function rules()
    {

        return [
            'title' => [
                'required',
                new ScriptTags(),
                'string',
                'max:255',
            ],
            'date' => [
                'required',
            ],

        ];
    }
}
