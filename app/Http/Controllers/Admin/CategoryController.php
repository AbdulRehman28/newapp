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
use Symfony\Component\HttpFoundation\Response;
use Validator;
use App\Models\SubCategory;
class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        abort_if(Gate::denies('category_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $data = Category::select('*');
            return Datatables::of($data)

                    ->addColumn('action', function($row){

                           $btn = '<a href="'.route('admin.categories.edit',$row->id).'" class="edit btn btn-primary btn-sm">
                           <i class="fa fa-edit"></i></a>
                           <a href="javascript:void(0);" id="delete" data-form-id="' . $row->id . '" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
                           <form method="POST" id="delete-category' . $row->id . '"
                            action="' .route('admin.categories.destroy', $row->id) . '">
                            <input type="hidden" name="_token" value="' . csrf_token() . '"/>
                            <input type="hidden" name="_method" value="delete"/>
                            </form>';
                            return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);

    }
    return view('admin.category.index');

}

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        abort_if(Gate::denies('category_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.category.create');
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
            'name'=>'required|string|max:20'
        ]);

        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }
        Category::create($request->all());

        return redirect()->route('admin.categories.index')->with('success', 'Principal added successfully');
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
    public function edit($id)
    {

        abort_if(Gate::denies('category_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $category = Category::where('id',$id)->first();

        return view('admin.category.edit',compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try{
            $validator = Validator::make($request->all(),[
                'name'=>'required|string|max:20'
            ]);
            Category::where('id',$id)->update($request->except(['_token', '_method' ]));

            if($validator->fails()){
                return redirect()->back()->withErrors($validator)->withInput();
            }
            return view('admin.category.index');
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
    public function destroy(Category $category)
    {

        abort_if(Gate::denies('category_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $product=SubCategory::where('category_id',$category->id)->get();

        try{
            if(!$product->isEmpty()){

                return redirect()->back()->withErrors(['has_subcategory'=>'This Category cannot be deleted, it has sub categories']);
            }

                $category->delete();

                return back()->with('success', 'Category deleted successfully');

        }
        catch(\Exception $e){
            return back();
        }
    }
}
