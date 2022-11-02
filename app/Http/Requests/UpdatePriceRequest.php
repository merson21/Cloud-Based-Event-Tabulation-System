<?php

namespace App\Http\Requests;

use App\Models\Price;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdatePriceRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('price_edit');
    }

    public function rules()
    {
        return [
            'title' => [
                'string',
                'required',
            ],
            'content' => [
                'required',
            ],
        ];
    }
}
