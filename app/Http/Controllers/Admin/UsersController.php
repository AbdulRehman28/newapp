<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyUserRequest;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\Role;
use App\Models\User;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use DataTables;

class UsersController extends Controller
{
    public function index(Request $request)
    {

        abort_if(Gate::denies('user_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {

            $users = User::get();

            return Datatables::of($users)

                    ->addColumn('status',function($row){

                        if($row->status=='Active'){
                            $status ='<strong><p class="text-success">Active</p></strong>';

                        }
                        else{
                        $status ='<strong><p class="text-danger">Dective</p></strong>';

                        }

                        return $status;
                    })
                    ->addColumn('roles',function($row){
                        $roles='';
                            foreach($row->roles as $role){

                                $roles .= '<p>'.$role->title.'<br></p>';

                            }
                            return $roles;
                    })

                    ->addColumn('action', function($row){

                           $btn = '<div colspan="2"><a href="/admin/users/'.$row->id.'" class="view btn btn-primary btn-sm" style="font-size: 10px;"><i class="fa fa-eye"></i></a>
                           <a href="/admin/users/'.$row->id.'/edit" class="edit btn btn-info btn-sm" style="font-size: 10px;"><i class="fa fa-edit"></i></a>

                           <input type="hidden" name="_token" value="' . csrf_token() . '"/>

                           <input type="hidden" name="_method" value="delete"/>

                       </form>

                           </div>';

                            return $btn;
                    })

                    ->rawColumns(['action','status','roles'])
                    ->make(true);
        }

        return view('admin.users.index');
    }

    public function create()
    {
        abort_if(Gate::denies('user_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $roles = Role::pluck('title', 'id');

        return view('admin.users.create', compact('roles'));
    }

    public function store(StoreUserRequest $request)
    {
        $user = User::create($request->all());
        $user->roles()->sync($request->input('roles', []));

        return redirect()->route('admin.users.index');
    }

    public function edit(User $user)
    {
        abort_if(Gate::denies('user_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $roles = Role::pluck('title', 'id');

        $user->load('roles');

        return view('admin.users.edit', compact('roles', 'user'));
    }

    public function update(UpdateUserRequest $request, User $user)
    {
        $user->update($request->all());
        $user->roles()->sync($request->input('roles', []));

        return redirect()->route('admin.users.index');
    }

    public function show(User $user)
    {
        abort_if(Gate::denies('user_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $user->load('roles');

        return view('admin.users.show', compact('user'));
    }

    public function destroy(User $user)
    {
        abort_if(Gate::denies('user_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $user->delete();

        return back();
    }

    public function massDestroy(MassDestroyUserRequest $request)
    {
        User::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
