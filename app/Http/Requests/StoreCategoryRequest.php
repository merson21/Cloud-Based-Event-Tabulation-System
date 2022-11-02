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
        return Gate::allows('category_create');
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
            'name' => [
                'string',
                'required',
            ],
            'percentage' => [
                'required',
            ],
            'partipants' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
        ];
    }
}
