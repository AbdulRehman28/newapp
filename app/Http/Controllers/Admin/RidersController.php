<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Role;
use Gate;
use Illuminate\Http\Request;
use DataTables;
use DB;
use App\Http\Requests\UpdateUserRequest;
use Symfony\Component\HttpFoundation\Response;

class RidersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        abort_if(Gate::denies('rider_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {

            $Riders = User::whereHas('roles',function($q){
                $q->where('title','Rider');
            })->get();
            return Datatables::of($Riders)

                    ->addColumn('action', function($row){

                           $btn = '<div colspan="2"><a href="/admin/riders/'.$row->id.'" class="view btn btn-primary btn-sm" style="font-size: 10px;"><i class="fa fa-eye"></i></a>
                           <a href="/admin/riders/'.$row->id.'/edit" class="edit btn btn-info btn-sm" style="font-size: 10px;"><i class="fa fa-edit"></i></a>
                           <a href="javascript:void(0);" id="delete" data-form-id="' . $row->id . '" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
                           <form method="POST" id="delete-rider' . $row->id . '"
                            action="' .route('admin.riders.destroy', $row->id) . '">
                            <input type="hidden" name="_token" value="' . csrf_token() . '"/>
                            <input type="hidden" name="_method" value="delete"/>
                            </form>';
                            return $btn;
                    })

                    ->rawColumns(['action'])
                    ->make(true);
        }

        return view('admin.riders.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        abort_if(Gate::denies('rider_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $user = User::where('id',$id)->first();
        $user->load('roles');
        return view('admin.riders.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user,$id)
    {
        abort_if(Gate::denies('rider_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $user = User::where('id',$id)->first();
        $role = Role::where('title', 'Rider')->first();

        return view('admin.riders.edit', compact('role', 'user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function update(UpdateUserRequest $request, $id)
    {
        $user = User::where('id',$id)->first();
        $user->update($request->all());
        $user->roles()->sync($request->input('roles', []));
        return redirect()->route('admin.riders.index');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::where('id',$id)->first();
        DB::table('role_user')->where('user_id',$user->id)->delete();
        $user->delete();
        return redirect()->route('admin.riders.index')->with('success','Rider Deleted Successfully.');

    }
}
