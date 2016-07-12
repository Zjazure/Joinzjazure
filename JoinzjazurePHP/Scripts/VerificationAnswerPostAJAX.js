rules: {

    VerificationCodeAnswer:{
        required: true,
            remote:{
            url: "AnswerHandler.php",
                type: "Post",
                data: {
                VerificationCodeAnswer:function(){return $("#VerificationCodeAnswer").val();}
            }
        }

    },
    VerificationPost: {
        required: true,
            remote: {
            url: "AnswerHandler.php",
                type: "Post",
                data: {

                VerificationPost:function(){return $("#VerificationPost").val();}
            }
        }

    },

},