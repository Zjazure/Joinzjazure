(function(){
    $("#checkHandler").validate( {
            rules: {
                VerificationCodeAnswer: {
                    required: true,
                    remote: {
                        url: "verification-code.php",
                        type: "get",
                        func: "answer",
                            VerificationCodeAnswer: function () {
                            data: {return $("#VerificationCodeAnswer").val();}
                            }
                    }

                }
            },
            submitHandler:function(form)
            {
                form.submit();
            }
        }

    );
});
$("#RefreshQ").click(function(){
	$.get("verification-code.php",{func:"question"},function(data,textStatus){
		$("#question").html(data);
	});
});
$("#RefreshQ").click();