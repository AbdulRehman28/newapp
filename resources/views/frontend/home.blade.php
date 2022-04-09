
@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }} </div>

                <div class="card-body">
                    @if(session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif


                        <select name="cars" onChange="getval(this);">
                            <option >Select Pain</option>
                            @foreach($pain as $pain)
                            <option value="{{$pain->id}}" id="{{$pain->id}}">{{$pain->pain_in_english}} ({{$pain->pain_in_korean}})</option>
                            @endforeach
                        </select>

                <div class="row" style="margin-left:0">
                    <div class="col-md-6 mt-2" id="english-column">
                        <div id="show-list-english">

                        </div>
                    </div>
                    <div class="col-md-6 mt-2" id="korean-column">

                        <div id="show-list-korean">

                        </div>
                    </div>

                </div>


                    <div class="row mt-5">
                        @if(auth::user())
                              <form class="ml-3">
                                  <div class="form-group">
                                        <div class=""><input type="text" id="severity"  placeholder="Enter Severity" name="input"></div>
                                  </div>
                                  <div class="form-group">
                                    <button id="submit" class="btn btn-primary">Submit</button>
                                  </div>
                              </form>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
@section('scripts')
<script>
    var pain_id='';
    var pain_type='';
    var severity='';



$(document).on('click',".type",function(){
    if(pain_id==''){
        alert("Select Pain first")
    }
    else{
        pain_type=$(this).attr('id')
    }
})
$('#submit').on('click',function(e){
    e.preventDefault();
    if(pain_id==''){
        alert("Please select pain first")
    }

    else if(severity==''){
        alert("Please enter severity")
    }
    else{
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
            $.ajax({

                method:"post",
                url:"{{route('submit')}}",
                data:{pain_id:pain_id,severity:severity},
                success:function(response){
                    $('#severity').val('')
                    if(response.status){
                        window.location.href = "/dashboard";
                    }
                }
            })
        }


})
$('#severity').on('change',function(){
    severity=$(this).val();
})

$(document).on('click','.pain',function(){

    console.log(pain_id)

})

function getval(sel)
{
    $('#show-list-english').html('');
    $('#show-list-korean').html("");
    pain_id=sel.value
    $.ajax({
        type:"get",
        url:"{{route('pain-type-listing')}}",
        data:{pain_id:pain_id},
        success:function(response){
            $('#show-list-english').append("<h5>English</h5>");
            $('#show-list-korean').append("<h5>Korean</h5>");

            for (let i = 0; i < response.data.length; i++) {

            $("#show-list-english").append('<li> '+response.data[i].pain_type_english+'  </li>');
            $("#show-list-korean").append('<li>'+response.data[i].pain_type_korean+'  </li>');

            }
        }

    })

}
function getValue(sel){

    pain_type=sel.value

}

</script>
@endsection
