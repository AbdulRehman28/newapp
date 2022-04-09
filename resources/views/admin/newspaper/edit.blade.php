@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.role.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.newspaper.update", [$newspaper->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <input type="hidden" name="id" value="{{$newspaper->id}}">
            <div class="form-group">
                <label class="required" for="title">{{ trans('cruds.role.fields.title') }}</label>
                <input class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}" type="text" name="title" id="title" value="{{ old('title', $newspaper->title) }}" required>
                @if($errors->has('title'))
                    <span class="text-danger">{{ $errors->first('title') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.role.fields.title_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="date">Date</label>
                <input class="form-control {{ $errors->has('date') ? 'is-invalid' : '' }}" type="date" name="date" id="date"
                value="{{ e(old('date', date('Y-m-d'))); }}" required>
                @if($errors->has('title'))
                    <span class="text-danger">{{ $errors->first('date') }}</span>
                @endif
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
