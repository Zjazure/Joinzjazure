(function(){
        $("#checkHandler").validate( {
            rules: {
                VerificationCodeAnswer: {
                    required: true,
                    remote: {
                        url: "AnswerHandler.php",
                        type: "post",
                        data: {
                            VerificationCodeAnswer: function () {
                                return $("#VerificationCodeAnswer").val();
                            }
                        }
                    }

                }
			},

                messages: {
                    VerificationCodeAnswer: {
                        required: "«Î ‰»ÎVerificationCodeAnswer",
                        remote: "«Î ‰»ÎVerificationCodeAnswer£¨remote",
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
		$.get("getq.php",{
			rand : "yes"
			},function(data,textStatus){
			$("#question").html(data);
		});
	});