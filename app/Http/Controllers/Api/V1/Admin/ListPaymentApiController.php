<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreListPaymentRequest;
use App\Http\Requests\UpdateListPaymentRequest;
use App\Http\Resources\Admin\ListPaymentResource;
use App\Models\ListPayment;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class ListPaymentApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('list_payment_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ListPaymentResource(ListPayment::advancedFilter());
    }

    public function store(StoreListPaymentRequest $request)
    {
        $listPayment = ListPayment::create($request->validated());

        if ($media = $request->input('image', [])) {
            Media::whereIn('id', data_get($media, '*.id'))
                ->where('model_id', 0)
                ->update(['model_id' => $listPayment->id]);
        }

        return (new ListPaymentResource($listPayment))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function create()
    {
        abort_if(Gate::denies('list_payment_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return response([
            'meta' => [],
        ]);
    }

    public function show(ListPayment $listPayment)
    {
        abort_if(Gate::denies('list_payment_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ListPaymentResource($listPayment);
    }

    public function update(UpdateListPaymentRequest $request, ListPayment $listPayment)
    {
        $listPayment->update($request->validated());

        $listPayment->updateMedia($request->input('image', []), 'list_payment_image');

        return (new ListPaymentResource($listPayment))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function edit(ListPayment $listPayment)
    {
        abort_if(Gate::denies('list_payment_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return response([
            'data' => new ListPaymentResource($listPayment),
            'meta' => [],
        ]);
    }

    public function destroy(ListPayment $listPayment)
    {
        abort_if(Gate::denies('list_payment_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $listPayment->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeMedia(Request $request)
    {
        abort_if(Gate::none(['list_payment_create', 'list_payment_edit']), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->has('size')) {
            $this->validate($request, [
                'file' => 'max:' . $request->input('size') * 1024,
            ]);
        }

        $model         = new ListPayment();
        $model->id     = $request->input('model_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('file')->toMediaCollection($request->input('collection_name'));

        return response()->json($media, Response::HTTP_CREATED);
    }
}
