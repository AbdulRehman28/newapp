@extends('layouts.admin')

@section('content')

<div class="container-fluid">
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-sm-12">
            <a class="btn btn-success float-right" href="{{ route('admin.users.create') }}">
            {{trans('global.add')}}{{trans('cruds.user.title_singular')}}
            </a>
        </div>
    </div>
    <div class="card">
      <div class="card-header">
      {{trans('cruds.user.title')}}
      </div>
      <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered data-table ml-0 mr-0 w-100">
                <thead>
                    <tr>
                        <th width="10">{{trans('cruds.user.fields.id')}}</th>
                        <th>Name</th>
                        <th>{{trans('cruds.user.fields.email')}}</th>
                        <th>{{trans('cruds.user.fields.roles')}}</th>
                        <th>{{trans('cruds.user.fields.action')}}</th>
                    </tr>
                </thead>
            </table>
          </div>
      </div>
    </div>

</div>


@endsection
@section('scripts')

<script type="text/javascript">

  $(function () {

    var table = $('.data-table').DataTable({

        processing: false,
        serverSide: true,
        ajax: "{{ route('admin.users.index') }}",

        columns: [
            {data: 'id', name: 'id'},
            {data: 'name', name: 'name'},
            {data: 'email', name: 'email'},
            {data: 'roles', name: 'roles'},
            {data: 'action', name: 'action', orderable: false, searchable: false},
        ],

    });

  });


</script>

@endsection
