<?php

namespace App\Http\Requests;

use App\Models\Criterion;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreCriterionRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('criterion_create');
    }

    public function rules()
    {
        return [
            'status' => [
                'required',
            ],
            'title_id' => [
                'required',
                'integer',
            ],
            'category_id' => [
                'required',
                'integer',
            ],
            'name' => [
                'string',
                'required',
            ],
        ];
    }
}
