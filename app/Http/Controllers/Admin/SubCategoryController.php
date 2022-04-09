<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use DataTables;
use Gate;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Models\SubCategory;
use Symfony\Component\HttpFoundation\Response;
use Validator;

class SubCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        abort_if(Gate::denies('sub_category_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {

            $data = SubCategory::select('*');
            return Datatables::of($data)

                    ->addColumn('action', function($row){

                           $btn = '<a href="'.route('admin.sub-categories.edit',$row->id).'" class="edit btn btn-primary btn-sm">
                           <i class="fa fa-edit"></i></a>
                           <a href="javascript:void(0);" id="delete" data-form-id="' . $row->id . '" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
                           <form method="POST" id="delete-sub-category' . $row->id . '"
                            action="' .route('admin.sub-categories.destroy', $row->id) . '">

                            <input type="hidden" name="_token" value="' . csrf_token() . '"/>

                            <input type="hidden" name="_method" value="delete"/>

                            </form>';
                            return $btn;
                    })
                    // ->editColumn('category_id',function($row){
                    //     return $row->
                    // })
                    ->rawColumns(['action'])
                    ->make(true);

    }
    return view('admin.sub_category.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.sub_category.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'name'=>'required|string|max:20',
            'category_id'=>'required'
        ]);

        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }
        SubCategory::create($request->all());

        return redirect()->route('admin.sub-categories.index')->with('success', 'Sub Category added successfully');
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
    public function edit(Request $request,$id)
    {
        abort_if(Gate::denies('sub_category_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $sub_category = SubCategory::where('id',$id)->first();
        $categories = Category::get();
        return view('admin.sub_category.edit',compact('sub_category','categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        try{
            $validator = Validator::make($request->all(),[
                'name'=>'required|string|max:20',
                'category_id'=>'required'
            ]);
            SubCategory::where('id',$id)->update($request->except(['_token', '_method' ]));

            if($validator->fails()){
                return redirect()->back()->withErrors($validator)->withInput();
            }
            return view('admin.sub_category.index');
        }
        catch(\Exception $e){

          return redirect()->back();
        }

    }

    /**
     * Remove the specified resource from storagit clone https://github.com/jakubroztocil/cloudtunes.gitge.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(SubCategory $sub_category)
    {
        $sub_category->delete();

        return redirect()->route('admin.sub-categories.index');

    }
}
