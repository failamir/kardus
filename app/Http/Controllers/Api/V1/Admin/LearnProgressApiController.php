<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreLearnProgressRequest;
use App\Http\Requests\UpdateLearnProgressRequest;
use App\Http\Resources\Admin\LearnProgressResource;
use App\Models\LearnProgress;
use App\Models\Topic;
use App\Models\User;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class LearnProgressApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('learn_progress_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new LearnProgressResource(LearnProgress::with(['user', 'topic'])->advancedFilter());
    }

    public function store(StoreLearnProgressRequest $request)
    {
        $learnProgress = LearnProgress::create($request->validated());

        return (new LearnProgressResource($learnProgress))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function create()
    {
        abort_if(Gate::denies('learn_progress_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return response([
            'meta' => [
                'user'  => User::get(['id', 'name']),
                'topic' => Topic::get(['id', 'name']),
            ],
        ]);
    }

    public function show(LearnProgress $learnProgress)
    {
        abort_if(Gate::denies('learn_progress_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new LearnProgressResource($learnProgress->load(['user', 'topic']));
    }

    public function update(UpdateLearnProgressRequest $request, LearnProgress $learnProgress)
    {
        $learnProgress->update($request->validated());

        return (new LearnProgressResource($learnProgress))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function edit(LearnProgress $learnProgress)
    {
        abort_if(Gate::denies('learn_progress_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return response([
            'data' => new LearnProgressResource($learnProgress->load(['user', 'topic'])),
            'meta' => [
                'user'  => User::get(['id', 'name']),
                'topic' => Topic::get(['id', 'name']),
            ],
        ]);
    }

    public function destroy(LearnProgress $learnProgress)
    {
        abort_if(Gate::denies('learn_progress_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $learnProgress->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
