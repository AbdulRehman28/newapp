@extends('layouts.admin')

@section('content')

<div class="container-fluid">
  <div style="margin-bottom: 10px;" class="row">
        <div class="col-sm-12">
            <a class="btn btn-success float-right" href="{{ route('admin.permissions.create') }}">
            {{ trans('global.add') }} {{ trans('cruds.permission.title') }}
            </a>
        </div>
  </div>
    <!-- <h1>Laravel 8 Datatables Tutorial <br/> ItSolutionStuff.com</h1> -->
    
    <div class="card">
        <div class="card-header">{{ trans('cruds.permission.title') }}</div>
      <div class="card-body">
          <div class="table-responsive">
          <table class="table table-bordered data-table ml-0 mr-0 w-100">
              <thead>
                  <tr>
                      <th width="10">{{ trans('cruds.permission.fields.id') }}</th>
                      <th>{{ trans('cruds.role.fields.permissions') }}</th>
                      <th>{{ trans('cruds.role.fields.action') }}</th>
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
        ajax: "{{ route('admin.permissions.index') }}",
    
        columns: [

            {data: 'id', name: 'id'},
            {data: 'title', name: 'title'},
            {data: 'action', name: 'action', orderable: false, searchable: false},
        ],
    });
    
  });
$(document).on('click','#delete-permission',function(event){
        Swal.fire({
        title: 'Are you sure?',
        showDenyButton: true,
        showCancelButton: false,
        confirmButtonText: 'Yes',
        denyButtonText: `No`,
        }).then((result) => {
          var id = $(this).attr('data-form-id');
          if (result.isConfirmed) {
            
            document.getElementById('delete-packages'+id).submit();
        } else if(result.isDenied) {
        
        }
        })
  })


</script>

@endsection
