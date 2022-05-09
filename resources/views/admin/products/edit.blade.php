@extends('layouts.admin')
@section('content')
@if(Session::has('error'))
<p class="alert alert-danger">{{ Session::get('error') }}</p>
@endif
<div class="card">
    <div class="card-header">
       Create Product
    </div>
    <div class="card-body">
        <form method="POST" action="{{ route("admin.products.update", [$product->id]) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label class="required" for="sub_category_id">Sub Category</label>
                        <select class="form-control select2 {{ $errors->has('sub_category_id') ? 'is-invalid' : '' }}" name="sub_category_id" id="sub_category_id" required>
                            @foreach($sub_categories as $id => $entry)
                                <option value="{{ $entry->id }}" {{ old('sub_category_id') == $entry->id ? 'selected' : '' }}
                                    {{ ($product->sub_category_id == $entry->id) ? 'selected=""':''}}>{{ $entry->name }}</option>
                            @endforeach
                        </select>
                        @if($errors->has('sub_category_id'))
                            <span class="text-danger">{{ $errors->first('sub_category_id') }}</span>
                        @endif
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label class="required" for="name">Name</label>
                        <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" id="name" value="{{ old('name', $product->name) }}">
                        @if($errors->has('name'))
                            <span class="text-danger">{{ $errors->first('name') }}</span>
                        @endif
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label class="required" for="stock">Stock</label>
                        <input type="number" name="stock" value="{{ old('stock', $product->stock) }}" id="stock"
                        class="form-control {{ $errors->has('price') ? 'is-invalid' : '' }}">
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label class="required" for="price">Price</label>
                        <input type="number" name="price" value="{{old('price', $product->price)}}" id="price" class="form-control {{ $errors->has('price') ? 'is-invalid' : '' }}" required>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label><strong>Description :</strong></label>
                <textarea class="form-control" id="summary-ckeditor" name="description"
                value="{{old('description' , $product->description)}}">{{old('description' , $product->description)}}</textarea>
              </div>
            <div class="upload__btn-box edit-upload">
                <label class="upload__btn edit-upload-img">
                    <p>Upload images</p>
                    <input type="file"  data-max_length="2" class="upload__inputfile"  name="image[]" multiple="" >
                </label>
            </div>
            <div class="upload__box">
                <div class="img_wrap">
                    @foreach ($product->productImage as $image)
                    <div class="img_box">
                        {{-- <img src="{{url('storage/product_images/'.$image->image_path)}}" alt="not found" class="img_box"> --}}
                        <img src="{{ asset("storage/uploads/product_images/".$image->image_path)}}"
                        alt="not found" class="img_box" name="image" id="{{$image->id}}">
                        <div class='upload__img-close'></div>
                    </div>
                    @endforeach
                </div>
            </div>
            <div class="form-group">
                <button class="btn btn-danger" type="submit">
                    {{ trans('global.save') }}
                </button>
            </div>
            <input type="hidden" name="deleted_images" value="">
        </form>
    </div>
</div>
@endsection
@section('scripts')
<script>
    var deleted_images=[];
jQuery(document).ready(function () {
    // $('.edit-upload-img').hide();
  ImgUpload();
});

function ImgUpload() {
  var imgWrap = "";
  var imgArray = [];

  $('.upload__inputfile').each(function () {
    $(this).on('change', function (e) {
      imgWrap = $(this).closest('.upload__box').find('.img_wrap');
      var maxLength = $(this).attr('data-max_length');
      var files = e.target.files;
      var filesArr = Array.prototype.slice.call(files);
      var iterator = 0;
      filesArr.forEach(function (f, index) {

        if (!f.type.match('image.*')) {
          return;
        }
        if (imgArray.length > maxLength) {
          return false
        }
            else {
            var len = 0;
            for (var i = 0; i < imgArray.length; i++) {
                if (imgArray[i] !== undefined) {
                len++;
                }
          }
          if (len > maxLength) {
            return false;
          } else {
            imgArray.push(f);
            var reader = new FileReader();
            reader.onload = function (e) {
              var html = "<div class='upload__img-box'><div style='background-image: url(" + e.target.result + ")' data-number='" + $(".img_close").length + "' data-file='" + f.name + "' class='img-bg'><div class='img_close'></div></div></div>";
              $('.img_wrap').append(html);
              iterator++;
            }
            reader.readAsDataURL(f);
          }
        }
      });
    });
  });
  let deleted_files = [];
  $('body').on('click', ".upload__img-close", function (e) {
        $('.edit-upload-img').show();
        var a= $(this).parent().find("img").attr("id");
        deleted_images.push($(this).parent().find("img").attr("id"));
        $("input[name=deleted_images]").val(deleted_images.join(', '));
        var file = $(this).parent().data("file");
        for (var i = 0; i < imgArray.length; i++) {
            if (imgArray[i].name === file) {
                deleted_files.push(imgArray[i].name);
                imgArray.splice(i, 1);
                $('#images').val(deleted_files);
                break;
            }
        }
        $(this).parent().remove();
  });

}
$('body').on('click', ".img_close", function (e) {
    $(this).parent().parent().remove();
  })

    </script>
@endsection
