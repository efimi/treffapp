$(document).ready(function () {

    // .one =  nur einmal ausführen von dem Code
    $('#button').one('click', function () {

        var btn = $(this);
        btn.attr('disabled', 'disabled');
        btn.children().text('Deine Location wird gesucht:');
        var amount = $('#together').is(':checked');

        $.ajax({
            url: '/getplace',
            method: 'POST',
            data: {'_token': $('meta[name=token]').attr("content"), 'together': amount},
            success: function (data){
                if(data != "false"){
                    $('div#database_entry').html(data);
                    btn.remove();
                    $('input#together').parent().remove();
                }

            },
            error: function (error) {
                console.log(error);
                btn.attr('disabled', 'enabled');
                btn.children().text('Fehler! Let´s Go Again');
            }
        });
        var timeout = setTimeout(showPage, 3000);
    });

    function showPage() {
        $("#loader").remove();
        $("#framemap").toggleClass('hidden');
    }


    $('#button').on('click', function () {
        $('html,body').animate({
                scrollTop: $("#database_entry").offset().top
            },
            'fast');
    });


});
