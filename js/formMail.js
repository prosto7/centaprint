$("#send_message").on("click",function() {
    let email = $("#email").val().trim();
    let theme = $("#theme").val().trim();
    let message = $("#message").val().trim();

    if(email == "") {
        $("#errorMess").text("Введите email");
        return false;
    }
    else if (message.lenght < 5) {
        $("#errorMess").text("Введите текст");
        return false;
    }

    $("#errorMess").text("");

    $.ajax({
        url:'ajax/mail.php',
        type: 'POST',
        cache: false,
        data: {'email': email,'theme': theme,'message': message},
        dataType: 'html',
        beforeSend: function() { 
            $("#send_message").prop("disabled",true);
        },
        success: function (data) {
            if(!data) 
            alert("Были ошибки сообщения не отправлено!");
            else 
            $("#mail_form").trigger("reset");
            $("#send_message").prop("disabled",false);
        }
    });
});