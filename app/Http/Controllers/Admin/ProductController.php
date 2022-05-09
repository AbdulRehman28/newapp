<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Models\Product;
use App\Models\ProductImage;
use Gate;
use DataTables;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;
use Validator;
use Illuminate\Validation\Rule;

class ProductController extends Controller
{

    public function index(Request $request)
    {
        abort_if(Gate::denies('product_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {

            $data = Product::with('subCategory')->select('*');
            return Datatables::of($data)

                    ->addColumn('action', function($row){

                           $btn = '<a href="'.route('admin.products.edit',$row->id).'" class="edit btn btn-primary btn-sm">
                           <i class="fa fa-edit"></i></a>
                           <a href="javascript:void(0);" id="delete" data-form-id="' . $row->id . '" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
                           <form method="POST" id="delete-sub-category' . $row->id . '"
                            action="' .route('admin.products.destroy', $row->id) . '">
                            <input type="hidden" name="_token" value="' . csrf_token() . '"/>
                            <input type="hidden" name="_method" value="delete"/>
                            </form>';
                            return $btn;
                    })
                    ->addColumn('sub_category',function($row){
                        return $row->subCategory->name;
                    })
                    ->rawColumns(['action','sub_category'])
                    ->make(true);

        }

        return view('admin.products.index');

    }

    public function create()
    {
        abort_if(Gate::denies('product_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $sub_categories = SubCategory::get();
        return view('admin.products.create',compact('sub_categories'));
    }

    public function store(Request $request)
    {

        $validator = Validator::make($request->all(),[
            'name'=>'required|unique:products,name',
            'stock'=> 'required|min:1',
            'image' => 'required',
            'image.*' => 'image|mimes:jpg,jpeg,png'
        ]);
        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }
        try{
            $product = Product::create($request->all());

            if($request->hasFile('image')){
                foreach($request->file('image') as $image){
                    $name = $image->getClientOriginalName();
                    $image->move(storage_path().'/app/public/uploads/product_images/',$name);
                    $data[] = $name;
                }
                foreach($data as $data){
                    $product_image = new ProductImage();
                    $product_image->product_id = $product->id;
                    $product_image->image_path = $data;
                    $product_image->save();
                }
            }

            return redirect()->route('admin.products.index')->with('success', 'Product added successfully');
        }

        catch(\Exception $e){

           return redirect()->back();
        }

    }

    public function edit(Request $request,$id)
    {

        abort_if(Gate::denies('product_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $product = Product::where('id',$id)->first();
        $sub_categories = SubCategory::get();

        return view('admin.products.edit',compact('sub_categories','product'));
    }

    public function update($id,Request $request)
    {
        $validator = Validator::make($request->all(),[
            'name' => [
                'required',
                Rule::unique('products')->ignore($id),
            ],
            'stock'=> 'required|min:1'
        ]);
        if($validator->fails()){

            return redirect()->back()->withErrors($validator)->withInput();
        }

        $deleted_images = array_map('intval', explode(',', $request->deleted_images));

        foreach($deleted_images as $image_id){
            ProductImage::where('id',$image_id)->delete();
        }
        $product_images = ProductImage::where('product_id',$id)->get();
        if(!$request->hasFile('image') && $product_images->isEmpty()){
            return redirect()->back()->with('error','Image is required.')->withInput();
        }

       try{
           Product::where('id',$id)->update($request->except(['_token', '_method','deleted_images','image' ]));

           if($request->hasFile('image')){
            foreach($request->file('image') as $image){
                $name = $image->getClientOriginalName();
                $image->move(storage_path().'/app/public/uploads/product_images/',$name);
                $data[] = $name;
            }

            foreach($data as $data){
                $product_image = new ProductImage();
                $product_image->product_id = $id;
                $product_image->image_path = $data;
                $product_image->save();
            }
        }

        return redirect()->route('admin.products.index')->with('success', 'Product updated successfully');

       }catch(\Exception $e){

        return redirect()->back()->withErrors($e)->withInput();
       }
    }

    public function show(Request $request)
    {

        abort_if(Gate::denies('product_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');


        return view('admin.products.show');
    }

    public function destroy(Product $product)
    {

        abort_if(Gate::denies('product_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        try{
            $product->delete();
            return back()->with('success', 'Product deleted successfully');

        }
        catch(\Exception $e){

            return back();
        }

    }

    public function massDestroy(Request $request)
    {
        return response(null,  Response::HTTP_NO_CONTENT);
    }


}
