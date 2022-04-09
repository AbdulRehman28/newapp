@extends('layouts.admin')
@section('content')
<div class="container-fluid">
  <div style="margin-bottom: 10px;" class="row">
        <div class="col-sm-12">
            <a class="btn btn-success float-right" href="{{ route('admin.newspaper-details.create') }}">
                Add NewsPaper Details
            </a>

            {{-- <a class="btn btn-danger float-left" href="" id="delete-selected">
            <i class="fa fa-trash" aria-hidden="true"></i>
                Delete Selected
            </a> --}}

        </div>
  </div>
    <!-- <h1>Laravel 8 Datatables Tutorial <br/> ItSolutionStuff.com</h1> -->
    <div class="card">
        <div class="card-header">News Paper Details</div>
      <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered data-table ml-0 mr-0 w-100">
                <thead>
                    <tr>
                        {{-- <th width="10px">
                        <input type="checkbox" id="checkbox">
                        </th> --}}
                        <th>Title</th>
                        <th>Page No</th>
                        <th>Image</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
          </div>
      </div>
    </div>

</div>
@endsection
@section('scripts')

<script type="text/javascript">
var selected_ids=[];
var check_id=0;
    let bit=0;
  $(function () {

    var table = $('.data-table').DataTable({

        processing: false,
        serverSide: true,
        ajax: "{{ route('admin.newspaper-details.index') }}",
        columns: [
            // {data: 'checkbox', name: 'checkbox[]', orderable: false, searchable: false},
            {data: 'newspaper_id', name: 'newspaper_id'},
            {data: 'page_no', name: 'page_no'},
            {data: 'image_path', name: 'image_path'},
            {data: 'action', name: 'action', orderable: false, searchable: false},
        ],
    });

  });
$(document).on('click','#delete-link-packages',function(event){
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

    //delete selected
$('#delete-selected').on('click',function(e){
       e.preventDefault();
       if(selected_ids.length==0){
         alert("Please select atleast one item from the list")
       }
        else{
          Swal.fire({
            title: 'Are you sure?',
            showDenyButton: true,
            showCancelButton: false,
            confirmButtonText: 'Yes',
            denyButtonText: `No`,
          }).then((result) => {

                if (result.isConfirmed) {

                  e.preventDefault();
                  $.ajaxSetup({
                      headers: {
                          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                      }
                  });
                  $.ajax({
                    type:"post",
                    url:"{{route('admin.newspaper-details.massDestroy')}}",
                    data:{ids:selected_ids},
                    success:function(response){

                        location.reload();

                    }
                  })
                }
          })
        }
})
//checkbox
$('#checkbox').on('click',function(){


            if(check_id==0){
                check_id=1;
                selected_ids=[]
            $("input[name='checkbox[]']").each( function () {
                $(this).prop('checked', true);
            var id=$(this).attr('id');
            selected_ids.push(id)

            });
            }
            else{
                check_id=

                $("input[name='checkbox[]']").each( function () {
                    selected_ids=[]
                $(this).prop('checked', false);

            });


            }
})
//single checkbox select
$(document).on('change','.checkbox',function(){

if ($(this).attr('checked', true)) {

  selected_ids.push($(this).attr("id"))

}
else{
  const index = selected_ids.indexOf($(this).attr('id'));
      if (index > -1) {
        selected_ids.splice(index, 1);
      }
}

})

</script>

@endsection

