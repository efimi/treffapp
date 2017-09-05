$(document).ready(function () {
    $("#locations").on('submit', (function (e) {
        e.preventDefault();
        $.ajax({
            // AJAX übermittlungstyp
            type: "POST",
            // Angesprochene Datei
            url: "/locations/edit",
            // Die Daten die per POST an die angegebene Datei übermittelt werden sollen
            data: new FormData(this),
            contentType: false,       // The content type used when sending data to the server.
            cache: false,             // To unable request pages to be cached
            processData: false,        // To send DOMDocument or non processed data file it is set to false

            // Bei Erfolg auszuführende Function
            success: function (msg) {
                $('#alert').html('Ihre Anmeldung war Erfolgreich!').toggleClass('hidden');
                $('input.form-control').attr('disabled','disabled');
                $('button.btn').attr('disabled','disabled');
                $('select.form-control').attr('disabled','disabled');
            }
        });
    }));


    // Function um eine Preview des Bildes zu ermöglichen
    $(function () {
        $("#file").change(function () {
            var file = this.files[0];
            var imagefile = file.type;
            var match = ["image/jpeg", "image/png", "image/jpg"];
            if (!((imagefile == match[0]) || (imagefile == match[1]) || (imagefile == match[2]))) {
                $('#previewing').attr('src', 'noimage.png');
                return false;
            }
            else {
                var reader = new FileReader();
                reader.onload = imageIsLoaded;
                reader.readAsDataURL(this.files[0]);
            }
        });
    });

    function imageIsLoaded(e) {
        $("#file").css("color", "green");
        $('#image_preview').css({"display": "block", "opacity": "1"});
        // $('#previewing').attr('src', e.target.result);
        $('#previewing').attr({"width": "250px", "height": "230px", "src": e.target.result});
    }
});
