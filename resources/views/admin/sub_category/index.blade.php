@extends('layouts.admin')

@section('content')

<div class="container-fluid">
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-sm-12">
            <a class="btn btn-success float-right" href="{{ route('admin.sub-categories.create') }}">
           Add Sub Category
            </a>
        </div>
    </div>
    <div class="card">
      <div class="card-header">
      Add Sub Category
      </div>
      <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered data-table ml-0 mr-0 w-100">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Action</th>
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
        ajax: "{{ route('admin.sub-categories.index') }}",

        columns: [
            {data: 'id', name: 'id'},
            {data: 'name', name: 'name'},
            {data: 'action', name: 'action', orderable: false, searchable: false},
        ],

    });

  });

  $(document).on('click','#delete',function(event){
        Swal.fire({
        title: 'Are you sure?',
        showDenyButton: true,
        showCancelButton: false,
        confirmButtonText: 'Yes',
        denyButtonText: `No`,
        }).then((result) => {
          var id = $(this).attr('data-form-id');
          if (result.isConfirmed) {
            document.getElementById('delete-sub-category'+id).submit();
        } else if(result.isDenied) {

        }
        })
  })

</script>

@endsection
