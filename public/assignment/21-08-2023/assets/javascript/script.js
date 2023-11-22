$('form').submit((e)=>{
    e.preventDefault();
    var error='';
    if($('#email').val() ==''){
      error += `<p>email field is empty</p>`;     
    }
    if($('#subject').val() ==''){
      error += `<p>subject field is empty</p>`;     
    }
    if($('#content').val() ==''){
      error += `<p>content field is empty</p>`;     
    }

    if(error !=''){
       

        $("#error").html( `<div class="alert alert-danger" role="alert"><h5 class="text-center"> There was an error:</h5>`+error+`
</div>`);
    }
    else{
        $("form").unbind('submit').submit();
    }
})