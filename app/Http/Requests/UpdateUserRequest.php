<?php

namespace App\Http\Requests;

use App\Models\User;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;
use Illuminate\Support\Arr;

class UpdateUserRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('user_edit');
    }

    public function rules()
    {
        return [
            'name' => [
                'string',
                'required',
            ],
            'email' => [
                'required',
                'unique:users,email,' . request()->route('user')->id,
            ],
            'password' => [
                'nullable',
            ],
            'roles' => [
                'required',
                'array',
            ],
            'roles.*.id' => [
                'integer',
                'exists:roles,id',
            ],
            'city' => [
                'string',
                'nullable',
            ],
            'phone' => [
                'string',
                'nullable',
            ],
            'avatar' => [
                'array',
                'nullable',
            ],
            'avatar.*.id' => [
                'integer',
                'exists:media,id',
            ],
            'gender' => [
                'nullable',
                'in:' . implode(',', Arr::pluck(User::GENDER_RADIO, 'value')),
            ],
            'active' => [
                'nullable',
                'in:' . implode(',', Arr::pluck(User::ACTIVE_RADIO, 'value')),
            ],
            'linked_in' => [
                'string',
                'nullable',
            ],
        ];
    }
}
