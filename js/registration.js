function ReturnPopapContent() {


    var ajaxRequest;


    ajaxRequest = $.ajax({
        type: "post",
        dataType: 'html',
        url: '/user/registration',
        success: function (data) {
            $('#dialog-form').empty().append(data);
        },
        error: function (data) {
            console.log(data)
        }
    });

}
