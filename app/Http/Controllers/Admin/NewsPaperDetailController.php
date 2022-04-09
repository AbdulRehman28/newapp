<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyPermissionRequest;
use App\Http\Requests\StorePermissionRequest;
use App\Http\Requests\UpdatePermissionRequest;
use App\Models\NewsPaper;
use App\Models\NewsPaperDetail;
use App\Models\Permission;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use DataTables;
use Validator;

class NewsPaperDetailController extends Controller
{
    public function index(Request $request)
    {
        abort_if(Gate::denies('newspaper_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        if ($request->ajax()) {

            $data = NewsPaperDetail::with('newsPaper')->get();
            return Datatables::of($data)

            ->addColumn('checkbox',function($row){

                $checkbox='<input type="checkbox" id="'.$row->id.'" name="checkbox[]" value="'.$row->id.'" class="checkbox" />';
                return $checkbox;

            })
            ->editColumn('newspaper_id',function($row){
                return $row->newsPaper->title;
            })
            ->addColumn('action', function($row){

                   $btn = '<div colspan="2"><a href="/admin/newspaper-details/'.$row->id.'" class="view btn btn-primary btn-sm" style="font-size: 10px;"><i class="fa fa-eye"></i></a>
                   <a href="/admin/newspaper-details/'.$row->id.'/edit" class="edit btn btn-info btn-sm" style="font-size: 10px;"><i class="fa fa-edit"></i></a>
                   <a href="javascript:void(0);" id="delete-link-packages" data-form-id="' . $row->id . '" class="view btn btn-danger btn-sm" style="font-size: 10px;"><i class="fa fa-trash"></i></a>
                   <form method="POST" id="delete-packages' . $row->id . '" action="' .route('admin.newspaper-details.destroy', $row->id) . '">

                   <input type="hidden" name="_token" value="' . csrf_token() . '"/>

                   <input type="hidden" name="_method" value="delete"/>
                    </form> </div>';

                    return $btn;
            })
            ->editColumn('image_path', function ($row){
                $url=asset($row->image_path);
                return ' <a href="/'.$row->image_path.'" target="_blank">
                <img src='.$url.' border="0" width="40" class="img-rounded" align="center" id="image"/></a>';
            })

            ->rawColumns(['action','checkbox','image_path','newspaper_id'])
            ->make(true);
        }

        return view('admin.newspaperdetail.index');
    }

    public function create()
    {
        abort_if(Gate::denies('newspaper_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $newspaper = NewsPaper::all();
        return view('admin.newspaperdetail.create',compact(('newspaper')));
    }

    public function store(Request $request)
    {

        try{
            $file= $request->file('image');
            $name = $file->getClientOriginalName();
            $file->move(public_path().'/uploads/', $name);
            $path="uploads/$name";
            $request->merge([
                'image_path'=>$path
            ]);
            NewsPaperDetail::create($request->except(['image']));
        }
        catch(\Exception $e){
            return back()->withErrors($e->getMessage());
        }


        return redirect()->route('admin.newspaper-details.index');
    }

    public function edit($id)
    {
        $newspaper_detail = NewsPaperDetail::where('id',$id)->first();
        $newspaper = NewsPaper::all();
        return view('admin.newspaperdetail.edit',compact('newspaper_detail','newspaper'));
    }

    public function update(Request $request,$id)
    {

        if($request->has_image==0 && !$request->hasfile('image')){
            return redirect()->back()->withErrors(['error'=>'Image filed is required.']);
        }
        $validator = Validator::make($request->all(), [
            'page_no' => 'required|numeric|min:1',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        if($request->hasfile('image')){
            $file= $request->file('image');
            $name = $file->getClientOriginalName();
            $file->move(public_path().'/uploads/', $name);
            $path="uploads/$name";
            $request->merge([
                'image_path'=>$path
            ]);
            NewsPaperDetail::where('id',$id)->update(['image_path'=>$path]);
        }
        NewsPaperDetail::where('id',$id)->update(['newspaper_id'=>$request->newspaper_id,'page_no'=>$request->page_no,]);

        return view("admin.newspaper.index");
    }

    public function show(Permission $permission)
    {

    }

    public function destroy($id)
    {

        NewsPaperDetail::where('id',$id)->delete();

        return back();
    }

    public function massDestroy(MassDestroyPermissionRequest $request)
    {

    }
}
