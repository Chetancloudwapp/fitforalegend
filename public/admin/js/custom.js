$(document).ready(function(){
    // Check admin password is correct or not
    $("#current_pwd").keyup(function(){
        var current_pwd = $("#current_pwd").val();
        // alert(current_pwd);
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type:'post',
            url:'/admin/check_current_password',
            data:{current_pwd:current_pwd},
            success:function(resp){
                if(resp == "false"){
                    $("#vefiryCurrentPwd").html("Old Password is Incorrect !");
                }else if(resp == "true"){
                    $("#vefiryCurrentPwd").html("Old Password is correct !");
                }
            },error:function(){
                alert('Error');
            }
        })
    });
});