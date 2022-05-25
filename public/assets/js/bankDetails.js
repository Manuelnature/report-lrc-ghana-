
$(document).ready(function(){

  $(document).on('change', '.txt_bank_name', function(){
      console.log("It worked");
      var bank_id = $(this).val();
      console.log(bank_id);
      // var data ={'id':bank_id,
      //             "_token":"{{ csrf_token() }}"
      //       };
      // console.log(data);

      // $.post( 'pages.bank_setup', data, function( response ) {
      //       console.log(response);
      //  }); {!!URL::to('getBankName')!!}

      $.ajax({
            type:'get',
            url:"{!!URL::to('bankSetup')!!}",
            data:{'id':bank_id},
            success:function(data){
                  console.log('success');

                  console.log(data);
            },
            error:function(){

            }
      }); 
  });
});



// var get_bank_name;

// function setBankNames(bank_names){
//       get_bank_name = bank_names;
//       console.log(get_bank_name);
// }

// $('#txt_bank_name').change(function(e) {
//       e.preventDefault();
//       console.log("AAAAAAAAAAA");
//       view_bank_name();
// }); 

// function view_bank_name (){
//       var bank_id = $('#txt_bank_name').val();
//       // console.log(bank_name);

// }








// $(document).ready(function(){
//             // setBankNames( @json($all_banks) );
//             $('#txt_bank_name').on('change', function(){
//                 var bank_id = $(this).val();
//                 if(bank_id) {
//                     $.ajax({
//                         url:'pages.bank_setup/'+bank_id,
//                         type: "GET",
//                         dataType: "json",
//                         success:function(data){
//                            $('#txt_branch_name').empty();
//                            $.each(data, function(bank_id, branch_name) {
//                                 $('#txt_branch_name').append('<option value="'+ bank_id + '">' + branch_name + '</option>');
//                            }); 
//                         }
//                     });
//                 }else{
//                     $('#txt_branch_name').empty();
//                 }
//             });
//         });