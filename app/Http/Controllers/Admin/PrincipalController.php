<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Principal;
use App\Models\Product;
use DataTables;
use Gate;
use App\Http\Requests\StorePrincipalRequest;
use App\Http\Requests\UpdatePrincipalRequest;
use Symfony\Component\HttpFoundation\Response;

class PrincipalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        abort_if(Gate::denies('principal_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {

            $data = Principal::select('*');
            return Datatables::of($data)

                    ->addColumn('action', function($row){

                           $btn = '<a href="'.route('admin.principals.edit',$row->id).'" class="edit btn btn-primary btn-sm">
                           <i class="fa fa-edit"></i></a>
                           <a href="javascript:void(0);" id="delete" data-form-id="' . $row->id . '" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
                           <form method="POST" id="delete-principal' . $row->id . '"
                            action="' .route('admin.principals.destroy', $row->id) . '">

                            <input type="hidden" name="_token" value="' . csrf_token() . '"/>

                            <input type="hidden" name="_method" value="delete"/>

                            </form>';
                            return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);

    }
    return view('admin.principal.index');

}

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        abort_if(Gate::denies('principal_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $principals=Principal::get();

        return view('admin.principal.create', compact('principals'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePrincipalRequest $request)
    {
        $principal = Principal::create($request->all());

        return redirect()->route('admin.principals.index')->with('success', 'Principal added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Principal $principal)
    {
        abort_if(Gate::denies('principal_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.principal.edit', compact('principal'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePrincipalRequest $request, Principal $principal)
    {
        try{
            $principal->update($request->all());

            return redirect()->route('admin.principals.index')->with('success', 'Principal updated successfully');
        }
        catch(\Exception $e){

          return redirect()->back();
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Principal $principal)
    {

        abort_if(Gate::denies('principal_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $product=Product::where('principal_id',$principal->id)->get();

        try{
            if(!$product->isEmpty()){

                return redirect()->back()->withErrors(['has_product'=>'This Principal cannot be deleted, it contains products']);
            }

                $principal->delete();

                return back()->with('success', 'Principal deleted successfully');

        }
        catch(\Exception $e){
            return back();
        }
    }
}
