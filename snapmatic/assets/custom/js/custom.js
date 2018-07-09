function login_error_message(idname,message) {
  $(idname).html('<div class="alert alert-danger text-center" role="alert">'  + message +  
    '</div>');
}
$(document).ready(function(){
  $("#login-form").on('submit',function(e){
    $.ajax({
      url: base_url + 'login/auth',
      data: $(this).serialize(),
      type: "POST",
      success: function(data)
      {
        var result = JSON.parse(data);
        if(result === "success"){
          $("#validate_error").html("");
          window.location.href=base_url+"user/";
        }
        else{
          login_error_message(".alert-login",result)
        }
      },
      error: function(data)
      {
        alert('Opps! Something went wrong. please contact the administrator. ');
      },
    })
    e.preventDefault();
  });
}); 

function success_message (idname,message)  {
  $('html, body').animate({
    scrollTop: 0  }, "slow");

  $(idname).html('<div class="alert alert-success" role="alert">' + message +  
    '</div>');
}

function old_password_message (idname,message)  {
 

  $(idname).html('<div class="alert alert-danger" role="alert">' + message +  
    '</div>');
}
function new_confirm_password_message (idname,message)  {
 
  $(idname).html('<div class="alert alert-danger" role="alert">' + message +  
    '</div>');
}
$(document).ready(function(){
  $("#registration-form").on('submit',function(e){
    $.ajax({
      url: base_url+"formsubmit/new_form_submit",
      type: "POST",
      data: $(this).serialize(),
      success:function(data)
      {
        var result = JSON.parse(data);

        if(result === "success")
        {
          $("h5").html("");
          success_message("#success-message-new-account","Create Successful!");
          window.setTimeout(function(){location.href=base_url},2000);
        }
        else{
          $("#first_name_error").html(result.first_name_error);
          $("#last_name_error").html(result.last_name_error);
          $("#username_error").html(result.username_error);
          $("#email_error").html(result.email_error);
          $("#password_error").html(result.password_error);
        }
      },
      error: function(data) {
        alert('error');
      }
    })
    e.preventDefault();
  })
})


$(document).ready(function(){
    $("#edit-profile").on('submit',function(e){
        $.ajax({
            url: base_url + "formsubmit/edit_form_submit",
            type: "POST",
            data: $(this).serialize(),
            success:function(data) {
                var result = JSON.parse(data);
                if(result === "success")
                {
                    $("h5").html("");
                    success_message("#success-message-edit-profile","Edit Successfully!");
                    window.setTimeout(function(){location.href=base_url+"user/"},2000);
                }
                else if(result === "existed")
                {
                    $("h5").html("");
                    success_message("#success-message-edit-profile","Username already taken");
                }else{
                    
                    $("#first_name_error").html(result.first_name_error);
                    $("#last_name_error").html(result.last_name_error);
                    $("#email_error").html(result.email_error);
                    $("#username_error").html(result.username_error);
                   
                }
            },
            error: function(data) {
                alert('error');
            }
        })
        e.preventDefault();
    })
})

$(document).ready(function(){
    $("#edit-password").on('submit',function(e){
        $.ajax({
            url: base_url + "formsubmit/edit_form_submit",
            type: "POST",
            data: $(this).serialize(),
            success:function(data) {
                var result = JSON.parse(data);
                if(result === "success")
                {
                    $("h5").html("");
                    success_message("#success-message-edit-password","Edit Successfully! Your account will automatically logout");
                    window.setTimeout(function(){location.href=base_url+"administrator/account"},2000);
                }
                else if(result === "old_password_mismatch")
                {
                  $("h5").html("");
                  old_password_message("#old-password-message","The old password is mismatch!");

                   
                }
                else if(result === "new_and_confirm_password_mismatch")
                {
                   $("h5").html("");
                   new_confirm_message("#new-confirm-message","The new password and confirm password didnt match!");
                }
                else
                {

                    $("#old_password_error").html(result.old_password_error);
                    $("#new_password_error").html(result.new_password_error);
                    $("#confirm_password_error").html(result.confirm_password_error);
                }
            },
            error: function(data) {
                alert('error');
            }
        })
        e.preventDefault();
    })
})

$(document).ready(function(){
    $("#new-content").on('submit',function(e){
        var form = new FormData(document.getElementById("new-content"));
        $.ajax({
            url: base_url + "formsubmit/new_form_submit",
            data: form,
            type: "POST",
            processData: false, // tell jQuery not to process the data
            contentType: false, // tell jQuery not to set contentType
            success:function(data) {
                var result = JSON.parse(data);

                if(result === "success")
                {
                    $("h5").html("");
                    success_message("#success-message-new-content","New Content Added Successfully!");
                    window.setTimeout(function(){location.href=base_url+"/user"},2000);
               
                }else{
                    
                    $("#image_description_error").html(result.image_description_error);
                    $("#content_image_error").html(result.content_image_error);
                }
            },
            error: function(data) {
                alert('error');
            }
        })
        e.preventDefault();
    })
})