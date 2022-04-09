@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
       Create NewsPaper Details
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.newspaper-details.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="newspaper_id">News Paper</label>
                <select class="form-control select2 {{ $errors->has('newspaper_id') ? 'is-invalid' : '' }}" name="newspaper_id" id="newspaper_id" required>
                    @foreach($newspaper as $id => $entry)
                        <option value="{{ $entry->id }}" {{ old('newspaper_id') == $entry->id ? 'selected' : '' }}>{{ $entry->title }}</option>
                    @endforeach
                </select>
                @if($errors->has('newspaper_id'))
                    <span class="text-danger">{{ $errors->first('newspaper_id') }}</span>
                @endif
            </div>
            <div class="form-group">
                <label class="required" for="page_no">Page No</label>
                <input class="form-control {{ $errors->has('english') ? 'is-invalid' : '' }}" type="text" name="page_no" id="page_no" value="{{ old('page_no', '') }}" >
                @if($errors->has('page_no'))
                    <span class="text-danger">{{ $errors->first('page_no') }}</span>
                @endif
            </div>
            <div class="row">
                <div class="col-md-4 col-sm-4 col-12">
                    <div class="upload__box">
                        <div class="upload__btn-box">
                          <label class="upload__btn">
                            <p>Upload images</p>
                            <input type="file" multiple="" data-max_length="6" class="upload__inputfile" name="image">
                          </label>
                        </div>
                      </div>
                      <div class="upload__img-wrap">

                      </div>
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
        $('.upload__img-close').hide();
  ImgUpload();
});

function ImgUpload() {
  var imgWrap = "";
  var imgArray = [];

  $('.upload__inputfile').each(function () {

    $(this).on('change', function (e) {
        $('.upload__img-close').show();
        // $('.upload__img-close').parent().show();
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
              var html = "<div class='upload__img-box'><div style='background-image: url(" + e.target.result + ")' data-number='" + $(".upload__img-close").length + "' data-file='" + f.name + "' class='img-bg'></div></div>";
              $('.upload__img-wrap').append(html);
              $('.upload__img-box').append('<div><button class="upload__img-close" id="edit-btn"><span>&times;</span></button></div>')
              iterator++;
            }
            reader.readAsDataURL(f);
          }
        }
      });
    });
  });

  $('body').on('click', ".upload__img-close", function (e) {
      e.preventDefault();
    var file = $(this).parent().data("file");
    $('.upload__inputfile').val('');
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
