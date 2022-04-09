<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyRoleRequest;
use App\Http\Requests\StoreRoleRequest;
use App\Http\Requests\UpdateRoleRequest;
use App\Models\Permission;
use App\Models\Role;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use DataTables;

class RolesController extends Controller
{
    public function index(Request $request)
    {
       
        abort_if(Gate::denies('role_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            
            $data = Role::with('permissions')->select('*');
            return Datatables::of($data)
      
                    ->addColumn('checkbox',function($row){

                        $checkbox='<input type="checkbox" id="'.$row->id.'" name="checkbox[]" value="'.$row->id.'" class="c" />';
                        return $checkbox;

                    })
                    ->addColumn('title',function($row){
                        $title=$row->title;
                        return $title;
                    })
                    ->addColumn('permission',function($row){
                       
                         $array='';
                            foreach($row->permissions as $permission){
                                
                                $array .= '<span class="badge badge-info ml-1" width="50px">'.$permission->title.'</span>';
                                
                            }
                            return $array;
                        
                    })
                  
                    ->addColumn('action', function($row){
     
                           $btn = '<a href="'.route('admin.roles.edit',$row->id).'" class="btn btn-info btn-sm"><i class="fa fa-edit"></i></a>
                           <a href="javascript:void(0);" id="delete" data-form-id="' . $row->id . '" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
                           
                           <form method="POST" id="delete-users' . $row->id . '" 
                           action="' .route('admin.roles.destroy', $row->id) . '">

                           <input type="hidden" name="_token" value="' . csrf_token() . '"/>
       
                           <input type="hidden" name="_method" value="delete"/>
       
                       </form>';
                            return $btn;
                    })
                    ->rawColumns(['title','permission','action','checkbox'])
                    ->make(true);
        }

        return view('admin.roles.index');
    }

    public function create()
    {
        abort_if(Gate::denies('role_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $permissions = Permission::pluck('title', 'id');

        return view('admin.roles.create', compact('permissions'));
    }

    public function store(StoreRoleRequest $request)
    {
        $role = Role::create($request->all());
        $role->permissions()->sync($request->input('permissions', []));

        return redirect()->route('admin.roles.index');
    }

    public function edit(Role $role)
    {
        abort_if(Gate::denies('role_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $permissions = Permission::pluck('title', 'id');

        $role->load('permissions');

        return view('admin.roles.edit', compact('permissions', 'role'));
    }

    public function update(UpdateRoleRequest $request, Role $role)
    {
        $role->update($request->all());
        $role->permissions()->sync($request->input('permissions', []));

        return redirect()->route('admin.roles.index');
    }

    public function show(Role $role)
    {
        abort_if(Gate::denies('role_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $role->load('permissions');

        return view('admin.roles.show', compact('role'));
    }

    public function destroy(Role $role)
    {
       
        abort_if(Gate::denies('role_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $role->delete();

        return back();
    }

    public function massDestroy(MassDestroyRoleRequest $request)
    {
        Role::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
