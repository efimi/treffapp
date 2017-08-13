$(function() {

  // .one =  nur einmal ausführen von dem Code
  $('#button').one('click',function () {
    var btn = $(this);
    btn.text('Deine Location wird gesucht:');
    btn.attr('disabled','disabled');
    $('#database_entry').hide();

    $.ajax({
      url: 'getplace',
      method: 'get',
      success: function (data) {
        console.log(data);
        // hide div
        $('#starttext').delay( 800 ).fadeIn( 400 );
        $('#database_entry').append($('<p>', {
            text: data.loc.name
        }));
        $('#database_entry').append($('<div>', {
            text: data.loc.googlemaps_frame
        }));
        $('#database_entry').append($('<p>', {
            text: "Heute um 20:00"
        }));
        // scroll to div


      },
      error: function (error) {
        console.log(error);
      },
      complete: function (){
        $('#database_entry').fadeIn(300);
        // TODO: Change Text to something else
        btn.text('Viel Spass!');
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