@extends('layouts.admin')
@section('content')
@if($errors->has('image'))
<p class="alert alert-danger">{{ $errors->first('image')}}</p>
@endif
<div class="card">
    <div class="card-header">
       Create Product
    </div>
    <div class="card-body">
        @if ($errors->has('image.*'))
            @foreach ($errors->all() as $error )
                <p class="alert alert-danger">{{$error}}</p>
            @endforeach
        @endif
        <form method="POST" action="{{ route("admin.products.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="sub_category_id">Sub Category</label>
                <select class="form-control select2 {{ $errors->has('sub_category_id') ? 'is-invalid' : '' }}" name="sub_category_id" id="sub_category_id" required>
                    <option value="">Select</option>
                    @foreach($sub_categories as $id => $entry)
                        <option value="{{ $entry->id }}" {{ old('sub_category_id') == $entry->id ? 'selected' : '' }}>{{ $entry->name }}</option>
                    @endforeach
                </select>
                @if($errors->has('sub_category_id'))
                    <span class="text-danger">{{ $errors->first('sub_category_id') }}</span>
                @endif
            </div>
            <div class="form-group">
                <label class="required" for="name">Name</label>
                <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" id="page_no" value="{{ old('name', '') }}" >
                @if($errors->has('name'))
                    <span class="text-danger">{{ $errors->first('name') }}</span>
                @endif
            </div>
            <div>
                <div class="upload__box">
                    <div class="row">
                        <div class="upload__btn-box">
                            <label class="upload__btn">
                                <p>Upload images</p>
                                <input type="file" multiple="" data-max_length="20" class="upload__inputfile" name="image[]">
                            </label>
                        </div>
                    </div>
                    <div class="upload__img-wrap"></div>
                  </div>
            </div>
            <div class="form-group">
                <button class="btn btn-danger" type="submit">
                    {{ trans('global.save') }}
                </button>
            </div>
        </form>
    </div>
</div>

@endsection
@section('scripts')
<script>
   jQuery(document).ready(function () {
  ImgUpload();
});

function ImgUpload() {
  var imgWrap = "";
  var imgArray = [];

  $('.upload__inputfile').each(function () {
    $(this).on('change', function (e) {
      imgWrap = $(this).closest('.upload__box').find('.upload__img-wrap');
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
        } else {
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
              var html = "<div class='upload__img-box'><div style='background-image: url(" + e.target.result + ")' data-number='" + $(".upload__img-close").length + "' data-file='" + f.name + "' class='img-bg'><div class='upload__img-close'></div></div></div>";
              imgWrap.append(html);
              iterator++;
            }
            reader.readAsDataURL(f);
          }
        }
      });
    });
  });

  $('body').on('click', ".upload__img-close", function (e) {
    var file = $(this).parent().data("file");
    for (var i = 0; i < imgArray.length; i++) {
      if (imgArray[i].name === file) {
        imgArray.splice(i, 1);
        break;
      }
    }
    $(this).parent().parent().remove();
  });
}
</script>
@endsection
