<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTopicRequest;
use App\Http\Requests\UpdateTopicRequest;
use App\Http\Resources\Admin\TopicResource;
use App\Models\Chapter;
use App\Models\Topic;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class TopicApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('topic_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new TopicResource(Topic::with(['idChapter'])->advancedFilter());
    }

    public function store(StoreTopicRequest $request)
    {
        $topic = Topic::create($request->validated());

        return (new TopicResource($topic))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function create()
    {
        abort_if(Gate::denies('topic_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return response([
            'meta' => [
                'id_chapter' => Chapter::get(['id', 'name']),
            ],
        ]);
    }

    public function show(Topic $topic)
    {
        abort_if(Gate::denies('topic_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new TopicResource($topic->load(['idChapter']));
    }

    public function update(UpdateTopicRequest $request, Topic $topic)
    {
        $topic->update($request->validated());

        return (new TopicResource($topic))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function edit(Topic $topic)
    {
        abort_if(Gate::denies('topic_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return response([
            'data' => new TopicResource($topic->load(['idChapter'])),
            'meta' => [
                'id_chapter' => Chapter::get(['id', 'name']),
            ],
        ]);
    }

    public function destroy(Topic $topic)
    {
        abort_if(Gate::denies('topic_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $topic->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
