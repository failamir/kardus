<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreKelaRequest;
use App\Http\Requests\UpdateKelaRequest;
use App\Http\Resources\Admin\KelaResource;
use App\Models\Kela;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class KelasApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('kela_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new KelaResource(Kela::advancedFilter());
    }

    public function store(StoreKelaRequest $request)
    {
        $kela = Kela::create($request->validated());

        return (new KelaResource($kela))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function create()
    {
        abort_if(Gate::denies('kela_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return response([
            'meta' => [],
        ]);
    }

    public function show(Kela $kela)
    {
        abort_if(Gate::denies('kela_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new KelaResource($kela);
    }

    public function update(UpdateKelaRequest $request, Kela $kela)
    {
        $kela->update($request->validated());

        return (new KelaResource($kela))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function edit(Kela $kela)
    {
        abort_if(Gate::denies('kela_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return response([
            'data' => new KelaResource($kela),
            'meta' => [],
        ]);
    }

    public function destroy(Kela $kela)
    {
        abort_if(Gate::denies('kela_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $kela->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
