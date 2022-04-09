<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyProductRequest;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Product;
use App\Models\License;
use App\Models\ProductCategory;
use App\Models\ProductTag;
use App\Models\Principal;
use Gate;
use DataTables;
use App\Models\ProductLicense;

use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class ProductController extends Controller
{

    public function index(Request $request)
    {


        return view('admin.products.index');

    }

    public function create()
    {
        abort_if(Gate::denies('product_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');


        return view('admin.products.create');
    }

    public function store(Request $request)
    {

        try{

            return redirect()->route('admin.products.index')->with('success', 'Product added successfully');
        }

        catch(\Exception $e){

           return redirect()->back();
        }


    }

    public function edit(Request $request)
    {

        abort_if(Gate::denies('product_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.products.edit');
    }

    public function update($id)
    {


       try{


        return redirect()->route('admin.products.index')->with('success', 'Product updated successfully');

       }catch(\Exception $e){

        return redirect()->back();
       }


    }

    public function show(Request $request)
    {

        abort_if(Gate::denies('product_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');


        return view('admin.products.show');
    }

    public function destroy(Request $request)
    {

        abort_if(Gate::denies('product_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        try{

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
