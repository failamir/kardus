<?php

namespace App\Http\Requests;

use App\Models\LearnProgress;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateLearnProgressRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('learn_progress_edit');
    }

    public function rules()
    {
        return [
            'user_id' => [
                'integer',
                'exists:users,id',
                'nullable',
            ],
            'topic_id' => [
                'integer',
                'exists:topics,id',
                'nullable',
            ],
        ];
    }
}
