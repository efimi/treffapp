$(function() {

  // .one =  nur einmal ausführen von dem Code
  $('#button').one('click',function () {
    var btn = $(this);
    btn.children().text('Deine Location wird gesucht:');
    btn.attr('disabled','disabled');
    $('#database_entry').hide();

    $.ajax({
      url: 'getplace',
      method: 'post',
      data: {'_token': $('meta[name=token]').attr("content"), 'together': $('#together').is(':checked'),},
      success: function (data) {
        console.log(data);
        // hide div
        $('#starttext').delay( 800 ).fadeIn( 400 );
        $('#database_entry').append($('<h1>', {
            text: data.loc.name
        }));

        $('#database_entry').append($('<h3>', {
            text: "Heute um 20:00"
        }));

        $('#database_entry').append(data.loc.map);
        $('#database_entry').append(data.loc.current);
        // scroll to div
        $('#together').attr('disabled','disabled');


      },
      error: function (error) {
        console.log(error);
      },
      complete: function (){
        $('#database_entry').fadeIn(300);
        // TODO: Change Text to something else
        btn.children().text('Viel Spass!');
        $('html,body').animate({
        scrollTop: $("#database_entry").offset().top},
        'fast');
      }
    });
  });

  $('#button').on('click',function () {
      $('html,body').animate({
      scrollTop: $("#database_entry").offset().top},
      'fast');
  });
});
