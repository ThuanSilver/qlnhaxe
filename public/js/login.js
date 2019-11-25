function isLogin(inputEmail) {
    var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
	return regex.test(inputEmail);
}
function validatePassword(inputPassword) {
	return inputPassword.length >7;
}
$(document).ready(function(){	
    $('#formGroupExampleInput').change(function(){
        var tendangnhap = $(this).val().trim();
        // alert(`email = ${JSON.stringify(email)}`)
        if(!isLogin(tendangnhap)) {
            //Error ?
            $(".loginError").html("Email is not valid format");
        } else {
            $(".loginError").html("");
        }
    });
    $('#formGroupExampleInput2').change(function(){
        var password = $(this).val();	
        if(!validatePassword(password)) {
			$(".passwordError").html("mật khẩu có độ dài từ 8 kí tự trở lên");
		} else {
			$(".passwordError").html("");
		}
    });
});
