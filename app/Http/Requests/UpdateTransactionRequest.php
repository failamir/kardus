<?php

namespace App\Http\Requests;

use App\Models\Transaction;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;
use Illuminate\Support\Arr;

class UpdateTransactionRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('transaction_edit');
    }

    public function rules()
    {
        return [
            'user_id' => [
                'integer',
                'exists:users,id',
                'nullable',
            ],
            'payment_id' => [
                'integer',
                'exists:list_payments,id',
                'nullable',
            ],
            'total_bill' => [
                'numeric',
                'nullable',
            ],
            'total_pay' => [
                'numeric',
                'nullable',
            ],
            'course_id' => [
                'integer',
                'exists:courses,id',
                'nullable',
            ],
            'payment_token' => [
                'string',
                'nullable',
            ],
            'status' => [
                'nullable',
                'in:' . implode(',', Arr::pluck(Transaction::STATUS_RADIO, 'value')),
            ],
        ];
    }
}
