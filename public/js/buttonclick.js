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
                    // checkbox/-entfernen
                    $('input#together').parent().remove();
                    setTimeout( function(){
                        var confBtn = $('button[name="confirmButton"]');
                        confBtn.fadeout(function(){
                            $(this).remove();
                        });
                    }, 5000);
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

    $(document).one('click', 'button[name="confirmButton"]', function (){
        $.ajax({
            method: 'POST',
            url: '/confirmThatICome',
            data: {'_token': $('meta[name=token]').attr("content"), 'location_id': $('input#location_id').val()},
            success: function (data){
                $('div#returnMessage').html(data);
            },
            error: function (error){
                console.error();
            }
        });
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
