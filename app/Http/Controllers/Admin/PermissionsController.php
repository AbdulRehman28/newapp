<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyPermissionRequest;
use App\Http\Requests\StorePermissionRequest;
use App\Http\Requests\UpdatePermissionRequest;
use App\Models\Permission;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use DataTables;

class PermissionsController extends Controller
{
    public function index(Request $request)
    {
        abort_if(Gate::denies('permission_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $permissions = Permission::all();
        if ($request->ajax()) {

            $data = Permission::all();

            return Datatables::of($data)

                    ->addColumn('action', function($row){

                           $btn = '<div colspan="2"><a href="/admin/permissions/'.$row->id.'" class="view btn btn-primary btn-sm" style="font-size: 10px;"><i class="fa fa-eye"></i></a>
                           <a href="/admin/permissions/'.$row->id.'/edit" class="edit btn btn-info btn-sm" style="font-size: 10px;"><i class="fa fa-edit"></i></a>
                           <a href="javascript:void(0);" id="delete-permission" data-form-id="' . $row->id . '" class="view btn btn-danger btn-sm" style="font-size: 10px;"><i class="fa fa-trash"></i></a>
                           <form method="POST" id="delete-packages' . $row->id . '" action="' .route('admin.permissions.destroy', $row->id) . '">

                           <input type="hidden" name="_token" value="' . csrf_token() . '"/>

                           <input type="hidden" name="_method" value="delete"/>

                       </form>

                           </div>';

                            return $btn;
                    })

                    ->rawColumns(['action'])
                    ->make(true);
        }

        return view('admin.permissions.index');
    }

    public function create()
    {
        abort_if(Gate::denies('permission_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.permissions.create');
    }

    public function store(StorePermissionRequest $request)
    {
        $permission = Permission::create($request->all());

        return redirect()->route('admin.permissions.index');
    }

    public function edit(Permission $permission)
    {
        abort_if(Gate::denies('permission_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.permissions.edit', compact('permission'));
    }

    public function update(UpdatePermissionRequest $request, Permission $permission)
    {
        $permission->update($request->all());

        return redirect()->route('admin.permissions.index');
    }

    public function show(Permission $permission)
    {
        abort_if(Gate::denies('permission_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.permissions.show', compact('permission'));
    }

    public function destroy(Permission $permission)
    {
        abort_if(Gate::denies('permission_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $permission->delete();

        return back();
    }

    public function massDestroy(MassDestroyPermissionRequest $request)
    {
        Permission::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
