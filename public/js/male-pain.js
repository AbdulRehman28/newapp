
var selected_language = $("#selected_language").val();

    // flip script
        document.addEventListener('DOMContentLoaded', function(event) {

        document.getElementById('flip-card-btn-turn-to-back').style.visibility = 'visible';
        document.getElementById('flip-card-btn-turn-to-front').style.visibility = 'visible';

        document.getElementById('flip-card-btn-turn-to-back').onclick = function() {
        document.getElementById('flip-card').classList.toggle('do-flip');
        };

        document.getElementById('flip-card-btn-turn-to-front').onclick = function() {
        document.getElementById('flip-card').classList.toggle('do-flip');
        };

    });

    // pain css


    var total_pages=10;
    var body_part=null;
    var page_no= null;
    var pain_id=null;
    var pain_type_id=null;
    var severity_id=null;
    var check_var=0;
    var avatar=null;



    var is_saved=0;
    $(document).ready(function () {

        var png='';



        $('.form').addClass("hide-cls");
        $('.faq-2').addClass("hide-cls");
        $('.faq-3').addClass("hide-cls");
        $('#faqhead1').addClass('hide-cls');
        $('#save').addClass("hide-cls");
        $('#select-another').addClass("hide-cls");
        $('#pdf-buttn').addClass('hide-cls');
        alert("aaa")
        $.ajax({

                type:'get',
                url:"{{route('severity')}}",
                data:{page_no:1},
                success:function(response){

                    if(response.status){
                        console.log("sss")
                        severity_id=response.severity['id'];
                        $('#severity-english').html(response.severity['english']);
                        $('#severity-other').html(response.severity[selected_language]);
                        parseInt($('#page-number').text())
                        page_no=$('#page-number').text(response.severity['id']);
                    }else{
                        console.log(page_no)
                    }
                }
        })


        $('#save').on('click',function(e){

            e.preventDefault();


            if(body_part==null || $('.parent-category').val()==0 || $('.child-category').val()==0){
                alert("Please fill the form completely.")
            }


            else if(check_var==0){

                check_var=1;

                $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });

                $.ajax({

                    type:"post",
                    url:"{{route('user-record')}}",
                    data:{pain_id:pain_id,pain_type_id:pain_type_id,severity_id:severity_id,body_part:body_par,avatar:avatar},
                    success:function(response){


                        if(response.status){

                            is_saved=1;
                            $('.pdf-buttn').attr('data-attr',1);
                            $('#select-another').attr('data-attr',1);
                            $('#save').addClass("hide-cls");
                            $('#pdf-buttn').removeClass('hide-cls');
                            alert("Your record has been saved, now you can download");
                        }
                    },
                    complete:function(){
                        check_var=0;
                    }
                })
            }
        })

    });



    $('.parent-category').on('change',function(e){


        e.preventDefault();
        $('#save').removeClass("hide-cls");
        // $('#faqhead1').removeClass('hide-cls');
        var heading= $(".parent-category option:selected").text();
        pain_id=$(this).val();
        $('#faqhead1').children().html('<span class="no-item-green">1</span>'+heading+'')

        if(pain_id==0){

            $('.child-category').html('<option value="">Select pain type</option>');
            $('#category-translate').html('')
            $('#pain-type-translate').html('')
        }
        else{

            $('#category-translate').html('')
            $('#pain-type-translate').html('')

            $.ajax({

                type:'get',
                url:"{{route('get-pain-types')}}",
                data:{pain_id:pain_id,selected_language:selected_language},

                success:function(response){

                    $('#category-translate').html(response.category[selected_language])

                        $('#pain-types').html('<option value="0">Select pain type</option>')
                    if(response.status){
                        var array=response.pain_types;
                        for(var i=0;i<array.length;i++){
                            var words=array[i].english;
                            var word= words.charAt(0).toUpperCase() + words.slice(1);

                            $('#pain-types').append('<option value="'+array[i].id+'">'+word+'</option>')

                        }
                    }
                }
            });
        }
})

$('.child-category').on('change',function(e){
    e.preventDefault();
      $('#save-buttn').removeClass("hide-cls")

        pain_type_id=$(this).val();


        if(pain_type_id==0){
            $('#pain-type-translate').html('')
        }
        else{

            $('#pain-type-translate').html('')

            $.ajax({
                type:'get',
                url:"{{route('pain-type-translate')}}",
                data:{pain_type_id:pain_type_id,selected_language:selected_language},
                success:function(response){

                    if(response.status){

                        $('#pain-type-translate').html(response.pain_type[selected_language])
                    }

                }
            });
        }

})

$('.male-body-part').on('click',function(e){

    e.preventDefault();
    $('#pdf-buttn').removeClass("hide-cls");
    $("#select-another").removeClass("hide-cls");

  avatar=$(this).parent().prop('className');

    $('.form').removeClass("hide-cls")
    $('.male-body-part').removeClass('active');
    $(this).addClass('active');
    body_part=$(this).attr('data-name');

})

$('#pdf-buttn').on('click',function(e){
    e.preventDefault();

    if(body_part==null || $('.parent-category').val()==0 || $('.child-category').val()==0){
        alert("Please save record first.");
    }
    else if ($('.pdf-buttn').attr('data-attr')==1){
        $('.pdf-buttn').attr('data-attr',0);
        // $('.pdf-buttn').attr('data-attr',0);
        window.location.href = "/generate-pdf";
    }
    else{
        alert('please save record first.');
    }
})
$('#select-another').on('click',function(e){
    e.preventDefault();
    if($(this).attr('data-attr')==1){
        $('#faqhead1').removeClass('hide-cls');
        $('#faq1').removeClass('show');
        $(".faq-1").click(function(event){event.stopPropagation();});
        // $('#faq1').stopPropagation();
    }
    else{
        alert("please fill the form and save record first");
    }
})

$('.page-btn').on('click',function(e){

    e.preventDefault();
    var val=$(this).attr('id');
    if(val=="increment"){
     page_no=parseInt($('#page-number').text())+1;
     if(page_no<=total_pages){
        $('#save').removeClass("hide-cls");
        $('#page-number').text(page_no);
     }

    }
    else{
         page_no=parseInt($('#page-number').text())-1;
        if(page_no>0){
            $('#save').removeClass("hide-cls");
            $('#page-number').text(page_no);
        }

    }

    $.ajax({
       type:"get",
       url:"{{route('severity')}}",
       data:{page_no:page_no,selected_language:selected_language},
       success:function(response){

        if(response.status){
            severity_id=response.severity['id'];
            $('#severity-english').html(response.severity['english']);
            $('#severity-other').html(response.severity[selected_language]);
        }
       }

    })

})



