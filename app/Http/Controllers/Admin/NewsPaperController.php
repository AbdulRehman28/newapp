<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreNewsPaperRequest;
use App\Http\Requests\UpdateNewsPaperRequest;
use App\Models\NewsPaper;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use DataTables;

class NewsPaperController extends Controller
{
    public function index(Request $request)
    {
        abort_if(Gate::denies('newspaper_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        if ($request->ajax()) {

            $data = NewsPaper::all();
            return Datatables::of($data)

            ->addColumn('checkbox',function($row){

                $checkbox='<input type="checkbox" id="'.$row->id.'" name="checkbox[]" value="'.$row->id.'" class="checkbox" />';
                return $checkbox;

            })
            ->addColumn('action', function($row){

                   $btn = '<div colspan="2"><a href="/admin/newspaper/'.$row->id.'" class="view btn btn-primary btn-sm" style="font-size: 10px;"><i class="fa fa-eye"></i></a>
                   <a href="/admin/newspaper/'.$row->id.'/edit" class="edit btn btn-info btn-sm" style="font-size: 10px;"><i class="fa fa-edit"></i></a>
                   <a href="javascript:void(0);" id="delete-link-packages" data-form-id="' . $row->id . '" class="view btn btn-danger btn-sm" style="font-size: 10px;"><i class="fa fa-trash"></i></a>
                   <form method="POST" id="delete-packages' . $row->id . '" action="' .route('admin.newspaper.destroy', $row->id) . '">

                   <input type="hidden" name="_token" value="' . csrf_token() . '"/>

                   <input type="hidden" name="_method" value="delete"/>
                    </form> </div>';

                    return $btn;
            })
            ->editColumn('date',function($row){
                return $row->date->format('d-M-Y ');
            })

            ->rawColumns(['action','checkbox'])
            ->make(true);
        }

        return view('admin.newspaper.index');
    }

    public function create()
    {
        abort_if(Gate::denies('newspaper_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        return view('admin.newspaper.create');
    }

    public function store(StoreNewsPaperRequest $request)
    {
        NewsPaper::create($request->all());

        return redirect()->route('admin.newspaper.index');
    }

    public function edit(NewsPaper $newspaper)
    {
        abort_if(Gate::denies('newspaper_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        return view('admin.newspaper.edit',compact('newspaper'));
    }

    public function update(UpdateNewsPaperRequest $request)
    {
        NewsPaper::where('id',$request->id)->update($request->except(['_token', '_method' ]));
        return view("admin.newspaper.index");
    }

    public function show(Permission $permission)
    {

    }

    public function destroy(NewsPaper $newspaper)
    {
        abort_if(Gate::denies('newspaper_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $newspaper->delete();

        return back();
    }

    public function massDestroy(MassDestroyPermissionRequest $request)
    {

    }
}
