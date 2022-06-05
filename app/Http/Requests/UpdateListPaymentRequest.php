<?php

namespace App\Http\Requests;

use App\Models\ListPayment;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateListPaymentRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('list_payment_edit');
    }

    public function rules()
    {
        return [
            'name' => [
                'string',
                'nullable',
            ],
            'image' => [
                'array',
                'nullable',
            ],
            'image.*.id' => [
                'integer',
                'exists:media,id',
            ],
            'payment_access' => [
                'string',
                'nullable',
            ],
        ];
    }
}
