<?php

namespace App\Http\Requests;

use App\Models\Schedule;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateScheduleRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('schedule_edit');
    }

    public function rules()
    {
        return [
            'teacher_id' => [
                'integer',
                'exists:users,id',
                'nullable',
            ],
            'title' => [
                'string',
                'nullable',
            ],
            'description' => [
                'string',
                'nullable',
            ],
            'link' => [
                'string',
                'nullable',
            ],
            'datetime' => [
                'date_format:' . config('project.datetime_format'),
                'nullable',
            ],
        ];
    }
}
