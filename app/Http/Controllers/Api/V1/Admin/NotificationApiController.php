<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreNotificationRequest;
use App\Http\Requests\UpdateNotificationRequest;
use App\Http\Resources\Admin\NotificationResource;
use App\Models\Notification;
use App\Models\User;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class NotificationApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('notification_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new NotificationResource(Notification::with(['user'])->advancedFilter());
    }

    public function store(StoreNotificationRequest $request)
    {
        $notification = Notification::create($request->validated());

        return (new NotificationResource($notification))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function create()
    {
        abort_if(Gate::denies('notification_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return response([
            'meta' => [
                'user'   => User::get(['id', 'name']),
                'status' => Notification::STATUS_SELECT,
            ],
        ]);
    }

    public function show(Notification $notification)
    {
        abort_if(Gate::denies('notification_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new NotificationResource($notification->load(['user']));
    }

    public function update(UpdateNotificationRequest $request, Notification $notification)
    {
        $notification->update($request->validated());

        return (new NotificationResource($notification))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function edit(Notification $notification)
    {
        abort_if(Gate::denies('notification_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return response([
            'data' => new NotificationResource($notification->load(['user'])),
            'meta' => [
                'user'   => User::get(['id', 'name']),
                'status' => Notification::STATUS_SELECT,
            ],
        ]);
    }

    public function destroy(Notification $notification)
    {
        abort_if(Gate::denies('notification_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $notification->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
