<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePainTypeRequest;
use App\Http\Requests\UpdatePainTypeRequest;
use App\Http\Resources\Admin\PainTypeResource;
use App\Models\PainType;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PainTypeApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('pain_type_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new PainTypeResource(PainType::with(['pain', 'created_by'])->get());
    }

    public function store(StorePainTypeRequest $request)
    {
        $painType = PainType::create($request->all());

        return (new PainTypeResource($painType))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(PainType $painType)
    {
        abort_if(Gate::denies('pain_type_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new PainTypeResource($painType->load(['pain', 'created_by']));
    }

    public function update(UpdatePainTypeRequest $request, PainType $painType)
    {
        $painType->update($request->all());

        return (new PainTypeResource($painType))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(PainType $painType)
    {
        abort_if(Gate::denies('pain_type_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $painType->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
