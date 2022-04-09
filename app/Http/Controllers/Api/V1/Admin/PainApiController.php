<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePainRequest;
use App\Http\Requests\UpdatePainRequest;
use App\Http\Resources\Admin\PainResource;
use App\Models\Pain;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PainApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('pain_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new PainResource(Pain::with(['created_by'])->get());
    }

    public function store(StorePainRequest $request)
    {
        $pain = Pain::create($request->all());

        return (new PainResource($pain))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Pain $pain)
    {
        abort_if(Gate::denies('pain_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new PainResource($pain->load(['created_by']));
    }

    public function update(UpdatePainRequest $request, Pain $pain)
    {
        $pain->update($request->all());

        return (new PainResource($pain))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Pain $pain)
    {
        abort_if(Gate::denies('pain_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $pain->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
